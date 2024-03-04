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
        <th scope="col">First</th>
        <th scope="col">Email</th>
        <th scope="col">Job Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->job->title}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <form action="{{route('employees.destroy',['employee'=> $employee->id])}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{route('employees.show',['employee' => $employee->id])}}"><button type="button" class="btn btn-warning m-2">Show</button></a>
                    <a href="{{route('employees.edit',['employee' => $employee->id])}}"><button type="button" class="btn btn-success m-2">Edit</button></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection