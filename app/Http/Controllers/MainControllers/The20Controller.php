<?php

namespace App\Http\Controllers\MainControllers;

use App\Section;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\The20;

class The20Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $the_20 = The20::orderby('orden', 'DESC')->get()->toArray();
        $section_header = Section::where('nombre', '=', 'header')->first();
    
        if($section_header){
            $get_path = Slide::where('id_tabla', '=', $section_header->id)->first();
        
            if($get_path){
                $header_path = env('URL_SLIDE_PATH')  . $get_path->ruta;
            }else{
                $header_path = '/public/img/header/mia_header.png';
            }
        }else{
            $header_path = '/public/img/header/mia_header.png';
        }
    
        // print_r($the_20);die();
        return view('main_views.the20.index')->with(array('the20' => $the_20,
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
