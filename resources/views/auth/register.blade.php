@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
      #results { padding:20px; border:1px solid; background:#ccc; }
</style>

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
            <input type="button" class="form-control" data-bs-toggle="collapse" data-bs-target="#demo" value="Take a Picture">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-image"></span>
              </div>
            </div>
          </div> 
          <div id="demo" class="collapse">
            <div class="input-group mb-3">
            <div id="my_camera"></div>
            <input type=button class="form-control" value="Take Snapshot" name="profile_picture" onClick="take_snapshot()">
            <input type="hidden" name="profile_picture" class="image-tag">
        </div>
        <div id="results">Your captured image will appear here...</div>
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

<script language="JavaScript">
  Webcam.set({
      width: 300,
      height: 300,
      image_format: 'jpeg',
      jpeg_quality: 90
  });
  
  Webcam.attach( '#my_camera' );
  
  function take_snapshot() {
      Webcam.snap( function(data_uri) {
          $(".image-tag").val(data_uri);
          document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
      } );
  }
</script>

@endsection