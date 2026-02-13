<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\AlumniRecord;
use Illuminate\Http\Request;

class GuestSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:50',
            'graduation_year' => 'nullable|digits:4|integer',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'nullable|string',
            'type' => 'required|in:kuliah,kerja,keduanya',
            'institution_name' => 'nullable|string|max:255',
            'major_or_position' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // Find existing student by NISN or email, otherwise create
        $student = null;
        if (!empty($data['nisn'])) {
            $student = Student::where('nisn', $data['nisn'])->first();
        }
        if (!$student && !empty($data['email'])) {
            $student = Student::where('email', $data['email'])->first();
        }

        if ($student) {
            $student->update([
                'name' => $data['name'],
                'nisn' => $data['nisn'] ?? $student->nisn,
                'graduation_year' => $data['graduation_year'] ?? $student->graduation_year,
                'email' => $data['email'] ?? $student->email,
                'phone' => $data['phone'] ?? $student->phone,
                'address' => $data['address'] ?? $student->address,
            ]);
        } else {
            $student = Student::create([
                'name' => $data['name'],
                'nisn' => $data['nisn'] ?? null,
                'graduation_year' => $data['graduation_year'] ?? null,
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        }

        // Create alumni record (latest)
        AlumniRecord::create([
            'student_id' => $student->id,
            'type' => $data['type'],
            'institution_name' => $data['institution_name'] ?? null,
            'major_or_position' => $data['major_or_position'] ?? null,
            'start_date' => $data['start_date'] ?? null,
            'notes' => $data['notes'] ?? null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Terima kasih — data Anda telah tersimpan.');
    }
}
