<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!$token = Auth::guard('admin-api')->attempt($credentials))
        {
            return response()->json(['error'=>'Incorrect email/password'], 401);
        }

        return response()->json(['token'=>$token]);

    }

    public function refresh()
    {
        try {
            $newToken = Auth::guard('admin-api')->refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()-json(['error'=>$e->getMessage()], 401);
        }
        
        return response()-json(['token'=>$newToken]);
    }
}
