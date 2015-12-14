<?php

namespace dsiCorreo\Http\Controllers;

use Illuminate\Http\Request;

use dsiCorreo\Http\Requests;
use dsiCorreo\Http\Controllers\Controller;
//use Auth;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends AppController
{
    public function login( Request $request )
    {
        $validator = $this->UserValidator( $request );
        if( $validator->fails() )
        {
            return redirect( '/' )->withInput()->with( 'response', array(
                'message' => 'Los campos no son corretos',
                'errors' => $validator->errors(),
            ));
        }
        else
        {
            if( Auth::attempt([
                    'email' => $request->input( 'user-mail' ),
                    'password' => $request->input( 'user-password')
                ]))
            {
                echo "listo";
            }
            else
            {
                echo "No hay nada";
            }
        }

    }
}