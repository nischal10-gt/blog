@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
    <a href="{{ route('author') }}" class="btn btn-secondary"> Go Back</a>
    </div>
    
    <div class="row m-4">
        <div class="col-12">
            <h4 class="text-center">Create New Author </h4>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">

        <div class="col-8 bg-white p-6">

            <form action="{{ route('author.store') }}" method="post" class="mb-4">
                @csrf

                <div class="form-group mb-4">
                    <label for="full_name" class="sr-only"> Full Name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Enter a Full Name">
                    @error('full_name')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="sr-only"> Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter a Your Email">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
               

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </form>

        </div>


    </div>




@endsection
