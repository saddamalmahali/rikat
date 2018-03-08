<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Info;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::where('admin', '=', false)->count();
        $res = array();
        $res['total_user']=$data_user;
        $res['total_laporan']=Info::count();
        $res['total_pending']=Info::where('status', '=', 'ditindaklanjuti')->count();
        $res['total_selesai']=Info::where('status', '=', 'selesai')->count();
        $data_pending = new Info();
        $data_pending = $data_pending->orderBy('id', 'desc');
        $data_pending = $data_pending->paginate(5);
        return view('home', ['data'=>$res, 'data_pending'=>$data_pending]);
    }

    public function get_data_user(Request $request)
    {
        $search = $request->get('search');
        $user = User::select('id', 'name')->where('name', 'LIKE', '%'.$search['term'].'%')->get();
        $data = array();

        foreach ($user as $u) {
            $data[] = ['value'=>$u->id, 'id'=>$u->id, 'text'=>$u->name];
        }
        if($data){
            return response()->json(['items'=>$data],201);
        }

        return json_encode(['result'=>'halo']);
    }

    public function not_verified()
    {
        return view('not_verified');
    }
}
