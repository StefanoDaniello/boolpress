@extends('layouts.app')
@section('content')
<ul>
    @foreach ($posts as $post)
        <h6>Title</h6>
        <li>{{ $post->title }}</li>
        <h6>Content</h6>
        <li>{{ $post->content }}</li>
    @endforeach
</ul>

@endSection