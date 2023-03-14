<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        $cred = $request->only(['username','paaword']);
        
        if(!$token = Auth::attempt($cred))
        {
            return response()->json([
                'status'=>'fail',
                'message'=>'Incorrect credentials'], 401);
        }
        return response()->json([
            'status'=>'success',
            'authorisation'=>[
                'token'=>$token,
                'type'=>'bearer']], 200);
    }

    public function refresh()
    {
        $token = Auth::refresh();

        return response()->json([
            'status'=>'success',
            'authorisation'=>[
                'token'=>$token,
                'type'=>'bearer']], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status'=>'success',
            'message'=>'Successfully logged out'], 200);
    }
}
