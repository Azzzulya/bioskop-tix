@extends('layouts.dashboard')

@section('content')
  <div class="mb-2">
    <a href="{{route('dashboard.theaters.create')}}" class="btn btn-sm btn-primary">+ Theater</a>
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
          <h3>Theaters</h3>
        </div>
        <div class="col-4">
          <form action="{{route('dashboard.theaters')}}" method="get">
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
    @if ($theaters->total())
      <table class="table table-borderless table-striped table-hover">
        <thead>
          <tr>
            <th>Theater</th>
            <th>Address</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($theaters as $theater)
          <tr>
            <td>
              {{$theater->theater}}
            </td>
            <td>
              {{$theater->address}}
            </td>
            <td>
              <a href="{{route('dashboard.theaters.edit',$theater->id)}}" class="btn btn-success btn-sm" title="Edit">
                <i class="fas fa-pen"></i>
               </a>
              <a href="{{route('dashboard.theaters.arrange.movie',$theater->id)}}" class="btn btn-primary btn-sm" title="Arrange movie">
                <i class="fas fa-film"></i>
               </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$theaters->appends($request)->links() }}
    @else
        <h4 class="text-center p-3"> {{__('messages.no_data', ['module' => 'Theater'])}}</h4>
    @endif
     
    </div>
  </>
@endsection