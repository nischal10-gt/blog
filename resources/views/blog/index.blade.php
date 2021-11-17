@extends('layouts.app')

@section('content')
@auth
<div class="d-flex justify-content-end m-5">
<a href="{{ route('blog.create') }}" class="btn btn-primary"> create a new blog</a>
</div>
@endauth

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>S.N </th>
                    <th>title</th>
                    <th>content</th>
                    <th>category</th>
                    <th>author</th>
                    <th>action </th>
                </thead>
                <tbody>
                    @forelse($blogs as $key=>$blog)
                    <tr>
                        <td>{{ $key+1 }} </td>
                        <td>{{ $blog->title }} </td>
                        <td>{{ $blog->content }} </td>
                        <td>{{implode(",",$blog->categories->pluck('title')->toArray())}} </td><!--converting object title column to array and array to string -->
                        <td>{{ $blog->author->full_name }} </td>
                         <td>
                               <form action="{{ route('blog.destroy',$blog->id) }}" method="post">
                                @csrf
                                <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-success">View </a> 
                                @auth
                                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-primary">Edit </a> 
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete </button>
                              @endauth
                            </form>
                          </td> 
    
                    </tr>
                    @empty
                    <tr>
                    <div class="alert alert-danger">
                     {{ "No records to display ! Sign in to create new record" }}
                    </div>
                    </tr>
                    @endforelse
                </tbody>
    
            </table>
    
        </div>
    </div>
    </div>

@endsection