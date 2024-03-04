@extends('layout.main')
@section('content')
<div class="d-flex">
    <div class="container mt-3">
        <h2>Employee Card</h2>
        <div class="card" style="width:400px">
          <img class="card-img-top" src="{{URL('images/img_avatar1.png')}}" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">{{$employee->name}}</h4>
            <p class="card-text">Some example text employee email is {{$employee->email}}. {{$employee->name}} is an {{$employee->job->title}}</p>
          </div>
        </div>
    </div>
@endsection