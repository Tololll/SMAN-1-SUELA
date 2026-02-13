<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show form for logged-in student to create or edit profile
    public function profile()
    {
        $user = Auth::user();
        $student = $user->student;

        return view('students.profile', compact('student'));
    }

    public function storeProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:50',
            'graduation_year' => 'nullable|digits:4|integer',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:25',
            'address' => 'nullable|string',
        ]);

        $student = Student::updateOrCreate(
            ['user_id' => $user->id],
            array_merge($data, ['user_id' => $user->id])
        );

        return redirect()->route('students.profile')->with('success', 'Profil tersimpan.');
    }

    // Admin: list all students
    public function index()
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');

        $students = Student::with('latestRecord')->with('user')->withCount('records')->paginate(25);
        return view('students.index', compact('students'));
    }

    // Admin: show a student
    public function show(Student $student)
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');
        $student->load('records');
        return view('students.show', compact('student'));
    }

    // Admin: show form for editing a student
    public function edit(Student $student)
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');
        
        // FIX: Ubah path view ke admin.students.edit
        return view('students.edit', compact('student'));
    }

    // Admin: update a student
    public function update(Request $request, Student $student)
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:50|unique:students,nisn,' . $student->id,
            'graduation_year' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 10),
            'email' => 'nullable|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:25',
            'address' => 'nullable|string',
            'status' => 'nullable|string|in:kuliah,kerja,keduanya',
        ]);

        $status = $validated['status'] ?? null;
        unset($validated['status']);

        $student->update($validated);

        if ($status && $student->latestRecord) {
            $student->latestRecord->update(['type' => $status]);
        }

        return redirect()
            ->route('admin.students.show', $student)
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Admin: delete a student
    public function destroy(Student $student)
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');

        // Hapus semua records yang terkait dengan student ini
        $student->records()->delete();
        
        // Simpan nama untuk pesan
        $studentName = $student->name;
        
        // Hapus student
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', "Data siswa {$studentName} berhasil dihapus!");
    }

    // Admin: export students to CSV
    public function export()
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');

        $filename = 'students_export_'.date('Ymd_His').'.csv';
        $students = Student::with('records')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['id','name','nisn','graduation_year','email','phone','address','latest_type','latest_institution','latest_major_or_position','latest_start_date','created_at']);

            foreach ($students as $s) {
                $latest = $s->records()->latest()->first();
                $row = [
                    $s->id,
                    $s->name,
                    $s->nisn,
                    $s->graduation_year,
                    $s->email,
                    $s->phone,
                    $s->address,
                    $latest->type ?? '',
                    $latest->institution_name ?? '',
                    $latest->major_or_position ?? '',
                    $latest->start_date ?? '',
                    $s->created_at,
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
