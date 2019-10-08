<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Welcome</li>
          </ul>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Masukkan Judul Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo $actionkategori ?>" method="get" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="text" name="q" class="form-control" id="title" placeholder="Judul Buku/Book Title" required="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Klasifikasikan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->