<?php namespace blog\Http\Controllers;

use blog\Post;
use blog\User;
use blog\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\FriendFormRequest;
use DB;
use Models;
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

	public function showBlog()
	{
        $username = Auth::user()->name;
        $posts = Post::where('user_id',  Auth::user()->id)->get();
        return view('content.posts')->with('username',$username)->with('posts', $posts)->with('own', true);
	}

    public function showAddingPost()
    {
        $user = Auth::user();
        return view('content.new')->with('username',$user->name);
    }

    public function showEditingPost($id)
    {
        $post = Post::findOrFail($id);
        return view('content.edit')->with('post',$post);
    }

    public function showFeed()
    {
        $posts = Post::get();
        $users = User::get();
        return view('content.feed')->with('posts', $posts)->with('users', $users);
    }

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
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $user_id = Auth::user()->id;

        Post::create(['title' => $title, 'body' => $body, 'user_id'=>$user_id]);

        return redirect('home')->with('status', 'Post successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $post = Post::findOrFail($id);
        return view('content.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id==$post->user_id) {
            $title = $request->input('title');
            $body = $request->input('body');
            $post->title = $title;
            $post->body = $body;
            $post->save();
            return redirect('home')->with('status', 'Post successfully edited!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id==$post->user_id) {
            $post->delete();
            return redirect('home')->with('status', 'Post successfully deleted!');
        }
    }
}
