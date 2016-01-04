<?php
use App\User;
use App\Post;
use App\Comment;
use App\Post_like;
use App\Comment_like;
use App\Follow;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::resource('posts', 'PostController');

Route::get('{id}/posts', function($id)
{
    $posts = User::find($id)->posts;
    return response()->json($posts);

});

//route for ajax store comments

//Route::post('foo/bar', function()
//{
//    return PostController@comment;
//});
Route::post('comment', 'PostController@comment');


Route::get('{id}/posts', function($id)
{
    $posts = User::find($id)->posts;
    return response()->json($posts);

});

Route::get('email', function () {
    return view('email');
});

/*Route::get('/', function(){
    $user = User::find(1);
    return response()->json($user);

    //return response()->json(User::all());
});

Route::get('/post', function(){
    $post = Post::find(1);
    $post->comments;
    $post->post_likes;
    return response()->json($post);*/

    //return response()->json($posts);
    //return response()->json(Post::has('comments')->get());
//    $posts = Post::whereHas('comments', function($q)
//    {
//        $q->where('title', 'like', '%1');
//
//    })->get();
//    return response()->json($posts);
//});

/*Route::get('/comments', function(){
    return response()->json(Post::find(1)->comments);
});

Route::get('/post_likes', function(){
    return response()->json(Post::find(3)->post_likes);
});

Route::get('/comment_likes', function(){
    return response()->json(Comment::find(1)->comment_likes);
});

Route::get('/follows', function(){
    return response()->json(User::find(2)->follows);
});

//Route::get('post{id}', array('as' => 'post', 'uses' => 'WelcomeController@post'));



*/


