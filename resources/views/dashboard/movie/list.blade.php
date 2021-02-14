@extends('layouts.dashboard')

@section('content')
  <div class="card ">
    <div class="card-header">
      <div class="row">
        <div class="col-8 align-self-center">
          <h3>Movies</h3>
        </div>
        <div class="col-4">
          <form action="{{route('dashboard.movies')}}" method="get">
            <div class="input-group">
              <input type="text" class="form-control form-control-sm" value="{{$request['q'] ?? ''}}" name="q">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-sm"  type="submit">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-borderless table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($movies as $movie)
          <tr>
            <th scope="row"> {{($movies->currentPage() - 1 ) * $movies->perPage() + $loop->iteration}}</th> 
            <td>{{$movie->title}}</td>
            <td>{{$movie->thumbnail}}</td>
            <td>
              <a href="{{route('dashboard.movies.edit',['id' => $movie->id])}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fas fa-pen"></i>
               </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$movies->appends($request)->links() }}
    </div>
  </div>
@endsection