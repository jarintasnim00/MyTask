@extends('layouts.app')

@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

     <div class="preloader flex-column justify-content-center align-items-center">
       <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
     </div>
   
     <!-- Navbar -->
     <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="{{route('logout')}}" class="dropdown-item"> Logout
            </a>
        </li>
  
       </ul>
     </nav>

     <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="index3.html" class="brand-link">
         <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
       </a>
   
       <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <div class="image">
             <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
           </div>
           <div class="info">
             <a href="#" class="d-block">{{auth()->user()->name}}</a>
           </div>
         </div>
   
      
         <div class="form-inline">
           <div class="input-group" data-widget="sidebar-search">
             <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
             <div class="input-group-append">
               <button class="btn btn-sidebar">
                 <i class="fas fa-search fa-fw"></i>
               </button>
             </div>
           </div>
         </div>
   
         <!-- Sidebar Menu -->
         <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

             <li class="nav-item menu-open">
               <a href="#" class="nav-link active">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                   Dashboard
                   <i class="right fas fa-angle-left"></i>
                 </p>
               </a>
             </li>
           </ul>
         </nav>
         <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
     </aside>
   
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <div class="content-header">
         <div class="container-fluid">
           <div class="row mb-2">
             <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
             </div><!-- /.col -->
           </div><!-- /.row -->
         </div><!-- /.container-fluid -->
       </div>

       <section class="content">
         <div class="container-fluid">
           <!-- Small boxes (Stat box) -->
           <div class="row">
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                 <div class="inner">
                   <h3>150</h3>
   
                   <p>New Orders</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-bag"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                 <div class="inner">
                   <h3>53<sup style="font-size: 20px">%</sup></h3>
   
                   <p>Bounce Rate</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-stats-bars"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                 <div class="inner">
                   <h3>44</h3>
   
                   <p>User Registrations</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-person-add"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                 <div class="inner">
                   <h3>65</h3>
   
                   <p>Unique Visitors</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-pie-graph"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
           </div>
           <!-- /.row -->
         </div>
       </section>
     </div>
     <footer class="main-footer">
       <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
       All rights reserved.
       <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.2.0
       </div>
     </footer>
     <aside class="control-sidebar control-sidebar-dark">
     </aside>
   </div>
</body>
@endsection