<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articulo';

    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
