<?php

namespace App\Http\Controllers\MainControllers;

use App\Section;
use App\Slide;
use App\Staff;
use App\UserBlog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all()->toArray();
//        $staff = array_chunk($staff, 3);

        $usuarios_blog = UserBlog::all()->toArray();
        $main_banner = Section::get_banner();
    
        // print_r(Staff::all()->toArray());die();
        return view('main_views.staff.index')->with(array('staff_separated' => $staff, 
                'staff' => Staff::all()->toArray(),
                'usuarios_blog' => $usuarios_blog,
                'main_banner' => $main_banner));
    }

    public function index_ajax(Request $request)
    {
        if (! $request->ajax()) {
            return Redirect::route('staff');
        }

        $staff = Staff::all()->toArray();

        $usuarios_blog = UserBlog::all()->toArray();
        $main_banner = Section::get_banner();

        return view('main_views_content.staff.index')->with(array('staff_separated' => $staff,
                'staff' => Staff::all()->toArray(),
                'usuarios_blog' => $usuarios_blog,
                'main_banner' => $main_banner));
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
