<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;
use App\Post;
use Illuminate\Contracts\Auth\Authenticatable;
class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //response()->json( Post::find(1)->users);
        $posts = Auth::user()->posts;
        //$follows = Auth::user()->follows;
        return view('post.index', compact('posts'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PostFormRequest $request)
	{
        $file = $request->file('post_pic');
        $destinationPath = 'pictures/post/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $title = $request->title;
        $description = $request->description;
        $post_pic = $destinationPath.$filename;
        $id = Auth::user()->id;
        $input = ['title' => $title ,'description' => $description, 'post_pic' => $post_pic ,'user_id' => $id];


        Post::create($input);

        $posts = Auth::user()->posts;
        return view('post.index', compact('posts'));
	}

    // store comment using ajax

    public function comment(){
        $title = $_POST['title'];
        $post_id = $_POST['post'];
        $user_id = Auth::user()->id;
        $data = ['title' => $title , 'post_id' => $post_id, 'user_id' => $user_id];
        Comment::create($data);
        return;
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
	public function edit($id)
	{
		$post = Post::find($id);
		return view('post.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PostFormRequest $request)
	{
		$post = Post::find($id);
		$file = $request->file('post_pic');
		$destinationPath = 'pictures/post/';
		if ($file){
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$post->post_pic = $destinationPath.$filename;
		}
		$post->title = $request->title;
		$post->description = $request->description;
		$post->save();
		return redirect('posts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		return redirect('posts');

	}

}
