@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section>
        <h2>Edit Post</h2>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{$post->title}}" minlength="3" maxlength="200">
                    @if($errors->has('title'))
                        <div class ="alert alert-danger">{{$errors->first('title')}}</div>
                    @endif 
                <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{$post->image}}">
                    @if($errors->has('image'))
                        <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                    @endif 
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                {{ $post->content }}
              </textarea>
                @if($errors->has('content'))
                    <div class ="alert alert-danger">{{$errors->first('content')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-danger mx-4">
                    <a href="{{route('admin.posts.index')}}" class="text-white">Annulla</a>
                </button>
            </div>
        </form>


    </section>

@endsection