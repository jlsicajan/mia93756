<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ubicacion';

    public function billboards(){
    	return $this->hasMany('App\Billboard');
    }

}
