<?php

namespace App\Http\Controllers;

use App\Models\AlumniRecord;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // store a new alumni record for the logged-in student's profile
    public function store(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;
        if (!$student) {
            return redirect()->back()->withErrors(['no_student' => 'Lengkapi profil terlebih dahulu.']);
        }

        $data = $request->validate([
            'type' => 'required|in:kuliah,kerja,keduanya',
            'institution_name' => 'nullable|string|max:255',
            'major_or_position' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $data['student_id'] = $student->id;

        AlumniRecord::create($data);

        return redirect()->route('students.profile')->with('success', 'Catatan alumni tersimpan.');
    }

    // Admin can delete a record
    public function destroy(AlumniRecord $alumniRecord)
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-students');
        $alumniRecord->delete();
        return back()->with('success', 'Record dihapus.');
    }
}
