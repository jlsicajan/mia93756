<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model {

    protected $table = 'multimedia';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }
}
