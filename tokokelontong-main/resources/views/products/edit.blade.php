@extends('layout')

@section('content')
<h3>Edit Produk</h3>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
        @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <select name="category_id" class="form-control">
        @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
        </option>
        @endforeach
    </select>


    <button class="btn btn-warning">Update</button>
</form>
@endsection
