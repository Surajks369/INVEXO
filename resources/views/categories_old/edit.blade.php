@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
<h2>Edit Category</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Back</a>
</form>
@endsection
