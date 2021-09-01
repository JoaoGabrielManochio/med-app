<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getToken()
    {
        if (!request('email') || !request('password')) {
			return response()->json([
                'success' => false,
                'message' => 'Email and password are required!'
			], 400);
        }

		$login = $this->userService->loginAttempt();

		if (!$login) {
			return response()->json([
                'success' => false,
                'message' => 'Email and password doesn\'t match!'
			], 401);
        }

        if (auth()->user()->token()) {
            auth()->user()->token()->revoke();
        }

        $token = $this->userService->generateToken();

        return response()->json([
            'success'   => true,
            'token'     => $token->accessToken,
            'expire_at' => $token->token->expires_at->format('Y-m-d H:i:s')
        ], 200);
	}
}
