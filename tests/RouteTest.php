<?php

use blog\User;
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
        $response = $this->action('GET', 'ContentController@showEditingPost', ['id' => 6]);
        $view = $response->original;
        $this->assertEquals('edit', $view['name']);
    }

    public function testUserView()
    {
        Auth::loginUsingId(1);
        $response = $this->call('GET', 'user/id2');
        $view = $response->original;
        $this->assertEquals('user', $view['name']);
    }










}
