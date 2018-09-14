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
            $observations = $category_info->observaciones;
            $main_background = Article::get_company_path(empty($subcategory_info->fondo) ? $category_info->fondo : $subcategory_info->fondo);
            $main_banner = Article::get_banner_path(empty($subcategory_info->banner) ? $category_info->banner : $subcategory_info->banner);
            $hide_banner = $subcategory_info->oculta_banner;
            $redirect = $subcategory_info->url;
        }else{
            //only category
            $is_video = $category_info->video;
            $path_info = $category_info->nombre;
            $observations = $category_info->observaciones;
            $main_background = Article::get_company_path($category_info->fondo);
            $main_banner = Article::get_banner_path($category_info->banner);
            $hide_banner = $category_info->oculta_banner;
            $redirect = $category_info->url;
        }

        $content = $subcategory != 0 ? Article::get_by_sub_category($category, $subcategory) : Article::get_by_category($category);
        $main_elements = $subcategory != 0 ? Article::check_main_elements($subcategory_info) : Article::check_main_elements($category_info);

        $content = Article::sanatize_articles($content);

        $content_paginated = $is_video ? $content : array_chunk($content, 9);

        return array(
            'is_video' => $is_video,
            'content_count_pag' => count($content_paginated),
            'content' => $content_paginated,
            'main_background' => $main_background,
            'main_banner' => $main_banner,
            'path_info' => $path_info,
            'observations' => $observations,
            'hide_banner' => $hide_banner,
            'redirect' => $redirect,
            'main_elements' => $main_elements
        );
    }

    public static function get_background_for_article($category, $subcategory){
        $category_info = Category::find($category);

        if($subcategory != 0){
            $subcategory_info = SubCategory::find($subcategory);
            $main_background = Article::get_company_path(empty($subcategory_info->fondo) ? $category_info->fondo : $subcategory_info->fondo);
        }else{
            //only category
            $main_background = Article::get_company_path($category_info->fondo);
        }

        return array('main_background' => $main_background);
    }

    public static function sanatize_articles($articles){
        $articles_sanatized = [];
        foreach($articles as $fix_article){

            if((substr($fix_article['imagen'], 0, 3) != 'htt') && (substr($fix_article['imagen'], 0, 2) != '//')){
                $fix_article['imagen'] = env('URL_ARTICLE_PATH') . $fix_article['imagen'];
            }
            $fix_article['link_url'] = route('article_one', $fix_article['id']);
            $fix_article['texto_uno'] = Article::limit_words(strip_tags($fix_article['texto_uno']), 35, $fix_article['encriptado']);
            array_push($articles_sanatized, $fix_article);
        };
        return $articles_sanatized;
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

    public static function limit_words($string, $word_limit, $is_ecnrypted = false)
    {
        $string = $is_ecnrypted ? strip_tags(Article::desencriptar_AES($string)) : $string;

        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

    public static function check_encryption($article_content, $is_encrypted = false){
        return $is_encrypted ? Article::desencriptar_AES($article_content) : $article_content;
    }

    public static function check_main_elements($category){
        $main_elements = array('instagram' => false);
        if(strpos($category, 'REDES') !== false){
            $main_elements['instagram'] = true;
        }

        return $main_elements;
    }

    public static function desencriptar_AES($encrypted_data_hex, $key = "elcaminoweb") {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $iv_size_hex = mcrypt_enc_get_iv_size($td) * 2;
        $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
        $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
        mcrypt_generic_init($td, $key, $iv);
        $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $decrypted;
    }
}
