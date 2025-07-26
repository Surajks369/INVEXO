@extends('layouts.app')
@section('title', 'Add Category')
@section('content')
<h2>Add Category</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">Create</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Back</a>
</form>
@endsection
