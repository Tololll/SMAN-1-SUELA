<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        $studentsKuliah = Student::whereHas('records', function ($q) {
            $q->where('type', 'kuliah');
        })->count();

        $studentsKerja = Student::whereHas('records', function ($q) {
            $q->where('type', 'kerja');
        })->count();

        $studentsKeduanya = Student::whereHas('records', function ($q) {
            $q->where('type', 'keduanya');
        })->count();

        return view('dashboard', compact('totalStudents', 'studentsKuliah', 'studentsKerja', 'studentsKeduanya'));
    }
}
