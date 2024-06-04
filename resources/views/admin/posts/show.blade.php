@extends('layouts.admin')
@section('title', $post->title)

@section('content')
<section>
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <img src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}"> <br>
    <button class="btn btn-primary my-3">
        <a href="{{route('admin.posts.index')}}" class="text-white">Torna ai posts</a>
    </button>
</section>
@endsection