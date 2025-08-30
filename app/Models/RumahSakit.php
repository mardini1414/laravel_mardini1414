<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = "rumah_sakit";
    protected $guarded = [];

    public function pasiens()
    {

        return $this->hasMany(Pasien::class);

    }
}
