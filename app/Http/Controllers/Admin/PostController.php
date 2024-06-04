<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

// serve per eseguire le query 
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        //dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data= $this->validation($request->all());
        $form_data['slug'] = Post::generateSlug($form_data['title']);
        $newPost = Post::create($form_data);
        return redirect()->route('admin.posts.show', $newPost->slug);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //dd($post);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**o
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $form_data= $this->validation($request->all());
        $form_data['slug'] = Post::generateSlug($form_data['title']);
        //query da eseguire 
        // DB::enableQueryLog();
        $post->update($form_data);
        //la mettiamo in una variabile per vedere la query
        // $query = DB::getQueryLog();
        // dd($query);
        return redirect()->route('admin.posts.index', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', $post->title . ' è stato eliminato');
    }

    public function validation($data){
        $validator = \Validator::make($data, [
            'title' => 'required|max:200|min:3|unique:posts',
            'image' => 'nullable|max:255',
            'content' => 'required|max:255',
        ],
        [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.unique' => 'Questo titolo esiste già.',
            'title.max' => 'Il titolo non può superare i :200 caratteri.',
            'title.min' => 'Il titolo deve essere di almeno : 3 caratteri.',
            'image.max' => 'La lunghezza massima è di  :255 caratteri.',
            'content.required' => 'Il contenuto è obbligatorio.',
            'content.max' => 'Il contenuto non è piu di :255 caratteri.',
        ])->validate();
        return $validator;
    }
}