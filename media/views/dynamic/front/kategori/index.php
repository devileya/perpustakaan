

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kamus DDC</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Kamus DDC</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sepuluh Kelas Utama</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="float-sm-right col-md-2">
                  <!-- <a href="<?php echo base_url() ?>kategori/tambah" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Tambah Baru</a>-->
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nomor Kategori</th>
                  <th>Nama Kelas</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                foreach($lists as $r){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><a href="<?= site_url('kategori/sub/'.$r->nomor_kategori) ?>"><?= $r->nomor_kategori ?></a></td>
                    <td><?php echo $r->nama_kategori ?></td>
                    <td>
                      <div class="margin">
                        <div class="form-group">
                            <a href="<?php echo base_url() ?>kategori/ubah/<?php echo $r->id ?>" class="btn btn-primary">Ubah</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nomor Kategori</th>
                  <th>Nama Kelas</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

