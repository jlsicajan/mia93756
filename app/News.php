<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = 'noticia';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }
}
