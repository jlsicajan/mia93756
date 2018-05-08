<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    
    protected $table = 'multimedia_ruta';
    
    public function newQuery()
    {
        return parent::newQuery()->where('id_tabla', '=', env("RADIO_ID"))->where('tipo', '=', 'multimedia');
    }


}
