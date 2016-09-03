<?php namespace blog\Http\Controllers;

use blog\Http\Requests;
use blog\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use blog\Post;
use Illuminate\Support\Facades\Session;


class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
    public function store(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $user_id = Auth::user()->id;
        $input = $request->all();
        Post::create(['title' => $title, 'body' => $body, 'user_id'=>$user_id]);

        Session::flash('flash_message', 'Post successfully added!');

        return redirect()->back();
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
	public function edit($id, Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $post = Post::find($id);
        $post->title = $title;
        $post->body = $body;
        $post->save();

        Session::flash('flash_message', 'Post successfully added!');

        return redirect()->back();

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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
        $post->delete();
	}

    public function editPost()
    {
        $user = Auth::user();
        return view('new')->with('username',$user->name);

        // return view('main')->with();
    }



}
