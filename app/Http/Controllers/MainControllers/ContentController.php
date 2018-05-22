<?php namespace App\Http\Controllers\MainControllers;

use App\Article;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use App\SubCategory;
use Illuminate\Http\Request;

class ContentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function index($category, $subcategory){
//        $article = Article::findOrFail($article_id);
        if(empty($category)){
            print_r('Category or subcategory not found');die();
        }else{
            $category_info = Category::find($category);
            $subcategory_info = SubCategory::find($subcategory);
            $path_info = '';

            if($subcategory != 0){
                $articles = Article::where('categoria_id', '=', $category)->where('sub_categoria_id', '=', $subcategory)->get()->toArray();
                $path_info = $category_info->nombre . ' > ' . $subcategory_info->nombre;
            }else{
                $articles = Article::where('categoria_id', '=', $category)->get()->toArray();
                $path_info = $category_info->nombre;
            }
//            $articles = Article::all()->toArray();
            $articles = count($articles) > 1 ? array_chunk($articles, count($articles) / 2) : $articles;
            if(count($articles) == 1){
                $new_articles[0] = $articles;
                $new_articles[1] = array();
                $articles = $new_articles;
            }

//            print_r($articles);die();
            $main_banner = Section::get_banner();

            return view('main_views.content.view')->with(array('articles' => $articles,
                'main_banner' => $main_banner, 'path_info' => $path_info));
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
