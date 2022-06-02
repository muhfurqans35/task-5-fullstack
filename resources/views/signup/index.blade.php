@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signup">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/signup" method="post">
              @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{old('name')}}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username"class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{old('username')}}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required value="{{old('email')}}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password"
                name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="Password" placeholder="Password" required>
                <label for="Password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign up</button>
            </form>
            <small class="mt-3">Already have an account? <a href="/signin">Sign in</a>
            </small>
        </main>  
    </div>
</div>
  
@endsection