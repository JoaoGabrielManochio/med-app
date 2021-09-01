<?php

namespace App\Services;
use App\Models\Patient;

class PatientService {

    public function list()
    {
        return Patient::paginate(30);
    }

    public function listAll()
    {
        return Patient::all();
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return false;
        }

        return $patient;
    }

    public function store()
    {
        return Patient::create($this->fields());
    }

    public function update($id)
    {
        $patient = $this->show($id);

        if (!$patient) {
            return false;
        }

        $patient->fill($this->fields());
        $patient->save();

        return $patient;
    }

    public function destroy($id)
    {
        $patient = $this->show($id);

        if (!$patient) {
            return false;
        }

        return $patient->delete();
    }

    private function fields()
    {
        $fields = [
            'fullname'  => request('fullname'),
            'email'     => request('email'),
            'born_at'   => request('born_at'),
            'cpf'       => request('cpf'),
            'sex'       => request('sex'),
            'cellphone' => request('cellphone'),
        ];

        return $fields;
    }
}
