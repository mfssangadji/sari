<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Cpanel - @yield('title')</title>
      @include('auths.parts.stylesheet')
      <style type="text/css">
         .field-error {
             color: #db0700;
             font-size: 12px;
         }
      </style>
      @yield('style')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      <div class="wrapper">
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
                  <a href="{{route('dashboard')}}" class="nav-link">Beranda</a>
               </li>
            </ul>
         </nav>
         @include('auths.parts.sidebar')
         <div class="content-wrapper">
            <section class="content">
               <div class="row">
                 <div class="col-12">
                     <div style="padding: 1px"></div>
                     @yield('content')
                 </div>
              </div>
           </section>
         </div>
         @include('auths.parts.footer')
      </div>
      @include('auths.parts.plugin-scripts')
      @yield('scripts')
   </body>
</html>
