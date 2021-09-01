<div class="form-group row">
    <label for="patient_id" class="col-md-4 col-form-label text-md-right">Paciente</label>
    <div class="col-md-6">
        <select name="patient_id" id="patient_id" class="form-control">
            @php
                $patient_id = $schedule->patient_id ?? 0;
            @endphp
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" {{ $patient->id == $patient_id ? 'selected="selected"' : '' }}>{{ $patient->fullname }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="doctor_id" class="col-md-4 col-form-label text-md-right">Médico</label>
    <div class="col-md-6">
        <select name="doctor_id" id="doctor_id" class="form-control">
            @php
                $doctor_id = $schedule->doctor_id ?? 0;
            @endphp
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $doctor->id == $doctor_id ? 'selected="selected"' : '' }}>{{ $doctor->fullname }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="schedule" class="col-md-4 col-form-label text-md-right">Data de Agendamento</label>
    @php
        $dateSchedule = \Carbon\Carbon::now()->format('Y-m-d\TH:i');
        if (old('schedule')) {
            $dateSchedule = old('schedule');
        } elseif (!empty($schedule)) {
            $dateSchedule = $schedule->schedule->format('Y-m-d\TH:i');
        }
    @endphp
    <div class="col-md-6">
        <input id="schedule" type="datetime-local" class="form-control @error('schedule') is-invalid @enderror" name="schedule" value="{{ $dateSchedule }}" />

        @error('schedule')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ !empty($schedule) ? 'Salvar' : 'Cadastrar' }}
        </button>
    </div>
</div>
