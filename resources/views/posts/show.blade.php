@extends('layouts.app')
@section('title'){{$post->title??""}}@endsection
@section('content')
@vite('resources/css/app.css')


@if(@session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">{{session()->get('message')}}</p>   
          </div>
        </div>
      </div>
    @endif



    
    <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/style.css')}}">




<main class="pt-12 bg-gray-100 pb-12">
    
   <div class="container mx-auto px-4 flex justify-center flex-wrap lg:flex-nowrap">


      
       <!-- Main content -->
       <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

           <!-- post view -->
           <div class="rounded-sm overflow-hidden bg-white shadow-sm">
               <div class="">
                   <img src="/TestImages/{{$post->image_path}}" class="w-full h-96 object-cover">
               </div>
               <div class="p-4 pb-5">
                   <h2 class="block text-2xl font-semibold text-gray-700 font-roboto">
                       {{$post->title}}
                   </h2>
                   <div class="mt-2 flex space-x-4">
                       <div class="flex text-gray-400 text-sm items-center">
                           <span class="mr-2 text-xs">
                               <i class="far fa-user"></i>
                           </span>
                           {{$post->user->name}}
                       </div>
                       <div class="flex text-gray-400 text-sm items-center">
                           <span class="mr-2 text-xs">
                               <i class="far fa-clock"></i>
                           </span>
                           {{$post->created_at->format('Y-m-d')}}
                       </div>
                   </div>

                   <p class="text-gray-500 text-sm mt-5">
                      {{$post->description}}
                   </p>

                  

                   

                   <div class="flex items-center flex-wrap gap-2 mt-5 justify-end">
                     
                       @if(Auth::user() && Auth::user()->id==$post->user_id)
                           <div>
                            <a href="{{route('posts.edit',$post->slug)}}"
                    class="text-white font-semibold py-1 px-3 ml-1  uppercase text-sm bg-green-600 border-green-600 rounded-sm    hover:bg-green-500  transition">
                    Edit
                </a>
                <form class="inline" action="" method="POST">
                    @csrf
                    @method('delete')
                     <button href="{{route('posts.destroy',$post->slug)}}"
                    class="text-white font-semibold py-1 px-2 ml-1  uppercase text-sm bg-red-600 border-red-600 rounded-sm hover:bg-red-500  transition">
                    Delete
                </button>
            </form>
               
                           </div>
                           @endif
                           
                   </div>
                   <div class="flex items-center flex-wrap gap-2 mt-5">
                    <a href="#"
                        class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Beauti</a>
                    <a href="#"
                        class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Sports</a>
                    <a href="#"
                        class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Business</a>
                </div>

<div class="p-4 bg-white rounded-sm shadow-sm mt-8">
    <h4 class="text-base uppercase  font-semibold mb-4 font-roboto">Comments</h4>
    <p class="text-sm text-gray-500 mb-4">{{$post->comments->count()}} comments</p>
 
    @if ($errors->any())
   
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="space-y-5">
        @foreach($post->comments as $comment)
       
        <div class="flex items-start">
            <div class="w-10 h-10 flex-shrink-0">
                <img src="/images/avatar.png" class="w-full">
            </div>
            <div class="flex-grow pl-4">
                <h4 class="text-base  font-roboto">{{$comment->user->name}}</h4>
                <p class="text-sm font-600 mt-2">{{$comment->content}}</p>
                <p class="text-xs mt-1 text-gray-400">{{$comment->created_at}}</p>
                
                @if(Auth::user() && Auth::user()->id==$comment->user->id)
                <div class="flex gap-2 mt-2">     
                    <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button href=""
                        class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Delete</button>
                    </form>
                </div>
                @endif
            </div>
        </div>

        @endforeach
        
    </div>









    
    <form action="{{route('posts.comments.store',$post->id)}}" method="POST" class="mt-8">
        @csrf
        <h5 class="text-base  mb-1">Post a comment:</h5>
        @if ($errors->any())
   
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <textarea type="text" name="content" required
            class="w-full border border-gray-200 py-3 px-5 text-sm  rounded-sm h-20 focus:outline-none focus:border-gray-400"
            placeholder="type your comment"></textarea>
        <div class="mt-2">
            <button type="submit"
            class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
            Submit
        </button>
        </div>
    </form>
</div>

</div>

                   
               </div>
           </div>

       
   </div>
</main>


<!-- mobile menu -->
<div class="fixed w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 lg:hidden"
id="sidebar_wrapper">
<div class="fixed top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80"
    id="sidebar">

    <!-- searchbar -->
    <div class="relative mx-3 mt-3 shadow-sm">
        <span class="absolute left-3 top-2 text-sm text-gray-500">
            <i class="fas fa-search"></i>
        </span>
        <input type="text"
            class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500"
            placeholder="Search">
    </div>

    <!-- navlink -->
    <h3 class="text-xl font-semibold text-gray-700 mb-1 font-roboto pl-3 pt-3">Menu</h3>
    <div class="">
        <a href="#"
            class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
                <i class="fas fa-home"></i>
            </span>
            Home
        </a>
        <a href="#"
            class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
                <i class="far fa-file-alt"></i>
            </span>
            About
        </a>
        <a href="#"
            class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
                <i class="fas fa-phone"></i>
            </span>
            Contact
        </a>
    </div>
    <!-- navlinks end -->

    <!-- categories -->
    <div class="w-full mt-3 px-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
        <div class="space-y-2">
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Beauti</span>
                <p class="ml-auto font-normal">(12)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Business</span>
                <p class="ml-auto font-normal">(15)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Fashion</span>
                <p class="ml-auto font-normal">(5)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Food</span>
                <p class="ml-auto font-normal">(10)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Learn</span>
                <p class="ml-auto font-normal">(3)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Music</span>
                <p class="ml-auto font-normal">(7)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Nature</span>
                <p class="ml-auto font-normal">(0)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>People</span>
                <p class="ml-auto font-normal">(13)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Sports</span>
                <p class="ml-auto font-normal">(7)</p>
            </a>
            <a href="#"
                class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span>Technology</span>
                <p class="ml-auto font-normal">(17)</p>
            </a>
        </div>
    </div>
</div>
</div>



@endsection
