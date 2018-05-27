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
            $main_background = Article::get_company_path($subcategory_info->fondo);
            $main_banner = Article::get_banner_path($subcategory_info->banner);
            $hide_banner = $subcategory_info->oculta_banner;
        }else{
            //only category
            $is_video = $category_info->video;
            $path_info = $category_info->nombre;
            $main_background = Article::get_company_path($category_info->fondo);
            $main_banner = Article::get_banner_path($category_info->banner);
            $hide_banner = $category_info->oculta_banner;
        }

        $content = $subcategory != 0 ? Article::get_by_sub_category($category, $subcategory) : Article::get_by_category($category);
        if(!$is_video){
            //reorder for articles display, for the moment, this should be fixed
            $content = count($content) > 1 ? array_chunk($content, count($content) / 2) : $content;
            if(count($content) == 1){
                $new_articles[0] = $content;
                $new_articles[1] = array();
                $content = $new_articles;
            }
        }

        return array(
            'is_video' => $is_video,
            'content' => $content, 'main_background' => $main_background,
            'main_banner' => $main_banner, 'path_info' => $path_info,
            'hide_banner' => $hide_banner
        );
    }

    public static function get_by_category($category){
        $content = Article::where('categoria_id', '=', $category)->get()->toArray();
        return $content;
    }

    public static function get_by_sub_category($category, $subcategory){
        $content = Article::where('categoria_id', '=', $category)->where('sub_categoria_id', '=', $subcategory)->get()->toArray();
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
}
