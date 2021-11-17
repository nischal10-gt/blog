<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'])->except(['index','show']);
    }
    public function index(){
        $categories= Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    public function create(){
      
        return view('category.create');
    }

    public function store(CategoryRequest $request){

       $request->validated();
        $image = $request->file('image');
        $basename = rand();

        if(isset($image)){

            $imagename = $basename.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/category'))
            {
                mkdir('uploads/category',0777,true);
            }
            $image->move('uploads/category',$imagename);
        } else{
            $imagename = 'default.png';
        }

        $category=new Category();
        $category->title=$request->title;
        $category->description=$request->description;
        $category->image=$imagename;
        $category->save();
       return redirect()->route('category')->with('msg','Data Saved Successfully');
    }

    public function show(Category $category){

        return view('category.show',compact('category'));

    }


    public function destroy(Category $category){
        
        $category->delete();
        return redirect()->route('category')->with('msg','Record deleted successfully');

    }
}
