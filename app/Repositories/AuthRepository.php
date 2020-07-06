<?php

namespace App\Repositories;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface {
    /**
    * Login User
    *
    * @param  credentials
    * @return Token-CurrentUser
    */

    public function loginUser( $credentials ) {
        if ( Auth::attempt( $credentials ) ) {
            $user = Auth::user();
            $success['token'] = $user->createToken( 'Laravel Password Grant Client' )->accessToken;
            $success['user'] = $user;
            return response()->json( ['success'=>$success], 200 );
        } else {
            return response()->json( ['error' => 'UnAuthorised'], 401 );
        }
    }
    /**
    * Register User
    *
    * @param  credentials
    * @return Token
    */

    public function registerUser($request) {
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }
}