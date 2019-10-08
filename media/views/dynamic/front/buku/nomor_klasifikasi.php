

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Nomor Klasifikasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Nomor Klasifikasi</li>
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

                          <div class="row">
                            <div class="col-md-3">

                              <div class="form-group">
                                Judul Buku/Book Title
                              </div>

                              <div class="form-group">
                                <input type="text" name="no_klas" class="form-control" placeholder="Nomor Klasifikasi">
                              </div>

                              <div class="form-group">
                                <input type="text" name="sinopsis" class="form-control" placeholder="Sinopsis">
                                <font color="red" size="2px">*Sinopsis Hanya 1 Kalimat</font>
                              </div>

                              <div class="form-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                              </div>

                              <div class="form-group">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-block btn-success btn-flat" style="width:150px;">
                              </div>

                            </div>


                            <div class="col-md-9">

                              <div class="form-group">
                                <form action="<?php echo base_url() ?>buku/nomorklasifikasi" method="get" enctype="multipart/form-data">

                                  <div class="row">
                                    <div class="col-md-4">

                                      <div class="form-group">
                                        <select name="q" class="form-control select2" style="width: 100%;" required="">
                                          <option value="">No. Kategori</option>

                                          <?php
                                          foreach($lists_kategori as $r){
                                            ?>

                                            <option value="<?php echo $r->nomor_kategori ?>"><?php echo $r->nomor_kategori ?> - <?php echo $r->nama_kategori ?></option>

                                          <?php } ?>
                                        </select>
                                      </div>

                                    </div>

                                    <div class="col-md-4">    
                                      <div class="form-group">
                                        <button type="submit" style="width: 130px;" class="btn btn-block btn-warning btn-flat">Lihat Semua</button>
                                        <font color="red" size="2px">*Untuk melihat sub-kelas di setiap kategori</font>
                                      </div>
                                    </div>
                                  </div>

                                </form>
                              </div>

                              <div class="form-group">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>No. Klasifikasi</th>
                                      <th>Nama Klasifikasi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach($cari as $r){
                                      if($subs == $r->satu){
                                        ?>
                                        <tr>
                                          <td><?php echo $r->no_klas ?></td>
                                          <td><?php echo $r->nama_klasifikasi ?></td>
                                        </tr>
                                      <?php } }?>

                                    </tbody>
                                  </table>
                                </div>

                              </div>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                        <div class="card-footer">
                          <a href="<?php echo base_url() ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Beranda</a>
                        </div>

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

