@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
<a href="{{ route('author') }}" class="btn btn-secondary"> Go Back</a>
</div>
<div class="card m-4">
    <div class="card-title">
        <h4 class="text-center">Author Details </h4>
    </div>
    <div class="card-body">
       <p> <strong>Full Name: </strong> <span class="text-muted m-3">{{ $author->full_name }} </span></p>
     <hr>
       <p> <strong>Email: </strong> <span class="text-muted m-3">{{ $author->email }} </span></p>
      
    </div>
</div>
@endsection