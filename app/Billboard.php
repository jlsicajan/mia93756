<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Billboard extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cartelera';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }


    public function location(){
        return $this->belongsTo('App\Location', 'ubicacion_id');
    }
}
