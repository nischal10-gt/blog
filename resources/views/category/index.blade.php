@extends('layouts.app')

@section('content')
@auth
<div class="d-flex justify-content-end m-5">
<a href="{{ route('category.create') }}" class="btn btn-primary"> create category</a>
</div>
@endauth

<div class="row">
<div class="col-12">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>S.N </th>
                <th>title </th>
                <th>description</th>
                <th>image</th>
                <th>action </th>
            </thead>
            <tbody>
                @forelse($categories as $key=>$category)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $category->title }} </td>
                    <td>{{ $category->description }} </td>
                    <td><img class="img-thumbnail img-responsive"
                        src="{{asset('uploads/category/'.$category->image)}}" style="height: 50px; width:70px" alt=""></td> </td>
                      <td>
                          <form action="{{ route('category.destroy',$category->id) }}" method="post">
                            @csrf
                          <a href="{{ route('category.show',$category->id) }}" class="btn btn-success">View </a>
                          @auth
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