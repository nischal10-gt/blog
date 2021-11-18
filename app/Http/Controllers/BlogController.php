<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'])->except(['index','show']);
    }
    public function index(){
       $blogs= Blog::with(['author'])->latest()->get();
        return view('blog.index',compact('blogs'));
    }

    public function create(){
        $authors=Author::all();
        $categories=Category::all();
        return view('blog.create',compact('authors','categories'));
    }

    public function store(BlogRequest $request)
    {
        $request->validated();
      
        $blog = new Blog();
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->tags=$request->tags;
        $blog->author_id=$request->full_name;
        $blog->save();

        $categories = $request->input('category');
        $blog->categories()->sync($categories);
        return redirect()->route('blog')->with('msg','Data save successfully');

    }

    public function show(Blog $blog){
       
        return view('blog.show',compact('blog'));

    }

    
    public function edit(Blog $blog){
        $authors=Author::all();
        $categories=Category::all();
        return view('blog.edit',compact('blog','authors','categories'));
    }

    public function update(Blog $blog, BlogRequest $request){
      
        $request->validated();
        
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->author_id=$request->full_name;
        $blog->tags=$request->tags;
        $blog->save();

        $categories = $request->input('category');
        $blog->categories()->sync($categories);
        return redirect()->route('blog')->with('msg','Data updated successfully');

    }

    public function destroy(Blog $blog){
        
        $blog->categories()->detach();
        $blog->delete();
        return redirect()->route('blog')->with('msg','Record deleted successfully');

    }

}
