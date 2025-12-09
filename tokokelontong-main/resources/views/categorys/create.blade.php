@extends('layout')

@section('content')
<h3>Tambah Kategori</h3>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="name" class="form-control">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
