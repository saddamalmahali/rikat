<?php

namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index(Request $request){
        $data['status']='sukses';
        $data['message']='Berhasil Melakukan Request';
        return response()->json();
    }
}
