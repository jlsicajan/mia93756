<?php namespace App\Http\Controllers\MainControllers;

use App\Article;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Section;
use App\Slide;
use App\Staff;
use App\SubCategory;
use App\The20;
use App\UserBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class ContentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function index($category, $subcategory, Request $request){
//        $article = Article::findOrFail($article_id);
        if(empty($category)){
            print_r('Category or subcategory not found');die();
        }else{
            $content = Article::get_content_info($category, $subcategory);
            
            if(!empty($content['redirect'])){
                $view_data = $this->where_to_redirect($content, $request);
                
                return view($view_data['view'])->with($view_data['data'])->with(array('main_background' => $content['main_background']));
            }else{
                if($content['is_video']){
                    $view = $request->ajax() ? 'main_views_content.content.view_video' : 'main_views.content.view_video';
                }else{
                    $view = $request->ajax() ? 'main_views_content.content.view' : 'main_views.content.view';
                }
                return view($view)->with(array('content' => $content, 'main_background' => $content['main_background']));
            }
        }
    }

    public function where_to_redirect($content, $request){
        if(strpos($content['redirect'], 'programacion') !== false){
            return $this->programmationPage($request, $content);
        }elseif(strpos($content['redirect'], 'staff') !== false){
            return $this->staffPage($request, $content);
        }elseif(strpos($content['redirect'], 'alfombrarosa') !== false){
            return $this->pinkCarpetPage($request, $content);
        }elseif(strpos($content['redirect'], 'los20') !== false){
            return $this->the20Page($request, $content);
        }else{
            Redirect::route('home');
        }
    }

    public function programmationPage($request, $content){
        $next_shows = $this->get_next_shows();
        $current_show = $this->get_current_show();
        $week_programation = $this->get_week_programation();
        $news = News::where('activo', '=', 1)->get()->toArray();

        $content_for_view = array(
            'next_shows' => $next_shows,
            'current_show' => $current_show,
            'week_programation' => $week_programation,
            'news' => $news,
            'main_banner' => $content['main_banner'],
            'main_background' => $content['main_background'],
            'hide_banner' => $content['hide_banner']
        );

        if ($request->ajax()) {
            $result = array('view' => 'main_views_content.programmation.index', 'data' => $content_for_view);
        }else{
            $result = array('view' => 'main_views.programmation.index', 'data' => $content_for_view);
        }

        return $result;
    }

    public function staffPage($request, $content){
        $staff = Staff::all()->toArray();

        $usuarios_blog = UserBlog::all()->toArray();

        $view = $request->ajax() ? 'main_views_content.staff.index' : 'main_views.staff.index';

        $content_for_view = array(
            'staff_separated' => $staff,
            'staff' => Staff::all()->toArray(),
            'usuarios_blog' => $usuarios_blog,
            'main_banner' => $content['main_banner'],
            'main_background' => $content['main_background'],
            'hide_banner' => $content['hide_banner']);
        return array('view' => $view, 'data' => $content_for_view);
    }

    public function pinkCarpetPage($request, $content){
        $articles_gthoy = Article::where('autor', '=', 'Gthoy')->select('id', 'titulo', 'imagen', 'autor', 'fecha', 'texto_uno')->orderBy('fecha', 'DESC')->get()->toArray();

        $articles_gthoy = Article::sanatize_articles($articles_gthoy);

        $content_paginated = array_chunk($articles_gthoy, 9);

        $view = $request->ajax() ? 'main_views_content.pink_carpet.index' : 'main_views.pink_carpet.index';
        $content_for_view = array(
            'content_count_pag' => count($content_paginated),
            'articles_gthoy' => $content_paginated,
            'main_banner' => $content['main_banner'],
            'main_background' => $content['main_background'],
            'hide_banner' => $content['hide_banner']);

        return array('view' => $view, 'data' => $content_for_view);

    }

    public function the20Page($request, $content){
        $the_20 = The20::orderby('orden', 'DESC')->get()->toArray();

        $view = $request->ajax() ? 'main_views_content.the20.index' : 'main_views.the20.index';
        $content_for_view = array(
            'the20' => $the_20,
            'main_banner' => $content['main_banner'],
            'main_background' => $content['main_background'],
            'hide_banner' => $content['hide_banner']);

        return array('view' => $view, 'data' => $content_for_view);
    }

    function get_next_shows()
    {
        //Abraham's code adapted to laravel ORM, this have to be adapted correctly
        $diaActual = date("N");
        $horaActual = date("G");
        $horaActual *= 100;
        $longitudHA = strlen($horaActual);
        $concatHA = $diaActual * $longitudHA * $horaActual;
        $arregloProgramas = [];
        $limite = 6;

        $empresa_id = env('RADIO_ID');
        $proximosProgramasP1 = "SELECT PON.id AS Id FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id WHERE D.id_php = " . $diaActual . " AND PON.activo = 1 AND PON.empresa_id = " . $empresa_id . " AND (D.id_php * length(trim(PON.inicio_formato)) * PON.inicio_formato) > " . $concatHA . " ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT " . $limite;
        $proximosProgramasP1 = DB::select($proximosProgramasP1);

        $resultadoPPp1 = $proximosProgramasP1;

        foreach ($resultadoPPp1 AS $datosPPp1) {
            array_push($arregloProgramas, $datosPPp1->Id);
        }

        $contadorPPp1 = count($resultadoPPp1);
        $limite -= $contadorPPp1;
        $ordenMostrar = "D.id_php ASC,";
        if ($limite) {
            if ($diaActual === 7) {
                $diaActual = 1;
                $ordenMostrar = "D.id_php DESC,";
            }
            else {
                $diaActual++;
                $ordenMostrar = "D.id_php ASC,";
            }

            $proximosProgramasP2 = "SELECT PON.id AS Id FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id WHERE D.id_php = " . $diaActual . " AND PON.activo = 1 AND PON.empresa_id = " . $empresa_id . " ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT " . $limite;

            $resultadoPPp2 = DB::select($proximosProgramasP2);


            foreach ($resultadoPPp2 AS $datosPPp2) {
                array_push($arregloProgramas, $datosPPp2->Id);
            }
        }


        $programacionIdS = implode(",", $arregloProgramas);
        $programacionIdS = empty($programacionIdS) ? '' : $programacionIdS;
        $proximosProgramas = "SELECT PON.*, D.nombre AS Dia, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id INNER JOIN programa PMA ON PON.programa_id = PMA.id WHERE PON.id IN(" . $programacionIdS . ") ORDER BY " . $ordenMostrar . " concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC";


        $proximosProgramas = empty($programacionIdS) ? [] : DB::select($proximosProgramas);


        return $proximosProgramas;
    }

    function get_current_show(){
        //Abrahams files header adapted
        $empresa_id = env('RADIO_ID');
        $diaActual = date("N");
        $horaActual = date("G");
        $horaActual *=  100;

        $programaAlAireMnr="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON D.id = PON.dia_id INNER JOIN programa PMA ON PMA.id = PON.programa_id WHERE PON.inicio_formato <= " . $horaActual . " AND D.id_php = " . $diaActual . " AND PON.activo = 1 AND PON.empresa_id = " . $empresa_id . " ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) DESC LIMIT 0,1";
        $resultadoPAAMnr= DB::select($programaAlAireMnr);

        $programaAlAireMyr="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON D.id = PON.dia_id INNER JOIN programa PMA ON PMA.id = PON.programa_id WHERE PON.inicio_formato >= " . $horaActual . " AND D.id_php = " . $diaActual . " AND PON.activo = 1 AND PON.empresa_id = " . $empresa_id . " ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT 0,1";
        $resultadoPAAMyr= DB::select($programaAlAireMyr);

//        print_r($resultadoPAAMyr);die();
//        print_r($resultadoPAAMyr);die();

        if(empty($resultadoPAAMyr) && empty($resultadoPAAMnr)){
            $mensajePAAF = "Próximo programa";
            $tituloPAAF = "No hay programa";
            $imagenPAAF = "";
            $inicioPAAF = "00:00";
            $finPAAF = "00:00";
            return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
        }else{
            if(isset($resultadoPAAMnr[0]) && !empty($resultadoPAAMnr[0])){
                $resultadoPAAMnr = $resultadoPAAMnr[0];
                $inicioMnr = $this->convertirHoraMilitar($resultadoPAAMnr->inicio);
                $finMnr = $this->convertirHoraMilitar($resultadoPAAMnr->fin);
            }

            if(isset($resultadoPAAMyr[0]) && !empty($resultadoPAAMyr[0])) {
                $resultadoPAAMyr = $resultadoPAAMyr[0];
                $inicioMyr = $this->convertirHoraMilitar($resultadoPAAMyr->inicio);
                $finMyr = $this->convertirHoraMilitar($resultadoPAAMyr->fin);
            }


            if($resultadoPAAMnr && !$resultadoPAAMyr){
                $mensajePAAF = "Al aire ahora";
                $tituloPAAF = $resultadoPAAMnr->Titulo;
                $imagenPAAF = $resultadoPAAMnr->Imagen;
                $inicioPAAF = $resultadoPAAMnr->inicio;
                $finPAAF = $resultadoPAAMnr->fin;
                return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
            }
            else if(!$resultadoPAAMnr && $resultadoPAAMyr){
                $mensajePAAF = "Próximo programa";
                $tituloPAAF = $resultadoPAAMyr->Titulo;
                $imagenPAAF = $resultadoPAAMyr->Imagen;
                $inicioPAAF = $resultadoPAAMyr->inicio;
                $finPAAF = $resultadoPAAMyr->fin;
                return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
            }
            else if(!$resultadoPAAMnr && !$resultadoPAAMyr){
                $mensajePAAF = "Próximo programa";
                $tituloPAAF = "No hay programa";
                $imagenPAAF = "";
                $inicioPAAF = "00:00";
                $finPAAF = "00:00";
                return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
            }
            else{
                // SI SON IGUALES
                if( ($inicioMnr == $inicioMyr) && ($finMnr == $finMyr) ){
                    $mensajePAAF = "Próximo programa";
                    $tituloPAAF = $resultadoPAAMnr->Titulo;
                    $imagenPAAF = $resultadoPAAMnr->Imagen;
                    $inicioPAAF = $resultadoPAAMnr->inicio;
                    $finPAAF = $resultadoPAAMnr->fin;
                    return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
                }

                if($finMnr > $horaActual){
                    $mensajePAAF = "Al aire ahora";
                    $tituloPAAF = $resultadoPAAMnr->Titulo;
                    $imagenPAAF = $resultadoPAAMnr->Imagen;
                    $inicioPAAF = $resultadoPAAMnr->inicio;
                    $finPAAF = $resultadoPAAMnr->fin;
                    return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
                }
                else{
                    $mensajePAAF = "Próximo programa";
                    $tituloPAAF = $resultadoPAAMyr->Titulo;
                    $imagenPAAF = $resultadoPAAMyr->Imagen;
                    $inicioPAAF = $resultadoPAAMyr->inicio;
                    $finPAAF = $resultadoPAAMyr->fin;
                    return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
                }
            }
        }

        return array('PAFF_message' => $mensajePAAF, 'PAFF_titulo' => $tituloPAAF, 'PAFF_image' => $imagenPAAF, 'PAFF_start' => $inicioPAAF, 'PAFF_end' => $finPAAF);
    }

    function get_week_programation(){
        $empresa_id = env('RADIO_ID');
        $diasDeProgramacionS = "SELECT * FROM dia ORDER BY orden ASC";
        $resultadoDDPs = DB::select($diasDeProgramacionS);
        $result = [];
        foreach($resultadoDDPs AS $datosDDPs){
            $programacionPorDia="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen, PMA.contenido AS Contenido FROM programacion PON INNER JOIN programa PMA ON PON.programa_id = PMA.id WHERE PON.activo = 1 AND PON.empresa_id = " . $empresa_id . " AND PON.dia_id = " . $datosDDPs->id . " ORDER BY concat(length(trim(PON.inicio_formato)), PON.inicio_formato) ASC";
            $resultadoPPD = DB::select($programacionPorDia);

            if($datosDDPs->id_php == date('N')){
                array_push($result, ['active', $datosDDPs->nombre, $datosDDPs->id_php, $resultadoPPD]);
            }else{
                array_push($result, ['inactive', $datosDDPs->nombre, $datosDDPs->id_php, $resultadoPPD]);
            }
        }

        return $result;

    }

    function convertirHoraMilitar($hora){
        if(strpos($hora, "AM") !== false){
            if(strpos($hora, "12") !== false){
                $hora = 0;
            }
            else{
                $hora = trim(str_replace("PM", "", (str_replace("AM", "", (str_replace(":", "", trim($hora)))))));
            }
        }
        else{
            if(strpos($hora, "12") !== false){
                $hora = 1200;
            }
            else{
                $hora = trim(str_replace("PM", "", (str_replace("AM", "", (str_replace(":", "", trim($hora)))))));
                $hora += 1200;
            }
        }

        return $hora;
    }
}
