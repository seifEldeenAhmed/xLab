@extends('layout.main')
@section('content')
@if(session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Job Title</th>
        <th scope="col">Desc</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{$job->id}}</td>
            <td>{{$job->title}}</td>
            <td>{{$job->desc}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <form action="{{route('jobs.destroy',['job'=> $job->id])}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{route('jobs.show',['job' => $job->id])}}"><button type="button" class="btn btn-warning m-2">Show</button></a>
                    <a href="{{route('jobs.edit',['job' => $job->id])}}"><button type="button" class="btn btn-success m-2">Edit</button></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection