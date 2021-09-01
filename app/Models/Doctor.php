<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'fullname', 'specialty', 'crm', 'email', 'cellphone'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'doctor_id');
    }
}
