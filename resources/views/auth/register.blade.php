@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-light">
                    <h2>Register New Account</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('/register') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <label for="name" class="mb-1">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="mb-1">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="mb-1">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary">Already Registered?</a>
                            <button type="submit" class="btn btn-dark">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 600px;
        margin: auto;
    }

    .card {
        border-radius: 8px;
        border: none;
    }

    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-dark {
        background-color: #343a40;
        color: white;
    }

    .btn-dark:hover {
        background-color: #23272b;
    }
</style>
@endsection
