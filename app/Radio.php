<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresa';

    public function newQuery()
    {
        return parent::newQuery()->where('id', '=', env("RADIO_ID"));
    }

    public static function get_logo(){
        $logo_path = Radio::select('logo')->first();
        return $logo_path->logo;
    }

    public static function get_subscription_title(){
        $insta_title = Radio::select('titulo_suscripcion')->first();
        return $insta_title->titulo_suscripcion;
    }
}
