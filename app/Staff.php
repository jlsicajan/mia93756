<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

}
