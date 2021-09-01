<?php

namespace App\Services;
use App\Models\Doctor;

class DoctorService {

    public function list()
    {
        return Doctor::paginate(30);
    }

    public function listAll()
    {
        return Doctor::all();
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return false;
        }

        return $doctor;
    }

    public function store()
    {
        return Doctor::create($this->fields());
    }

    public function update($id)
    {
        $doctor = $this->show($id);

        if (!$doctor) {
            return false;
        }

        $doctor->fill($this->fields());
        $doctor->save();

        return $doctor;
    }

    public function destroy($id)
    {
        $doctor = $this->show($id);

        if (!$doctor) {
            return false;
        }

        return $doctor->delete();
    }

    private function fields()
    {
        $fields = [
            'fullname'  => request('fullname'),
            'email'     => request('email'),
            'specialty' => request('specialty'),
            'crm'       => request('crm'),
            'cellphone' => request('cellphone'),
        ];

        return $fields;
    }
}
