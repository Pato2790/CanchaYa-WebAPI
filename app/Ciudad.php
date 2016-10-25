<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    public $timestamps = false;
    
    public function provincia()
    {
        return $this->belongsTo('App\Provincia','id_provincia');
    }
}
