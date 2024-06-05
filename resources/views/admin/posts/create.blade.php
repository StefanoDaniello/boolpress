@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section>
        <h2>Create a new post</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}"  maxlength="200">
                @error('title')
                    <div class ="alert alert-danger">{{$errors->first('title')}}</div>
                @enderror 
                <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" 
                class="form-control @error('image') is-invalid @enderror" id="upload_image"
                name="image" value="{{ old('image') }}">
                @error('image')
                    <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                @enderror 
                <h4 class="mt-3">Your image</h4>
                <img src="https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg" alt="" id="uploadPreview" class="shadow rounded-4 m-4">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                {{ old('content') }}
              </textarea>
                @error('content')
                    <div class ="alert alert-danger">{{$errors->first('content')}}</div>
                @enderror
            </div>
            {{-- category form  --}}
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary text-white">Crea</button>
                <button type="reset"  class="btn btn-danger mx-4">Svuota campi</button>

            </div>
        </form>


    </section>

@endsection