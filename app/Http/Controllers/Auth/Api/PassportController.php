<?php

namespace App\Http\Controllers\Auth\Api;

use App\User;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class PassportController extends Controller
{
    /**
     * Api para registrarte
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'age'=> ['required','integer', 'between:1,150'],
            'gender'=> ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validator_errors' => $validator->errors()
            ]);
        }

        $fields = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'rol_id' => 1
        ];
        
        $user = User::create($fields);

        return $this->authUser($user->email, $request->password);
    }

    /**
     * Api de login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        return $this->authUser($request->email, $request->password);
    }

    /**
     * Revocar sesión de un usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signOut(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'status' => 'OK',
            'message' => 'Se cerro sesión correctamente'
        ]);
    }


    /**
     * Api de test para saver si estas autenticado o no
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function testAuthenticated()
    {
        return response()->json([
            'status' => 'OK',
            'message' => 'Authenticated'
        ]);
    }

    /****************************
     *      PRIVATE METHODS     *
     ****************************/

    /**
     * Autenticar usuario
     *
     * @param $email
     * @param String $password
     * @return \Illuminate\Http\JsonResponse
     *
     * @author Brian Floria <brianflorianp@gmail.com>
     */
    private function authUser($email, $password)
    {
        $oauth = Client::where('id', 2)->first();

        $http = new GuzzleHttpClient();
        $response = $http->post(url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => $oauth->secret,
                'username' => $email,
                'password' => $password,
                'scope' => ''
            ]
        ]);

        $accessToken = json_decode($response->getBody());

        if (!$accessToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales no valida',
                'data' => null,
            ]);
        }

        $user = User::where('email', $email)->first();

        return response()->json([
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'rol_id' => $user->rol_id
                ],
                'tokens' => [
                    'auth' => [
                        'access_token' => $accessToken->access_token,
                        'refresh_token' => $accessToken->refresh_token,
                        'expires_in' => $accessToken->expires_in,
                    ]
                ]
            ]
        ]);
    }
}
