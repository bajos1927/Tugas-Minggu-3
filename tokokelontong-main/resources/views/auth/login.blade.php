@extends('layout')

@section('content')

<h3>Login</h3>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Login</button>
</form>

@endsection
