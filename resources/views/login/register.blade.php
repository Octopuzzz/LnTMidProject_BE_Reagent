@extends('layouts.Main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Register </h1>
              <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" name ="name" class="form-control rounded-pill @error('name') is-invalid
                        @enderror" id="Name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="Name">Name</label>
                        @error('name')
                            <div class="invalid-feedback px-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                    <input type="text" name ="username" class="form-control rounded-pill @error('username') is-invalid @enderror" id="Username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="Username">Username</label>
                        @error('username')
                            <div class="invalid-feedback px-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                    <input type="email" name = "email" class="form-control rounded-pill @error('email')is-invalid
                    @enderror" id="Email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="Email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback px-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control rounded-pill @error('password')is-invalid
                    @enderror"id="Password" placeholder="Password" required>
                    <label for="Password">Password</label>
                        @error('password')
                            <div class="invalid-feedback px-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary rounded-pill"type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">
                Already Registered? <a href="/login">Login</a>
                </small>
            </main>
        </div>
    </div>

@endsection
