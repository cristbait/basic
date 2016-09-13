<?php namespace blog\Http\Controllers;

use blog\Post;
use blog\User;
use blog\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FriendFormRequest;
use DB;
use App\Quotation;

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
    // См. конвенции именований, название метода всегда должно быть действием
	public function blog()
	{
        $username = Auth::user()->name;
        $posts = Post::where('user_id',  Auth::user()->id)->get();
        return view('content.posts')->with('username',$username)->with('posts', $posts)->with('own', true);
// В комментариях кода быть не должно
       // return view('main')->with();
	}
// addPost, скорее
    public function newPost()
    {
        $user = Auth::user();
        return view('content.new')->with('username',$user->name);

        // return view('main')->with();
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('content.edit')->with('post',$post);

        // return view('main')->with();
    }

    // Названия, см. выше
    public function feed()
    {
        //$posts=DB::table('posts')
           // ->join('posts', 'users.id', '=', 'posts.user_id')
         //   ->orderBy('posts.created_at')
           // ->where('posts.user_id', '=', 'users.id')
         //   ->get();
        $posts = Post::get();
        //$posts = Post::get();
        $users = User::get();
        return view('content.feed')->with('posts', $posts)->with('users', $users);

        // return view('main')->with();
    }


    // Названия, см. выше
    public function user($id)
    {
        $username = User::findOrFail($id)->name;
        $posts = Post::where('user_id', $id)->get();

        //  Здесь middleware  нужен
        if (Auth::user()->id==$id)
            {
                return redirect()->action('ContentController@blog');
            }
            else {

                return view('content.posts')->with('username', $username)->with('posts', $posts)->with ('own', false);
            }
        // return view('main')->with();
    }

}
