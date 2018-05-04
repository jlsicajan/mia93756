<?php namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }
    
    public function index()
    {
        $articles = Article::all()->take(8)->toArray();
        $articles = array_chunk($articles, count($articles) / 2 + 1);
        $next_shows = $this->get_next_shows();
        
        return view('home')->with(array('articles' => $articles, 'next_shows' => $next_shows));
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
        
        // echo "<pre>";
        // print_r($arregloProgramas);
        // echo "</pre>";
        
        $programacionIdS = implode(",", $arregloProgramas);
        
        $proximosProgramas = "SELECT PON.*, D.nombre AS Dia, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id INNER JOIN programa PMA ON PON.programa_id = PMA.id WHERE PON.id IN(" . $programacionIdS . ") ORDER BY " . $ordenMostrar . " concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC";
        $proximosProgramas = DB::select($proximosProgramas);

        return $proximosProgramas;
    }
    
}
