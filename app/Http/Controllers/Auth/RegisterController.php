<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('confirmed');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $confirmation_code = str_random(30);
        
        // Mail::send('email.verify', $confirmation_code, function($message) {
        //     $message->to($data['email'], $data['name'])
        //         ->subject('Verify your email address');
        // });
        Mail::to($data['email'])->send(new RegistrationMail($confirmation_code));
        return User::create([
            'name' => $data['name'],
            'username'=>$data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code'=> $confirmation_code
        ]);
        
        
    }

    public function konfirmasi_akun($confirmation_code)
    {
        echo "Ini Adalah Halaman Konfirmasi Kode";
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }
        $user = new User();
        $user = $user->where('confirmation_code', '=', $confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }
        
        $user->confirmed = 1;
        $user->confirmation_code = null;
        // return json_encode($user);
        $user->save();


        return redirect('/login')->with('sukses', 'Akun berhasil terverivikasi!');
    }
}
