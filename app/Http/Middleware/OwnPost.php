<?php namespace blog\Http\Middleware;

use Closure;
use blog\Post;
use blog\User;
use Illuminate\Support\Facades\Auth;

class OwnPost {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if ((Auth::user()->id)==($request->id))
        {
            return redirect('home');;
        }
        $username = User::findOrFail($request->id)->name;
        $posts = Post::where('user_id', $request->id)->get();
        return view('content.posts', ['name' => 'user'])->with('username', $username)->with('posts', $posts)->with ('own', false);

	}

}
