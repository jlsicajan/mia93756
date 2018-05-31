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

    public static function get_content_info($category, $subcategory){
        $category_info = Category::find($category);

        if($subcategory != 0){
            $subcategory_info = SubCategory::find($subcategory);
            $is_video = $subcategory_info->video;
            $path_info = $category_info->nombre . ' > ' . $subcategory_info->nombre;
            $main_background = Article::get_company_path(empty($subcategory_info->fondo) ? $category_info->fondo : $subcategory_info->fondo);
            $main_banner = Article::get_banner_path(empty($subcategory_info->banner) ? $category_info->banner : $subcategory_info->banner);
            $hide_banner = $subcategory_info->oculta_banner;
            $redirect = $subcategory_info->url;
        }else{
            //only category
            $is_video = $category_info->video;
            $path_info = $category_info->nombre;
            $main_background = Article::get_company_path($category_info->fondo);
            $main_banner = Article::get_banner_path($category_info->banner);
            $hide_banner = $category_info->oculta_banner;
            $redirect = $category_info->url;
        }

        $content = $subcategory != 0 ? Article::get_by_sub_category($category, $subcategory) : Article::get_by_category($category);
        $main_elements = $subcategory != 0 ? Article::check_main_elements($subcategory_info) : Article::check_main_elements($category_info);

        return array(
            'is_video' => $is_video,
            'content' => $content, 'main_background' => $main_background,
            'main_banner' => $main_banner, 'path_info' => $path_info,
            'hide_banner' => $hide_banner, 'redirect' => $redirect, 'main_elements' => $main_elements
        );
    }

    public static function get_by_category($category){
        $content = Article::where('categoria_id', '=', $category)->orderBy('fecha', 'DESC')->get()->toArray();
        return $content;
    }

    public static function get_by_sub_category($category, $subcategory){
        $content = Article::where('categoria_id', '=', $category)->where('sub_categoria_id', '=', $subcategory)->orderBy('fecha', 'DESC')->get()->toArray();
        return $content;
    }

    public static function get_company_path($element){
        return env('URL_RADIO_INFO_PATH')  . '/' . filter_var($element, FILTER_SANITIZE_ENCODED);
    }

    public static function get_banner_path($banner_name){
        if(empty($banner_name)){
            return Section::get_banner();
        }

        return array(0 => env('URL_RADIO_INFO_PATH')  . '/' . filter_var($banner_name, FILTER_SANITIZE_ENCODED));
    }

    public static function limit_words($string, $word_limit)
    {
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

    public static function check_main_elements($category){
        $main_elements = array('instagram' => false);
        if(strpos($category, 'REDES') !== false){
            $main_elements['instagram'] = true;
        }

        return $main_elements;
    }
}
