

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Buku</li>
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

                          <form action="" method="post">

                            <div class="row">
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label>Nama Buku :</label>
                                  <input type="text" name="nama_buku" value="<?php echo $view->nama_buku ?>" class="form-control" placeholder="Nama Buku"  readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Penerbit :</label>
                                  <input type="text" name="penerbit" value="<?php echo $view->penerbit ?>" class="form-control" placeholder="Penerbit"  readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Pengarang :</label>
                                  <input type="text" name="pengarang" value="<?php echo $view->pengarang ?>" class="form-control" placeholder="Pengarang"  readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Kategori :</label>
                                  <input type="text" name="kategori" value="<?php echo $view->kategori ?>" class="form-control" placeholder="Kategori"  readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Nama Klasifikasi :</label>
                                  <input type="text" name="nama_klasifikasi" value="<?php echo $view->nama_klasifikasi ?>" class="form-control" placeholder="Nama Klasifikasi" readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Nomor Klasifikasi :</label>
                                  <input type="text" name="no_klas" value="<?php echo $view->no_klas ?>" class="form-control" placeholder="Nomor Klasifikasi" readonly="">
                                </div>

                                <div class="form-group">
                                  <label>Sinopsis :</label>
                                  <textarea name="sinopsis" class="form-control" rows="10px" readonly=""><?php echo $view->sinopsis ?></textarea>
                                </div>

<!--                                  <div class="form-group">-->
<!--                                      <label>Keyword :</label>-->
<!--                                      <input type="text" name="keyword" value="--><?php //echo $view->keyword ?><!--" class="form-control" placeholder="Keyword" readonly="">-->
<!--                                  </div>-->

                                  <div class="form-group">
                                      <a href="<?php echo base_url() ?>buku" class="btn btn-block btn-success btn-flat" style="width:150px;">Kembali</a>
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

