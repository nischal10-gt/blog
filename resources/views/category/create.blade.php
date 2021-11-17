@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
    <a href="{{ route('category') }}" class="btn btn-secondary"> Go Back</a>
    </div>
    
    <div class="row m-4">
        <div class="col-12">
            <h4 class="text-center">Create New Category </h4>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">

        <div class="col-8 bg-white p-6">

            <form action="{{ route('category.store') }}" method="post" class="mb-4"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="title" class="sr-only"> Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    @error('title')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="description" class="sr-only"> Description</label>
                    <textarea name="description" rows="4" cols="30"
                        class="bg-light w-100 p-3 rounded-lg @error('description') border border-danger @enderror"
                        placeholder="Write a Post"> </textarea>
                    @error('description')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="image">Select Image </label>
                    <input type="file" name="image">
                    @error('image')
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
