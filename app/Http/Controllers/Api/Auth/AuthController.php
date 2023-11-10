<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }



    public function login_(Request $request){

        // return response()->json('cheguei aqui');

         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Dados incorretos!']
            ]);
        }

        $token_abilities = [
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy',
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy', 
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy', 
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy',
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy', 
            'user.create',
            'user.update',
            'user.destroy',
            'produtc.create',
            'produtc.update',
            'produtc.destroy',             
        ];

        //Login unico, Logout todos devices
        // if ($request->has('logout_others_devices'))
        //$user->tokens()->delete();
        
        $token = $user->createToken('auth-token',$token_abilities)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }



    public function profile(){
        
    }
}
