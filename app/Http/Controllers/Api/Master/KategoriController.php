<?php

namespace App\Http\Controllers\Api\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = array();
        $data['data']= Kategori::all();
        $data['status']='sukses';
        
        return response()->json($data, 200);
    }

    public function simpan_data(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'deskripsi'=>'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama = request()->get('nama');
        $kategori->deskripsi = request()->get('deskripsi');

        if($kategori->save())
        {
            $data['data']=$kategori;
            $data['status']='sukses';
            $data['message']="Berhasil Menyimpan Data Kategori";
            return response()->json($data, 200);
        }
    }

    public function hapus_data($id_kategori, Request $request)
    {
        $kategori = Kategori::findOrFail($id_kategori);

        if($kategori->delete()){
            $data['data']=$kategori;
            $data['status']='sukses';
            $data['message']='Berhasil Menghapus Data Kategori';
            return response()->json($data, 200);
        }
        
    }

    public function get_kategori($id_kategori, Request $request)
    {
        $kategori = Kategori::findOrFail($id_kategori);

        if($kategori){
            $data['data']=$kategori;
            $data['status']='sukses';
            return response()->json($data, 200);
        }
    }

    public function demo_upload(Request $request)
    {
        $statusFile = 'kosong';
        if($request->hasFile('foto')){
            $statusFile = 'Isi';
        }
        return response()->json(['status'=>'sukses', 'data'=> $statusFile], 200);
    }

}