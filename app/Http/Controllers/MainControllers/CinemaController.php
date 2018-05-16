<?php

namespace App\Http\Controllers\MainControllers;

use App\Section;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billboard;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Billboard::with('location')->get()->toArray();
        if(count($movies) == 2){
            $movies = array_chunk($movies, 1);
        }else{
            $movies = array_chunk($movies, count($movies) / 2);
        }
        $section_header = Section::where('nombre', '=', 'header')->first();
    
        if($section_header){
            $get_path = Slide::where('id_tabla', '=', $section_header->id)->first();
        
            if($get_path){
                $header_path = env('URL_SLIDE_PATH')  . $get_path->identificador . '/' . filter_var($get_path->nombre, FILTER_SANITIZE_ENCODED);
            }else{
                $header_path = '/public/img/header/mia_header.png';
            }
        }else{
            $header_path = '/public/img/header/mia_header.png';
        }
    
        // print_r($movies);die();
        return view('main_views.cinema.index')->with(array('movies' => $movies,
                'header_path' => $header_path));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
