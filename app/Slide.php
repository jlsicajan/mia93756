<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {
    
    protected $table = 'multimedia_ruta';
    
    public function newQuery()
    {
        return parent::newQuery()->where('tipo', '=', 'slide')->orderBy('orden', 'ASC');
    }

}
