@extends('layout.main')
@section('content')
<div class="card m-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$job->id}}</h5>
      <h5 class="card-title">{{$job->title}}</h5>
      <p class="card-text">{{$job->desc}}</p>

    </div>
  </div>
@endsection