<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table="penyakit";
	protected $primaryKey = 'id';
    public $timestamps = false;

    function relasi()
    {
        return Relasi::where('id_penyakit', $this->id)->get();
    }
}
