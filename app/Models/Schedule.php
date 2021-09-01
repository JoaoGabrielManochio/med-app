<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'doctor_id', 'patient_id', 'schedule'
    ];

    protected $dates = [
        'schedule'
    ];

    protected $casts = [
        'schedule' => 'datetime:Y-m-d H:i:s'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
