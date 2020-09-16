<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\Http\Requests\StoreBlogPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $posts = Post::all();
       return view('posts',["posts"=>$posts]);
    }
    // public function logout(){
    //    
    // }

    // public function logout () {
    //     //logout user
    //     Auth::logout();
    //     // redirect to homepage
    //     return redirect('/');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return(view('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id =Auth::user()->id;
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $userPosts = User::find($id)->posts;
        return view('posts',["posts"=>$userPosts]);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('edit',["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = '1';
        $post->save();
        return redirect(route('posts.index'));
    //  $posts = Post::all();
    //    return view('posts',["posts"=>$posts]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Post::destroy($id);

    return redirect(route('posts.index'));
    }
}
