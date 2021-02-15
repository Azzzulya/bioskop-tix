@extends('layouts.dashboard')

@section('content')
  <div class="mb-2">
    <a href="{{route('dashboard.movies.create')}}" class="btn btn-sm btn-primary">+ Movie</a>
  </div>
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
    @if ($movies->total())
      <table class="table table-borderless table-striped table-hover">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($movies as $movie)
          <tr>
            <td class="col-thumbnail ">
              <img src="{{asset('storage/movies/'.$movie->thumbnail)}}" class="img-fluid">
            </td>
            <td>
              <h4><strong>{{$movie->title}}</strong></h4>
            </td>
            <td>
              <a href="{{route('dashboard.movies.edit',$movie->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fas fa-pen"></i>
               </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$movies->appends($request)->links() }}
    @else
        <h4 class="text-center p-3"> There is no data in movie list</h4>
    @endif
     
    </div>
  </div>
@endsection