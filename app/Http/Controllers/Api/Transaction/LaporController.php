<?php
namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Info;
class LaporController extends Controller
{
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'foto'=>'required|image',
        //     'judul'=>'required|min:2|max:50',
        //     'location'=>'required',
        //     'deskripsi'=>'required|min:5|max:255',
        //     'tanggal'=>'required'
        // ]);

        $statusGambar = '';
        // $data = $request->get('foto');
        $lapor = new Info();
        // if($request->hasFile('gambar')){
        //     $statusGambar = 'ada';
        // }

        if($judul = $request->get('judul')){
            $lapor->judul = $judul;
        }

        if($kategori = $request->get('kategori')){
            $lapor->id_kategori = $kategori;
        }
        
        if($deskripsi = $request->get('deskripsi')){
            $lapor->deskripsi = $deskripsi;
        }

        if($tanggal = date('Y-m-d', strtotime($request->get('tanggal')))){
            $lapor->tanggal = $tanggal;
        }

        if($location = json_decode($request->get('location'))){
            $lapor->lat = $location->coords->latitude;
            $lapor->long = $location->coords->longitude;
        }

        if($request->hasFile('gambar')){
            $nama = $this->random_str('alphanum', 10);
            $path = $request->gambar->storeAs('images', $nama.'.jpg');
            $lapor->gambar = $path;
        }

        if($id_user = $request->get('id_user')){
            $lapor->id_user = $id_user;
        }
        
        $lapor->status = 'dilaporkan';

        // $data = $request->all();
        // $location = json_decode($request->get('location'));
        if($lapor->save()){
            return response()->json(['status'=>'sukses', 'message'=>'Laporan Berhasil Disimpan : '], 200);
        }

        // $latitude = $location['coords'];

        
    }

    public function get_data(){
        $res = array();
        $data_lapor = Info::orderBy('id', 'desc');
        // $data_lapor = $data_lapor->orederBy(['id', 'desc']);
        $data_lapor = $data_lapor->get();

        $res_data = array();
        //Parsing dari Model
        $res_data = $this->buildDataResponse($data_lapor);

        if($data_lapor){
            $res['data_lapor'] = $res_data;
        }else{
            $res['data_lapor'] = null;
        }
        
        $res['status'] = "sukses";

        return response()->json($res, 200);
    }

    protected function buildDataResponse($data = null){
        $res = array();
        if($data){
            $parsing = array();
            foreach($data as $lapor){
                $parsing['id']=$lapor->id;
                $parsing['judul']=$lapor->judul;
                $parsing['laporan']= $lapor->user->name;
                $parsing['deskripsi']= $lapor->deskripsi;
                $parsing['waktu']=date('d-m-Y', strtotime($lapor->created_at));
                array_push($res, $parsing);
            }
        }

        return $res;
    }

    /**
     * Generate and return a random characters string
     *
     * Useful for generating passwords or hashes.
     * 
     * The default string returned is 8 alphanumeric characters string.
     *
     * The type of string returned can be changed with the "type" parameter.
     * Seven types are - by default - available: basic, alpha, alphanum, num, nozero, unique and md5. 
     *
     * @param   string  $type    Type of random string.  basic, alpha, alphanum, num, nozero, unique and md5.
     * @param   integer $length  Length of the string to be generated, Default: 8 characters long.
     * @return  string
     */
    function random_str($type = 'alphanum', $length = 8)
    {
        switch($type)
        {
            case 'basic'    : return mt_rand();
                break;
            case 'alpha'    :
            case 'alphanum' :
            case 'num'      :
            case 'nozero'   :
                    $seedings             = array();
                    $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $seedings['num']      = '0123456789';
                    $seedings['nozero']   = '123456789';
                    
                    $pool = $seedings[$type];
                    
                    $str = '';
                    for ($i=0; $i < $length; $i++)
                    {
                        $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                    }
                    return $str;
                break;
            case 'unique'   :
            case 'md5'      :
                        return md5(uniqid(mt_rand()));
                break;
        }
    }
}
