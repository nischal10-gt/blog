@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-3">
    <a href="{{ route('blog') }}" class="btn btn-secondary"> Go Back</a>
    </div>
    
    <div class="row m-4">
        <div class="col-12">
            <h4 class="text-center">Create New Blog </h4>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">

        <div class="col-8 bg-white p-6">

            <form action="{{ route('blog.store') }}" method="post" class="mb-4">
                @csrf

                <div class="form-group mb-4">
                    <label for="title" class="sr-only"> Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter a Title">
                    @error('title')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
  
                 
                <div class="form-group mb-4">
                    <label for="content" class="sr-only"> Content</label>
                    <textarea class="ckeditor form-control" name="content" ></textarea>
                    @error('content')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="author" class="sr-only"> Author</label>
                    <strong>Author:</strong>
                <select name="full_name" id="full_name" class="form-control">
                    <option value="">Select Author </option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('author')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
               
                </div>

                <div class="form-group mb-4">
                    <strong>Categories:</strong>
                    <select id='myselect' name="category[]" multiple>
                        <option value="">Select An Option</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                      @error('category.*')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="form-group">
                    <strong>Categories:</strong>
                    <input type="text" name="tags" class="form-control" placeholder="enter comma seperated tags" data-role="tagsinput" >

                </div>

            
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </form>

        </div>


    </div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

    $('#myselect').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
</script>

@endpush
