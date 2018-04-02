<!DOCTYPE html>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | TL-Diamond</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/AdminLTE.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/jquery-ui.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/style.css" />
  <script src="{{ url('/') }}/public/backend/js/angular.min.js"></script>
  <script src="{{ url('/') }}/public/backend/js/app.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Chèn header layout -->
  @include('layouts.backend-header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('layouts.backend-sidebar')

  <!-- =============================================== -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Tiêu đề  -->
        @yield('title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('box-title')</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          @yield('box-body')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          @yield('box-footer')
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="height: 50px;">
    <div class="pull-right hidden-xs" style="padding-bottom: 10px;">
      <p><b>Version</b> 2.4.0</p>
    </div>
    
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ url('/') }}/public/backend/js/jquery.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/jquery-ui.js"></script>
<script src="{{ url('/') }}/public/backend/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/adminlte.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/dashboard.js"></script>
<script src="{{ url('/') }}/public/backend/tinymce/tinymce.min.js"></script>
<script src="{{ url('/') }}/public/backend/tinymce/config.js"></script>
<script src="{{ url('/') }}/public/backend/js/function.js"></script>
<script src="{{ url('/') }}/public/backend/js/ajax.js"></script>

</body>
</html>
