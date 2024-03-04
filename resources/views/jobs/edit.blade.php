@extends('layout.main')
@section('content')
<form action="{{route('jobs.update',['job'=>$job->id])}}" method="POST" class="mx-3 my-3 w-50">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" >Title</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" 
        value="{{$job->title}}" placeholder="Explosive expert" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{$job->desc}}</textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>
@endsection