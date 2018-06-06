<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    
    
    protected $table = 'seccion';
    
    public function newQuery()
    {
        return parent::newQuery()->where('empresa_id', '=', env("RADIO_ID"));
    }

    public static function get_banner(){
    	$section_header = Section::where('nombre', '=', 'header')->first();
        $header_path = array();

        if($section_header){
            $route_banner = Slide::where('id_tabla', '=', $section_header->id)->get()->toArray();
            if(count($route_banner) > 0){
                foreach($route_banner as $banner){
                    $banner_path = env('URL_SLIDE_PATH')  . $banner['identificador'] . '/' . filter_var($banner['nombre'], FILTER_SANITIZE_ENCODED);
                    array_push($header_path, array('route' => $banner_path, 'data' => $banner));
                }
            }else{
                array_push($header_path, array('route' => '/public/img/header/mia_header.png', 'data' => ''));
            }
        }else{
            array_push($header_path, array('route' => '/public/img/header/mia_header.png', 'data' => ''));
        }

        return $header_path;

    }

    public static function get_background(){
        $section_background = Section::where('nombre', '=', 'background')->first();
        $route_background = Slide::where('id_tabla', '=', $section_background->id)->first()->toArray();
        $background_path = env('URL_SLIDE_PATH')  . $route_background['identificador'] . '/' . filter_var($route_background['nombre'], FILTER_SANITIZE_ENCODED);

        return $background_path;
    }

    public static function get_the20_background(){
        $section_background = Section::where('nombre', 'like', '%' . 'cantando' . '%')->first();
        $route_background = Slide::where('id_tabla', '=', $section_background->id)->first()->toArray();
        $background_path = env('URL_SLIDE_PATH')  . $route_background['identificador'] . '/' . filter_var($route_background['nombre'], FILTER_SANITIZE_ENCODED);

        return $background_path;
    }
    
    public static function get_the20_url(){
        $section_background = Section::where('nombre', 'like',  '%' . 'cantando' . '%')->first();
        $slide_info = Slide::where('id_tabla', '=', $section_background->id)->first()->toArray();
        return $slide_info['link'];
    }
}
