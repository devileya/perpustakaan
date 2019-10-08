

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Import Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Import Data Buku</li>
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
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Import File Excel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <a href="<?php echo base_url("assets/format/format1.xlsx"); ?>">
                    <label>Download Format Excel</label>
                  </a>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required="">
                      <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>
                </div>
              </form>

              <div class="form-group">
                <label><i>*Import File Excel Sesuai Format yang Sudah Ditentukan(*.xlsx)</i></label>
                <label><i>*Data Buku Di Dalam File Excel Harus Lengkap (Tidak Boleh Ada Yang Kosong)</i></label>
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

