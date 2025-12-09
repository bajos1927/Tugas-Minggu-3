@extends('layout')

@section('content')

<h3>Dashboard</h3>

<p>{{ $message }}</p>

@if (session('role') === 'admin')
    <a href="{{ route('products.index') }}" class="btn btn-primary">Kelola Produk</a>
@endif

<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>

@endsection
