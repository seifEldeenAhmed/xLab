@extends('layout.main')
@section('content')
<p class="fs-2">Add new employee</p>

<form action="{{route('employees.update',['employee'=>$emp->id])}}" method="POST" class="mx-3 my-3 w-50">
    @method('PUT')
    @csrf
    <div class="form-group mb-5">
        <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="{{$emp->name}}" required>
    </div>

    <div class="form-group mb-5">
        <input type="text" class="form-control" placeholder="Email" name="email" value="{{$emp->email}}" required>
    </div>
    <select class="form-select" name="jobtitle" aria-label="Default select example">
        <option selected>Select your job title</option>
        @foreach ($jobs as $job)
        <option value="{{$job->id}}">{{$job->title}}</option>
            
        @endforeach
      </select>
      <input class="btn btn-primary mt-4" type="submit" value="Submit">
</form>
@endsection