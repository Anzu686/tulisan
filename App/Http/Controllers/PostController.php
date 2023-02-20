<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', [
            'user' => auth()->user()->id,
        ]);
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
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'category' => 'required|min:5'
        ]);

        if ($request->image()){

            $image = $request->image;
            $image->store('posts-image');

            Post::create([
                'image'=>$request->image,
                'title'=>$request->title,
                'body'=>$request->title,
                'slug'=>$request->title,
                'category_id'=>$request->title,
                'slug_id'=>$request->title,
            ]);
        }
        Post::create([
            'title'=>$request->title,
            'body'=>$request->title,
            'slug'=>$request->title,
            'category_id'=>$request->title,
            'slug_id'=>$request->title,
        ]);
        return to_route('home')->with('succes' , 'Data berhasil Tambah');



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('preview', [
            'post'=>$post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.update',[
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'category' => 'required|min:5'
        ]);

        if ($request->image()){

            $image = $request->image;
            $image->store('posts-image');

            $post->update([
                'image'=>$request->image,
                'title'=>$request->title,
                'body'=>$request->title,
                'slug'=>$request->title,
                'category_id'=>$request->title,
                'slug_id'=>$request->title,
            ]);
        }
        $post->update([
            'title'=>$request->title,
            'body'=>$request->title,
            'slug'=>$request->title,
            'category_id'=>$request->title,
            'slug_id'=>$request->title,
        ]);

        return to_route('home')->with('succes' , 'Data berhasil edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
        $post->delete();

        return redirect('post.index');

    }
}
