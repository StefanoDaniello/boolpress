@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section>
        <h2>Create a new post</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}"  maxlength="200">
                @if($errors->has('title'))
                    <div class ="alert alert-danger">{{$errors->first('title')}}</div>
                @endif 
                <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{ old('image') }}">
                    @if($errors->has('image'))
                        <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                    @endif 
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                {{ old('content') }}
              </textarea>
                @if($errors->has('description'))
                    <div class ="alert alert-danger">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Crea</button>
                <button type="reset"  class="btn btn-danger mx-4">Svuota campi</button>

            </div>
        </form>


    </section>

@endsection