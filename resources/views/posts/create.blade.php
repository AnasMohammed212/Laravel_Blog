@extends('layouts.app')
@section('title') Create @endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@vite('resources/css/app.css')

<h1 class="text-5xl ml-12 my-3">Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="ml-12" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div class="my-3 ">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control w-80" placeholder="Title">
    </div>
    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea name="description" class="form-control w-full	"  rows="3" placeholder="Description"></textarea>
    </div>

    <div class="mb-3">

<label class="block mb-2 mt-2 " for="file_input">Image</label>
<input class="block w-full border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400" name="image" type="file">

    </div>
    
    <button class="btn btn-success">Submit</button>
</form>


@endsection