

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Data Buku</li>
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
            <h3 class="card-title">List Data Buku</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="float-sm-right col-md-2">
                  <a href="<?php echo base_url() ?>buku/tambah" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Tambah Baru</a>
                </div>

                <div class="float-sm-right col-md-2">
                  <a href="<?php echo base_url() ?>buku/import" class="btn btn-block btn-primary btn-flat"><i class="fa fa-upload"></i> Import Excel</a>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama buku</th>
                  <th>Penerbit</th>
                  <th>Pengarang</th>
                  <th>Kategori</th>
                  <th>No.Klasifikasi</th>
                  <th>Sinopsis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                foreach($lists as $r){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r->nama_buku ?></td>
                    <td><?php echo $r->penerbit ?></td>
                    <td><?php echo $r->pengarang ?></td>
                    <td><?php echo $r->kategori ?></td>
                    <td><?php echo $r->no_klas ?></td>
                    <td><?php echo substr($r->sinopsis, 0, 50) ?>...</td>
                    <td>
                      <div class="margin">
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger btn-flat">Aksi</button>
                          <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="<?php echo base_url() ?>buku/view/<?php echo $r->id ?>">Lihat</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>buku/edit/<?php echo $r->id ?>">Ubah</a>
                          </div>
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
                  <th>Nama buku</th>
                  <th>Penerbit</th>
                  <th>Pengarang</th>
                  <th>Kategori</th>
                  <th>No.Klasifikasi</th>
                  <th>Detail Buku</th>
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

