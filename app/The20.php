<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class The20 extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multimedia_comple';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"))->where('activo', 1);
    }


}
