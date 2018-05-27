<?php namespace App\Http\Controllers\MainControllers;

use App\Article;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use App\Slide;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            if($content['is_video']){
                $view = $request->ajax() ? 'main_views_content.content.view_video' : 'main_views.content.view_video';
            }else{
                $view = $request->ajax() ? 'main_views_content.content.view' : 'main_views.content.view';
            }
            return view($view)->with(array('content' => $content));
        }
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
