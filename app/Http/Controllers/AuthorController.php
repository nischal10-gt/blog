<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'])->except(['index','show']);
    }
    public function index(){
        $authors=Author::latest()->get();
        return view('author.index',compact('authors'));
    }

    public function create(){
      
        return view('author.create');
    }

    public function store(AuthorRequest $request){

     $data= $request->validated();

       Author::create($data);
       
       return redirect()->route('author')->with('msg','Data Saved Successfully');
    }

    public function show(Author $author){

        return view('author.show',compact('author'));

    }


}
