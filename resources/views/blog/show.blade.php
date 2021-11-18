@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
<a href="{{ route('blog') }}" class="btn btn-secondary"> Go Back</a>
</div>
<div class="card m-4">
    <div class="card-title">
        <h4 class="text-center">Blog Details </h4>
    </div>
    <div class="card-body">
       <p> <strong>Title: </strong> <span class="text-muted m-3">{{ $blog->title }} </span></p>
     <hr>
       <p> <strong>Content: </strong> <span class="text-muted m-3">{{ $blog->content }} </span></p>
       <hr>
       <p> <strong>Category: </strong> <span class="text-muted m-3">{{implode(",",$blog->categories->pluck('title')->toArray())}} </span></p>
      <hr>
       <p> <strong>Author: </strong> <span class="text-muted m-3">{{ $blog->author->full_name }} </span></p>
       <hr>
       <p> <strong>Tags: </strong> <span class="text-muted m-3">{{ $blog->tags }} </span></p>
    </div>
</div>
@endsection