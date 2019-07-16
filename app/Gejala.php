<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
   protected $table="gejala";
	protected $primaryKey = 'id';
    public $timestamps = false;

    public function relasi()
    {
        return $this->belongsTo('App\Relasi', 'id', 'id_gejala');
    }
}

