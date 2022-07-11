@extends('layouts.auth-master')

@section('content')
    
    <h1><img src="{{ url('assets/img/IMG_20200608_150122.png') }}" alt="Logo">Login</h1>

    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username/Email</label>
            <input type="text" class="form-control" name="username" placeholder="Ingresa tu email o username..." aria-describedby="emailHelp">
            <div name="emailHelp" class="form-text">No compartas esta informacion con nadie.</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Ingresa contraseña..." name="password">
        </div>

        <h1><button type="submit" class="btn btn-primary">Login</button></h1>
    </form>

@endsection

        
