<!-- FIX -->
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/dist/css/gaya.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/dist/css/skins/_all-skins.min.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/jvectormap/jquery-jvectormap.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>info</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WisataInfo.com</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU ADMIN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
            <a href="#"><i class="fa fa-globe"></i> <span>Destinasi</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo site_url();?>welcome/admin_daftarwisata">Daftar Wisata</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_view">Tambah Wisata</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_editwisata">Edit Wisata</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_galeriwisata">Galeri Wisata</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_editgaleriwisata">Edit Galeri</a></li>
                </ul>
        <li class="treeview active">
            <a href="#"><i class="fa fa-globe"></i> <span>Event</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
               <ul class="treeview-menu">
                  <li><a href="<?php echo site_url();?>welcome/admin_tambahevent">Tambah Event</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_daftarevent">Daftar Event</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_tiketevent">Tiket Event</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_daftartiket">Daftar Tiket</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_tambahguest">Tambah Guest</a></li>
                  <li><a href="<?php echo site_url();?>welcome/admin_tampilguest">Daftar Guest</a></li>
                </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>User</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url();?>welcome/admin_daftaruser">Daftar User</a></li>
            <li><a href="<?php echo site_url();?>admin_data/tampil_transaksi">Transaksi User</a></li>
          </ul>
        </li>
<!--        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Admin</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url();?>welcome/admin_registrasiadmin">Registrasi Admin</a></li>
            <li><a href="<?php echo site_url();?>welcome/daftar_admin">Daftar Admin</a></li>
          </ul>
        </li>
      </ul> -->
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
        <li>Event</li>
        <li>Tambah Event</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="content">
        <section class="content container-fluid">
            <div class="container">
              <?php foreach ($trans as $kelargan) { ?>
                <form action="<?php echo base_url();?>admin/benerbenerakhir/<?php echo $kelargan ->kode ?>" method="post" class="form" role="form">
                      <div class="form-group col-xs-11">
                        <label for="kode">Kode Transaksi :</label>
                        <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi" value="<?php echo $kelargan ->kode ?>" />
                        <input type="hidden" name="kode_tiket" class="form-control" id="kode_tiket" value="<?php echo $kelargan ->kode ?>" /> 
                      </div>
                      <div class="form-group col-xs-11">
                        <label for="nama">Jumlah Beli :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $kelargan->jumlah_beli ?>" /> 
                      </div>
                      <div class="form-group col-xs-11">
                        <label for="Pembeli"> Pembeli :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $kelargan->email ?>" />
                      </div>
                      <div class="form-group col-xs-11">
                        <label for="Pembeli">E-Tiket :</label>
                        <input type="text" name="beli" class="form-control" id="nama" value="<?php echo $kelargan->etiket_kode ?>" />
                        <input type="hidden" name="stok" value="<?php echo $kelargan->etiket_kode ?>" />
                      </div>     
                      <div class="form-group col-xs-11">
                        <label for="total">Total Harga :</label>
                        <input type="number" name="total_harga" class="form-control" id="total" value="<?php echo $kelargan->total_harga ?>" /> 
                      </div>
                      <div class="form-group col-xs-11">
                        <label for="tgl_event">Bukti Transfer :</label>
                        <div class="transaksi">
                              <div class="thumbnail">
                                  <a href="<?php echo base_url();?>image/<?php echo $kelargan ->transfer ?>" target="_blank">
                                    <img src="<?php echo base_url();?>image/<?php echo $kelargan ->transfer ?>">
                                  </a>
                              </div>
                        </div>
                      </div>
                      <div class="form-group col-xs-11" align="center">
                      <input type="submit" name="verifikasi" value="verifikasi" class="btn btn-success" />
                      <input type="submit" name="hapus" value="Hapus" class="btn btn-danger" />
                      </div>
                  </form>
              <?php } ?>
            </div>
        </section>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
<!-- ./wrapper -->

<script src="<?php echo base_url();?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>   
        $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/backend/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/backend/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url();?>assets/backend/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/backend/dist/js/demo.js"></script>
</body>
</html>
