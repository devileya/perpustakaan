

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hasil Pencarian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Hasil Pencarian  </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-12">

    <!-- Map card -->
    <div class="card bg-default-gradient">

      <div class="card-body">
        <div class="row">

          <div class="col-md-12">
            <div class="form-group">
              <br/><br/><center><h2><?php echo $getkategori ?></h2></center>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No. Klasifikasi</th>
                    <th>Judul Buku</th>
                    <th>Urutan</th>
                    <th>Nama Klasifikasi</th>
                    <th>Sinopsis</th>
                    <th>Keyword</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $urut = 1;
                    foreach($cari as $r){
                  ?>
                  <tr>
                    <td><?php echo $r->no_klas ?></td>
                    <td><?php echo $r->nama_buku ?></td>
                    <td><?php echo $urut++ ?></td>
                    <td><?php echo $r->nama_klasifikasi ?></td>
                    <td><?php echo $r->sinopsis ?></td>
                    <td><?php echo $r->keyword ?></td>
                  </tr>
                <?php } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>No. Klasifikasi</th>
                    <th>Judul Buku</th>
                    <th>Urutan</th>
                    <th>Nama Klasifikasi</th>
                    <th>Sinopsis</th>
                    <th>Keyword</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
      </div>
      <!-- /.card-body-->

    </div>
    <!-- /.card -->

  </section>
  <!-- right col -->
</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
  <a href="<?php echo base_url() ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Beranda</a>
</div>
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

