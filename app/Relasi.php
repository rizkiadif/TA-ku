<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
    protected $table="relasi";
	protected $primaryKey = 'id';
    public $timestamps = false;

    function penyakit()
    {
        return $this->hasOne('App\Penyakit', 'id', 'id_penyakit');
    }

    function gejala()
    {
        return $this->hasOne('App\Gejala', 'id', 'id_gejala');
    }
}

