<?php
namespace App\Repositories\Interfaces;

interface AuthInterface
 {
        /**
        * Login User check
        *
        * @param  credentials Object {email, passowrd}
        * @return Token&CurrentUser
        */

        public function loginUser( $credentials );

        /**
        * Register User
        *
        * @param  Request-Data Object {email, passowrd}
        * @return Token
        */

            public function registerUser( $data );

        }