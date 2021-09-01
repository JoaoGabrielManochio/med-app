<?php

namespace App\Services;
use App\Models\Schedule;

class ScheduleService {

    public function list()
    {
        return Schedule::paginate(30);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return false;
        }

        return $schedule;
    }

    public function store()
    {
        return Schedule::create($this->fields());
    }

    public function update($id)
    {
        $schedule = $this->show($id);

        if (!$schedule) {
            return false;
        }

        $schedule->fill($this->fields());
        $schedule->save();

        return $schedule;
    }

    public function destroy($id)
    {
        $schedule = $this->show($id);

        if (!$schedule) {
            return false;
        }

        return $schedule->delete();
    }

    private function fields()
    {
        $fields = [
            'patient_id' => request('patient_id'),
            'doctor_id'  => request('doctor_id'),
            'schedule'   => \Carbon\Carbon::parse(request('schedule')),
        ];

        return $fields;
    }
}
