<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
class PostsController extends Controller
{
    
    public function index() //we show all posts here
    {
        //return view('posts.index',['posts'=>Post::get()]);
        return view('posts.index')->with('posts',Post::get());
    }
    public function create()
    {
        //
        return view('posts.create');
    }
        public function store(Request $request)
    {
        
        $request->validate([
            'title'=>['required','min:5'],
            'description'=>'required',
            'image'=>['required','mimes:jpg,png,jped'],
            ]);

         $slug=Str::slug($request->title,'-');

            $newImageName=uniqid().'-'.$slug.'.'.$request->image->extension();
            $image=$request->image->move(public_path('TestImages'),$newImageName);
        //dd($request);
       Post::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'slug'=>$slug,
        'image_path'=>$newImageName,
        
        'user_id'=>auth()->user()->id,
       ]);
       return redirect(route('posts.index'));
    }




    public function show($slug)
    {
        return view('posts.show')->with('post',Post::where('slug',$slug)->first());//it means the first post we find in db
       
    }
    public function edit($id)
    {
        return view('posts.edit');
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
