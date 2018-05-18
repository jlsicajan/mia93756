<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categoria';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

    public function articles(){
        return $this->hasMany('App\Article', 'categoria_id');
    }

    public function subcategories(){
        return $this->hasMany('App\SubCategory', 'categoria_id');
    }

    public static  function list_for_menu(){
        $categories_list = Category::with('subcategories')->orderBy('orden', 'ASC')->get()->toArray();
        return $categories_list;
    }
}
