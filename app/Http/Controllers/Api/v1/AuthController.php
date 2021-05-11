<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $token = $user->createToken(config('app.name'));
        return success([
            'user' => $user,
            'token' => $token->plainTextToken,
            'message' => "user created succfully",
            'success' => true
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return failed("auth failed , email or password is wrong");
        }
        $user = auth()->user();
        $token = $user->createToken(config('app.name'));
        return success([
            'user' => $user,
            'token' => $token->plainTextToken,
            'message' => "login succfully",
            'success' => true
        ]);
    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return success(['message' => 'logged out succfully']);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));
        if ($status === Password::RESET_LINK_SENT) {
            return success([['message' => 'A reset email has been sent! Please check your email.']]);
        }
        return failed(__($status));
    }
}
