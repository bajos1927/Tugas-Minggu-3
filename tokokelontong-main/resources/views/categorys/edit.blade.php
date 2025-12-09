@extends('layout')

@section('content')
<h3>Edit Kategori</h3>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-warning">Update</button>
</form>
@endsection
