<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RbPenyakit extends Model
{
    protected $table = 'rb_penyakit';
    public $timestamps = false;
    public $primaryKey = 'id_penyakit';
}
