<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {

    }

    /**
     * login
     * @param Request $request
     * @return JsonResponse
     */
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
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $user = Auth::user();
        $cookie = cookie('jwt', $token, 72000, null, null, false, true);
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ])->withCookie($cookie);
    }

    /**
     * register
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request){
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

        $token = Auth::login($user);
        return response()->json([
            'status' => 'ok',
            'message' => 'User created successfully',
            'user' => $user,
            'token' => $token
        ]);
    }

    /**
     * Logout
     * @return JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        $cookie = Cookie::forget('jwt');
        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully logged out',
        ])->withCookie($cookie);
    }

    /**
     * refresh jwt
     * @return JsonResponse
     */
    public function refresh()
    {
        return response()->json([
            'status' => 'ok',
            'token' => Auth::refresh(),
        ]);
    }

    /**
     * we use this to check if the user is authenticated or not
     * @return JsonResponse
     */
    public function checkAuth()
    {
            return response()->json([
                'isAuthenticated' => true,
            ]);
    }


}
