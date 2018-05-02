<?php namespace App\Http\Controllers;
use App\Article;

class HomeController extends Controller {

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
    	$articles = Article::all()->toArray();
        $articles = array_chunk($articles, count($articles)/2 + 1);
        return view('home')->with(['articles' => $articles]);
    }

}
