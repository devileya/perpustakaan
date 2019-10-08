
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.css">



    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--    <script src="--><?php //echo base_url(); ?><!--assets/plugins/morris/morris.min.js"></script>-->
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--    <script src="--><?php //echo base_url(); ?><!--assets/dist/js/pages/dashboard.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "order": [[2, "asc"]]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
            $("#example3").DataTable({
                "order": [[0, "asc"]]
            });
        });
    </script>

    <script>
        $(function () {
//Initialize Select2 Elements
            $('.select2').select2()

//Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
            $('[data-mask]').inputmask()

//Date range picker
            $('#reservation').daterangepicker()
//Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker         : true,
                timePickerIncrement: 30,
                format             : 'MM/DD/YYYY h:mm A'
            })
//Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

//iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
//Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red'
            })
//Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })

//Colorpicker
            $('.my-colorpicker1').colorpicker()
//color picker with addon
            $('.my-colorpicker2').colorpicker()

//Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Book Clasification</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <form action="<?php echo $actionsearching ?>" method="get" enctype="multipart/form-data" class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search" required="">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </li>
        <!-- Notifications Dropdown Menu -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#5D6373;">
      <!-- Brand Logo -->
      <a href="<?php echo base_url() ?>" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/P2.png" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Perpustakaan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar" style="background-color:#4D65A8;">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
              <a href="<?php echo base_url() ?>" class="nav-link" style="font-color:blue;">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>Beranda</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>buku" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>Data Buku</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>kategori" class="nav-link">
                <i class="nav-icon fa fa-check"></i>
                <p>Kamus DDC (Edisi 23)</p>
              </a>
            </li>

<!--              <li class="nav-item dropdown">-->
<!--                  <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-expanded="false">-->
<!--                      <i class="nav-icon fa fa-table"></i>-->
<!--                      <p>Tabel</p>-->
<!--                  </a>-->
<!--                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #4D65A8;">-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=1") ?><!--">Tabel 1</a>-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=2") ?><!--">Tabel 2</a>-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=3") ?><!--">Tabel 3</a>-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=4") ?><!--">Tabel 4</a>-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=5") ?><!--">Tabel 5</a>-->
<!--                      <a class="dropdown-item" href="--><?//= site_url("tabel?tabel=6") ?><!--">Tabel 6</a>-->
<!--                  </div>-->
<!--              </li>-->

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside> -->

    <?php

    include $page_name.'.php';

    ?>
    <footer class="main-footer">
      <strong>Copyright &copy; 2018 <a href="">Praya</a>.</strong>
      Politeknik Caltex Riau.
      <div class="float-right d-none d-sm-inline-block">
        <b>PCR</b> Pekanbaru
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

</body>
</html>
