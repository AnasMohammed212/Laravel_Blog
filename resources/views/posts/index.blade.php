@extends('layouts.app')
@section('title')All Posts @endsection
@section('content')

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




<!-- main -->
<main class="pt-12  bg-gray-100 pb-12">


    <div class="container mx-auto px-4 flex  justify-center flex-wrap lg:flex-nowrap">
        <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">

            <!-- left sidebar -->
            <div class="w-3/12 hidden xl:block">
                <!-- categories -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
                    <div class="space-y-2">
                        <a href="#"
                            class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                            <span class="mr-2">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span>Beauty</span>
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

                <!-- random posts -->
                <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Random Posts</h3>
                    @foreach($posts as $post)
                    <div class="space-y-4">
                        <a href="/posts/{{{$post->slug}}}" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="/TestImages/{{$post['image_path']}}" class="h-14 w-20 rounded object-cover">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                                    {{$post->title}}
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                    {{$post->created_at}}
                                </div>
                            </div>
                        </a>
                       
                    </div>
                    
                    @endforeach
                </div>
            </div>


        <!-- Main content -->
        <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">
            
            <!-- title -->
            <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
                <h1 class="text-3xl uppercase font-semibold font-roboto mx-auto">All Posts</h1>
                @if(Auth::check())
                <a href="{{route('posts.create')}}"
                    class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                    Add Post
                </a>
                @endif
            </div>

            <!-- big post -->
            @foreach($posts as $post)

                <div class="rounded-sm overflow-hidden justify-center bg-white shadow-sm">
                    <a href="/posts/{{{$post->slug}}}" class="block rounded-md overflow-hidden">
                        <img src="/TestImages/{{$post['image_path']}}"
                            class="w-full h-96 object-cover transform hover:scale-110 transition duration-500">
                    </a>
                    <div class="p-4 pb-5">
                        <a href="view.html">
                            <h2
                                class="block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                {{$post['title']}}
                            </h2>
                        </a>
    
                        <p class="text-gray-500 text-sm mt-2">
                            {{$post['description']}}
                        </p>
                        <div class="mt-3 flex space-x-4">
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
                                {{$post['created_at']}}
                            </div>
                            <a href="{{route('posts.show',$post->slug)}}"
                        class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                        see more
                    </a>
                        </div>
                    </div>
                </div>
            
          @endforeach
            

        </div>




        <!-- right sidebar -->
        <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
            <!-- Social plugin -->
            <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
                <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Social Plugin</h3>
                <div class="flex gap-2">
                    <a href=""
                        class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Popular posts -->
            <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
                <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
                <div class="space-y-4">
                    @foreach($posts as $post)
                    <a href="/posts/{{{$post->slug}}}" class="flex group">
                        <div class="flex-shrink-0">
                            <img src="/TestImages/{{$post['image_path']}}" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover">
                        </div>
                        <div class="flex-grow pl-3">
                            <h5
                                class="text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                                                        {{$post->title}}
                            </h5>
                            <div class="flex text-gray-400 text-sm items-center">
                                <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                {{$post->created_at}}
                            </div>
                        </div>
                    </a>

                    @endforeach
                    
                    
                </div>
            </div>


</main>

<!-- mobile menu -->
<div class="fixed w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 xl:hidden" id="sidebar_wrapper">
    <div class="fixed top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80" id="sidebar">

        <!-- search and menu -->
        <div class="lg:hidden">
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
                <a href="index.html"
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
        </div>

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
