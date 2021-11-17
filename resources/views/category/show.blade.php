@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
<a href="{{ route('category') }}" class="btn btn-secondary"> Go Back</a>
</div>
<div class="card m-4">
    <div class="card-title">
        <h4 class="text-center">Category Details </h4>
    </div>
    <div class="card-body">
       <p> <strong>Title: </strong> <span class="text-muted m-3">{{ $category->title }} </span></p>
       <p> <strong>Description: </strong> <span class="text-muted m-3">{{ $category->description }} </span></p>
       <hr>
       <a href="{{ asset('/uploads/category/' . $category->image) }}" target="_blank"> <img class="card-img-top pb-3"
        src="{{ asset('uploads/category/' . $category->image) }}" style="height: 300px; width:300px"
        alt="Card image cap"></a>
    </div>
</div>
@endsection