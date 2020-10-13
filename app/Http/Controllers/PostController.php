<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\PostCreated;
use App\PostMeta;
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);
        //event(PostCreated::class);

        //return $post->user->email;
        return back()->with('message', 'Post Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.post-details',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        Post::find($post)->delete();
        return back();
    }

    public function postMetas($id){
        $post = Post::with('postMeta')->find($id);
        return view('pages.post-metas',['post' => $post]);
    }

    public function postMetasStore(Request $request){
        $this->validate($request,[
            'meta_key' => 'required',
            'meta_content' => 'required'
        ]);

        PostMeta::create([
            'post_id' => $request->post_id,
            'meta_key' => $request->meta_key,
            'meta_content' => $request->meta_content,
        ]);
        return back()->with('message', 'Post Meta Successfull Inserted');;
    }
}
