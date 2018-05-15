<?php

namespace App\Http\Controllers\MainControllers;

use App\Photo;
use App\Section;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all()->toArray();
        if(count($photos) == 2){
            $photos = array_chunk($photos, 1);
        }else{
            $photos = array_chunk($photos, count($photos) / 2);
        }
    
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

//        print_r($photos);die();
        return view('main_views.photos.index')->with(array('photos' => $photos,
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
