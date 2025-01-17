@extends('layouts.dashboard')

@section('content')
  <div class="mb-2">
    <a href="{{route('dashboard.theaters.arrange.movie.create', $theater->id)}}" class="btn btn-sm btn-primary">+ Movie</a>
  </div>

  @if (session()->has('message'))
    <div class="alert alert-success">
      <strong>{{__(session()->get('message'))}}</strong>
      <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
    </div>
  @endif
  
    <div class="card-header">
      <div class="row">
        <div class="col-8 align-self-center">
          <h3>Arrange Movie - {{$theater->theater}}</h3>
        </div>
        <div class="col-4">
          <form action="{{route('dashboard.theaters.arrange.movie', $theater->id)}}" method="get">
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
            <th>Movie</th>
            <th>Studio</th>
            <th>Price</th>
            <th>Status</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($arrangeMovies as $arrangeMovie)
          <tr>
            <td>{{$arrangeMovie->movies->first()->title}}</td>
            <td>{{$arrangeMovie->studio}}</td>
            <td>{{$arrangeMovie->price}}</td>
            <td>{{$arrangeMovie->status}}</td>
            <td>
              <a href="{{route('dashboard.theaters.arrange.movie.edit',[$theater->id, $arrangeMovie->id])}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fas fa-pen"></i>
               </a>
              {{-- <a href="{{route('dashboard.theaters.arrange.movie.arrange.movie',$arrangeMovies->id)}}" class="btn btn-primary btn-sm" title="Arrange movie">
                <i class="fas fa-film"></i>
               </a> --}}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    {{-- @if ($theater->total())
      
      {{$theaters->appends($request)->links() }}
    @else
        <h4 class="text-center p-3"> {{__('messages.no_data', ['module' => 'Theater'])}}</h4>
    @endif --}}
     
    </div>
  </>
@endsection