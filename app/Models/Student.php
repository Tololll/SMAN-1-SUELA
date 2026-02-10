<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nisn',
        'graduation_year',
        'email',
        'phone',
        'address',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(AlumniRecord::class);
    }

    /**
     * Latest alumni record (one)
     */
    public function latestRecord()
    {
        return $this->hasOne(AlumniRecord::class)->latestOfMany();
    }

    /**
     * Shortcut attribute: current status (kuliah/kerja/keduanya) or null
     */
    public function getStatusAttribute()
    {
        return $this->latestRecord?->type ?? null;
    }

    /**
     * Shortcut: latest institution/company
     */
    public function getLatestInstitutionAttribute()
    {
        return $this->latestRecord?->institution_name ?? null;
    }
}
