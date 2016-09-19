<?php

use blog\User;
use blog\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class RoutTest extends TestCase {
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function testLogin()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

    public function testRedirectionToHome()
    {
        $user = new User(['name' => 'user']);
        $this->be($user);
        $this->call('GET', '/');
        $this->assertRedirectedTo('home');
    }

    public function testHomeView()
    {
        $user = new User(['name' => 'user']);
        $this->be($user);
        $response = $this->call('GET', 'home');
        $view = $response->original;
        $this->assertEquals('blog', $view['name']);
    }

    public function testNewView()
    {
        $user = new User(['name' => 'user']);
        $this->be($user);
        $response = $this->call('GET', 'new');
        $view = $response->original;
        $this->assertEquals('new', $view['name']);
    }

    public function testFeedView()
    {
        $user = new User(['name' => 'user']);
        $this->be($user);
        $response = $this->call('GET', 'feed');
        $view = $response->original;
        $this->assertEquals('feed', $view['name']);
    }

    public function testEditView()
    {
        Auth::loginUsingId(1);
        $posts = Post::where('user_id',  Auth::user()->id)->get();
        foreach ($posts as $post)
        {
            $response = $this->action('GET', 'ContentController@showEditingPost', ['id' => $post->id]);
            $view = $response->original;
            $this->assertEquals('edit', $view['name']);
        }
    }

    public function testUserView()
    {
        Auth::loginUsingId(1);
        $users = User::all();
        foreach ($users as $user)
        {
            $response = $this->call('GET', 'user/id'.$user->id);
            if ($user->id==1)
            {
                $this->assertRedirectedTo('home');
            }
            else
            {
                $view = $response->original;
                $this->assertEquals('user', $view['name']);
            }
        }

    }


}
