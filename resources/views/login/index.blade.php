@extends('layouts.Main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            @if(@session()->has('success1'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success1') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(@session()->has('LoginErr'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('LoginErr') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Please Login </h1>
              <form action="/login" method="post">
                @csrf
                <div class="form-floating mb-2">
                  <input type="email" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"  autofocus required>
                  <label for="floatingInput">Email address</label>
                  @error('email')
                    <span class="invalid-feedback px-2" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-pill" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword ">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary rounded-pill " type="submit">Login</button>
              </form>
              <small class="d-block text-center mt-3">
                Not Registered? <a href="/register">Register now !</a>
              </small>
            </main>
        </div>
    </div>

@endsection
