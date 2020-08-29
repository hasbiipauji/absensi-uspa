<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'status', 'keterangan', 'image', 'latitude', 'longtude', 'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
