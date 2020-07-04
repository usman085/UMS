<?php

namespace App\Http\Controllers\ApiController\AuthApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
// *** Repository InterFace
use App\Repositories\Interfaces\AuthInterface;

class AuthController extends Controller {

    // Auth Repository
    protected $authRepository;

    /*
    |--------------------------------------------------------------------------
    | Auth Api Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | return response.
    |
    */

    /**
    * Constructor function
    *
    * Pass Repository to Class $variable
    *
    *  @param AuthInterface ( Object )
    *
    */

    public function  __construct( AuthInterface $AuthInterface ) {
        $this->authRepository = $AuthInterface;
    }
    /**
    * Login Function
    *
    * Authenticate the User And Genrate the Token and Return Login User
    *
    * @param Request object
    */

    public function login ( Request $request ) {

        $validator = Validator::make( $request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // Repository Used

        return $this->authRepository->loginUser( $credentials );
    }

    public function register ( Request $request ) {

        $validator = Validator::make( $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ] );
        if ( $validator->fails() ) {
            return response( ['errors'=>$validator->errors()->all()], 422 );
        }
        return  $this->authRepository->registerUser( $request );

    }

    public function logout ( Request $request ) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response( $response, 200 );
    }
}
