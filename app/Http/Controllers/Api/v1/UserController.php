<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;//you forget
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $login_type = filter_var($request->login , FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'phone';

        $request->merge([
            $login_type => $request->login
        ]);
        $credentials = $request->only($login_type, 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token')); 
    }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:150'],
                'last_name' => ['required', 'string', 'max:150'],
                'phone' => ['required', 'numeric', 'digits:8','unique:users,phone'],
                'email' => ['required', 'string', 'email', 'max:150', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character

                ],
                'bio' => ['nullable', 'string', 'max:150'],
            ],['password.regex'=>'password should contain at least 1 capital letter, 1 number, any special character']);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'phone' => $request->get('phone'),
                'bio' => $request->get('bio'),
                'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function update(Request $request , $id)
    {
            $validator = Validator::make($request->all(),
                [
                    'first_name' => ['required', 'string', 'max:150'],
                    'last_name' => ['required', 'string', 'max:150'],
                    'phone' => ['required', 'numeric', 'digits:8','unique:users,phone,'.$id],
                    'email' => ['required', 'string', 'email', 'max:150', 'unique:users,email,'.$id],
                    'password' => ['required', 'string', 'min:8', 'confirmed',
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',      // must contain at least one digit
                        'regex:/[@$!%*#?&]/' // must contain a special character

                    ],
                    'bio' => ['nullable', 'string', 'max:150'],
                ],['password.regex'=>'password should contain at least 1 capital letter, 1 number, any special character']);

        if($validator->fails()){
           return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::find($id);            
          $user->first_name = $request->get('first_name');
          $user->last_name = $request->get('last_name');
          $user->phone = $request->get('phone');
          $user->bio = $request->get('bio');
          $user->email = $request->get('email');
          $user->password = Hash::make($request->get('password'));   
          $user->save();
        return response()->json([
            'status'   => 200,
            'message' => 'Success',
        ]);        
    }
    public function getAuthenticatedUser()
        {
                try {

                        if (! $user = JWTAuth::parseToken()->authenticate()) {
                                return response()->json(['user_not_found'], 404);
                        }

                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                        return response()->json(['token_expired'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                        return response()->json(['token_invalid'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                        return response()->json(['token_absent'], $e->getStatusCode());

                }

                return response()->json(compact('user'));
        }
        public function postReset(Request $request)
	{
		$this->validate($request, [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

		$credentials = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = $this->passwords->reset($credentials, function($user, $password)
		{
			$user->password =Hash::make($password);// bcrypt($password);

			$user->save();

            $token = \JWTAuth::fromUser($user);
            return \Response::json(compact('token'));
		});

		switch ($response)
		{
			case PasswordBroker::PASSWORD_RESET:
				return redirect($this->redirectPath());

			default:
				return redirect()->back()
				->withInput($request->only('email'))
				->withErrors(['email' => trans($response)]);
		}
	}
        public function logout( Request $request ) {

                $token = $request->header('Authorization');
                try {
                    JWTAuth::parseToken()->invalidate($token);
                    return response()->json( [
                        'error'   => false,
                        'message' => 'logged_out'
                    ] );
                } catch ( TokenExpiredException $exception ) {
                    return response()->json( [
                        'error'   => true,
                        'message' => 'token expired'
        
                    ], 401 );
                } catch ( TokenInvalidException $exception ) {
                    return response()->json( [
                        'error'   => true,
                        'message' => 'token invalid'
                    ], 401 );
        
                } catch ( JWTException $exception ) {
                    return response()->json( [
                        'error'   => true,
                        'message' => 'token missing'
                    ], 500 );
                }
            }
}
