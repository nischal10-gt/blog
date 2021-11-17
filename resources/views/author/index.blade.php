@extends('layouts.app')

@section('content')
@auth
<div class="d-flex justify-content-end m-5">
<a href="{{ route('author.create') }}" class="btn btn-primary"> create author</a>
</div>
@endauth

<div class="row">
<div class="col-12">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>S.N </th>
                <th>full name </th>
                <th>email</th>
                <th>action </th>
            </thead>
            <tbody>
                @forelse($authors as $key=>$author)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $author->full_name }} </td>
                    <td>{{ $author->email }} </td>
                     <td>
                          <a href="{{ route('author.show',$author->id) }}" class="btn btn-success">View </a> 
                        
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