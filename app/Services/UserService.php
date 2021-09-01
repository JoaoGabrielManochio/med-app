<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function list()
    {
        return User::paginate(30);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        return $user;
    }

    public function store()
    {
        return User::create($this->fields());
    }

    public function update($id)
    {
        $user = $this->show($id);

        if (!$user) {
            return false;
        }

        $user->fill($this->fields());
        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = $this->show($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }

    private function fields()
    {
        $fields = [
            'name'  => request('name'),
            'email' => request('email')
        ];

        if (request('password')) {
            $fields['password'] = Hash::make(request('password'));
        }

        return $fields;
    }

    public function loginAttempt()
    {
        return auth()->attempt([
            'email'    => request('email'),
            'password' => request('password'),
        ]);
    }

    public function generateToken()
    {

        $newToken = auth()->user()->createToken('api');

		$token = $newToken->token;
		$token->expires_at = \Carbon\Carbon::now()->addHours(6);
		$token->save();

		return $newToken;
    }
}
