@extends('layouts.admin')
@section('title', $post->title)

@section('content')
<section>
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <img src="{{$post->image}}" alt="{{$post->title}}"> <br>
    <button class="btn btn-primary"><a href="{{route('admin.posts.index')}}" class="text-white">Torna ai posts</a></button>
</section>
@endsection