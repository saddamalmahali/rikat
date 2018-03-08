<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends ApiController
{
    public function login(Request $request)
    {
        // return json_encode(['status'=>'response', 'data'=>$request->all()]);
        if($this->attemptLogin($request)){
            $user = Auth::user();
            $success['user']= $user;
            $success['token'] = $user->createToken('RikatApp')->accessToken;
            return $this->responseApi($success, 200);
        }else{
            return json_encode(['status'=>'gagal', 'message'=>'Login Gagal!']);
        }

        // return json_encode($request->all());
    }


    public function create(Request $request)
    {
        $validation = $this->validate($request, [
            'username'=>'required',
            'password'=>'required'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 401);
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
        }else{
            $user = Auth::user();
            if($user)
            {
                if($user->hasRole('admin'))
                {
                    return json_encode([
                            'status'=>'sukses', 
                            'role'=>'admin'
                        ]); 
                }else{
                    return json_encode([
                            'status'=>'sukses', 
                            'role'=>'client'
                        ]);
                }
                // return json_encode(['status'=>'sukses','code'=>200, 'module'=>'create_user', 'data'=>$request->all() ]);
            }else{
                return json_encode([
                        'status'=>'gagal', 
                        'code'=>401, 
                        'message'=>'Memerlukan Autentikasi untuk melakukan ini'
                    ]);
            }   
        }
    }   
}
