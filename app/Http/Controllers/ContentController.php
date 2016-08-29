<?php namespace blog\Http\Controllers;

use blog\Post;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller {

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
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function posts()
	{
        $posts = Post::get();
        $user = Auth::user();
        return view('posts')->with('posts', $posts)->with('username',$user->name);

       // return view('main')->with();
	}

}