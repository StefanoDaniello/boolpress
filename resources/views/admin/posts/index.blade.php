@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <table  class="table table-dark table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endSection