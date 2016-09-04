<?php namespace blog\Http\Controllers;

use blog\Post;
use blog\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FriendFormRequest;


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

    public function newPost()
    {
        $user = Auth::user();
        return view('new')->with('username',$user->name);

        // return view('main')->with();
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('edit')->with('post',$post);

        // return view('main')->with();
    }

}
