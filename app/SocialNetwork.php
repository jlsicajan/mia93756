<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model {

    protected $table = 'red_social';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

}
