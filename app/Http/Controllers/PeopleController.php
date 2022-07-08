<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\People;
use Carbon\Carbon;

class PeopleController extends Controller
{
    public function signUp(Request $request)
    {
        People::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        $people = People::where('id',$request->id)->first();
        if(isset($people)) {
            $tokenResult = $people->createToken('Token');

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        }
        else{
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }
    }

    public function getCredentialInfo(Request $request)
    {
        $people = Auth::guard('api')->user();
        return response()->json([
            'id' => $people->id,
            'name' => $people->name,
            'lastname' => $people->lastname,
            'email' => $people->email
        ]);
    }
}
