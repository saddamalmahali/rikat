<?php
namespace App\Http\Controllers\Api\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Info;
class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $statusFile = "";
        if($request->hasFile('foto')){
            $statusFile = "Ada";
        }

        return response()->json(['status'=>'sukses', 'message'=>$request->all()]);
    }

    public function get_image($id_lapor){
        
        if($lapor = Info::find($id_lapor)){
            $image = Storage::get($lapor->gambar);
            return response($image, 200)->header('Content-Type', 'image/jpeg');
        }
        

        
    }

}
