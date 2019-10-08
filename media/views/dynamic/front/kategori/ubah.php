

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Data Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Data Kategori</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <form action="<?php echo base_url() ?>kategori/update" method="post">
                            <input type="hidden" name="id" value="<?php echo $getbyid->id ?>">
                            <div class="row">

                              <div class="col-md-6">

                                <div class="form-group">
                                  <label>Nomor Kategori :</label>
                                  <input type="text" name="nomor_kategori" value="<?php echo $getbyid->nomor_kategori ?>" class="form-control" placeholder="Nomor kategori" required="">
                                </div>

                                <div class="form-group">
                                  <label>Nama Kategori :</label>
                                  <input type="text" name="nama_kategori" value="<?php echo $getbyid->nama_kategori ?>" class="form-control" placeholder="Nama Kategori" required="">
                                </div>

                                <div class="form-group">
                                  <input type="submit" name="submit" value="Simpan" class="btn btn-block btn-success btn-flat" style="width:150px;">
                                </div>

                              </div>

                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- /.card -->

                </section>
                <!-- /.Left col -->

              </div>
            </div>
            <!-- /.card-body -->
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

