<div class="form-group row">
    <label for="fullname" class="col-md-4 col-form-label text-md-right">Nome</label>

    <div class="col-md-6">
        <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ !empty($doctor) ? $doctor->fullname : old('fullname') }}" required autocomplete="fullname" autofocus>

        @error('fullname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ !empty($doctor) ? $doctor->email : old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="cellphone" class="col-md-4 col-form-label text-md-right">Celular</label>

    <div class="col-md-6">
        <input id="cellphone" type="text" class="form-control @error('cellphone') is-invalid @enderror" name="cellphone" value="{{ !empty($doctor) ? $doctor->cellphone : old('cellphone') }}" required>

        @error('cellphone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="specialty" class="col-md-4 col-form-label text-md-right">Especialidade</label>

    <div class="col-md-6">
        <input id="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{ !empty($doctor) ? $doctor->specialty : old('specialty') }}" required autocomplete="specialty">

        @error('specialty')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="crm" class="col-md-4 col-form-label text-md-right">Crm</label>

    <div class="col-md-6">
        <input id="crm" type="text" class="form-control @error('crm') is-invalid @enderror" name="crm" value="{{ !empty($doctor) ? $doctor->crm : old('crm') }}" required autocomplete="crm">

        @error('crm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ !empty($doctor) ? 'Salvar' : 'Cadastrar' }}
        </button>
    </div>
</div>
