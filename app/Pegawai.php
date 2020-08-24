<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['pegawai'];

    public function  jabatan(){
        return $this->belongsTo('App\jabatan');
    }
}
