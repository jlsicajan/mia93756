<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    
    
    protected $table = 'seccion';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

}
