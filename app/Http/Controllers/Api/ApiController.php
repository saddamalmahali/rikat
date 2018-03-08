<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class ApiController extends Controller
{
    public function responseApi(array $data, $status = 'success')
    {
        return response()->json($data, $status);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
