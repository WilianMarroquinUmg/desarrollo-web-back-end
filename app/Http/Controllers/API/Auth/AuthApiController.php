<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthSigUpRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function signup(AuthSigUpRequest $request)
    {

        $validatedData = $request->all();

        $validatedData['password'] = Hash::make($validatedData['password']);

        if (User::create($validatedData)) {

             return response()->json([
                 'message' => 'Usuario Creado Exitosamente '
             ], 201);

        }

        return response()->json([
            'message', 'Error al crear el usuario'
        ], 500);
    }

    public function login(AuthLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas.'],
            ]);
        }
        $token = [
            'token' => $user->createToken($request->email)->plainTextToken
        ];

        return response()->json($token, );
    }

    public function logout(Request $request)
    {

        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();

            $request->user()->tokens()->delete();

            return response()->json(['message' => 'Successfully logged out.'], 200);
        }

        return response()->json(['message' => 'Unauthenticated.'], 401);
    }

    public function getAuthenticatedUser(Request $request)
    {
        return $request->user();
    }

    public function sendPasswordResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }
}
