@extends('layout.main')
@section('content')
    <form action="{{ route('jobs.store') }}" method="POST" class="mx-3 my-3 w-50">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                placeholder="Explosive expert" required>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{ old('desc') }}</textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
@endsection
