<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $table="aturan";
	protected $primaryKey = 'id';
    public $timestamps = false;

    public function solusi()
    {
        return $this->hasOne('App\Solusi', 'id', 'id_solusi');
    }

    public function penyakit()
    {
        return $this->hasOne('App\Penyakit', 'id', 'id_penyakit');
    }
}


