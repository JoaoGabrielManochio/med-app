<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'fullname', 'born_at', 'cellphone', 'email', 'cpf', 'sex'
    ];

    protected $dates = [
        'born_at' => 'date:Y-m-d'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'id', 'patient_id');
    }
}
