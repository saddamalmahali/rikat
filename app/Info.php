<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'username', 
        'confirmation_code', 
        'confirmed'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function kategori(){
        return $this->hasOne('App\Kategori', 'id', 'id_kategori');
    }

}
