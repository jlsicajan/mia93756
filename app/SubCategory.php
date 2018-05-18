<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_categoria';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

}
