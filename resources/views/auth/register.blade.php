@extends('layouts.app')

@section('content')

<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Registration Form</a>
    </div>
    <div class="card-body">

      <form method="POST" action="" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="input-group mb-3">
            <input type="file" class="form-control" name="profile_picture"  placeholder="Upload Image">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-image"></span>
              </div>
            </div>
          </div>
          @error('profile_picture')
          <div class="text-danger">{{$message}}</div>
          @enderror

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection