<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'type',
        'institution_name',
        'major_or_position',
        'start_date',
        'notes',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
