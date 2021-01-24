@extends('auths.layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Main content -->
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="callout callout-info">
            <h4>Selamat datang!</h4>
            <p>Anda disini sebagai <strong>Administrator</strong>, pada samping laman website, terdapat beberapa menu yang dapat anda telusuri untuk melakukan pengelolaan data. Terima kasih</p>
         </div>
      <div class="row">
         <div class="col-12 col-sm-12 col-md-12" style="text-align: center;">
            <img src="{{asset('wel.png')}}" style="width: 100%; text-align: center; border-radius:5px;">   
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!--/. container-fluid -->
@endsection