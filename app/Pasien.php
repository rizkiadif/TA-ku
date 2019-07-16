<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table="pasien";
	protected $primaryKey = 'id';
    public $timestamps = false;

    function diagnosa()
    {
        return $this->hasMany('App\Diagnosa', 'id', 'id_pasien');
    }
}

