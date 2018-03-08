<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use Validator;
use DataTables;


class KategoriController extends Controller
{
    public function index($search = array())
    {
        return view('admin.master.kategori.index');
    }

    public function get_data_tabel(Request $request)
    {
//        $kategori =
        return DataTables::eloquent(Kategori::query())
                ->filter(function ($query) {
                    $search = request()->get('search');

                    if ($search['value'] != '') {
                        $query->where('nama', 'LIKE', '%'.$search['value'].'%')
                            ->orWhere('deskripsi', 'LIKE', '%'.$search['value'].'%');
                    }

                    // if (request()->has('deskripsi')) {
                    //     $query->where('deskripsi', 'like', "%{request('deskripsi')}%");
                    // }
                })
                ->toJson();
        // return datatables()->toJson();
//        $query = new Kategori();
//        $search = $request->get('search');
////        return json_encode($search['value']);
//
//        $start = $request->get('start');
//        $length = $request->get('length');
//
//
//        if($search['value'] != ''){
//            $query = $query->where('nama', 'LIKE', '%'.$search['value'].'%')
//                ->orWhere('deskripsi', 'LIKE', '%'.$search['value'].'%');
//        }
////
////        $query = $query->limit($length)->offset($start);
//        $query = $query->limit($length);
//
//        if($start){
//            $query = $query->offset($start);
//        }
//
//        $query = $query->get();
//
//        if($query)
//        {
//            $res = array();
//            $no = 0;
//            foreach ($query as $kategori){
//                $res[]=[
//                  'nama'=>$kategori->nama,
//                  'deskripsi'=>$kategori->deskripsi
//                ];
//                $no = $no++;
//            }
//            $data['draw']= intval($request->get('draw'));
//            $data['recordsTotal']=Kategori::all()->count();
//            $data['recordsFiltered']=$query->count();
//            $data['data']=$res;
//            return response()->json($data, 200);
//        }else{
//
//            return response()->json([
//                'status'=>401,
//                'messages'=>'Data Tidak Ditemukan'
//            ], 200);
//        }
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            $data['status'] = 'error';
            $data['data'] = $validator->errors();
            return response()->json($data, 200);
        }else{
            $idKategori = $request->get('id');
            if(!$idKategori){
                $kategori = new Kategori();
                $kategori->nama = $request->get('nama');
                $kategori->deskripsi = $request->get('deskripsi');

                if($kategori = $kategori->save()){
                    $data['status'] = 'sukses';
                    $data['data'] = $kategori;
                    $data['pesan']= 'Data Berhasil Disimpan';
                    return response()->json($data, 200);

                }
            }

        }
    }

    public function hapus_data(Request $request)
    {
        // $data['status']='sukses';
        // $data['message']='Berhasil menghapus data kategori';

        // return response()->json($data, 200);
        $kategori = Kategori::find($request->get('id_kategori'));
        if($kategori)
        {
            if($kategori->delete()){
                $data['status']='sukses';
                $data['message']='Berhasil menghapus data kategori';

                return response()->json($data, 200);
            }
        }
    }

    

}
