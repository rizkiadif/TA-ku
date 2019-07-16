<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table="diagnosa";
	protected $primaryKey = 'id';
    public $timestamps = false;

    function pasien()
    {
        return $this->belongsTo('App\Pasien', 'id_pasien', 'id');
    }

}
