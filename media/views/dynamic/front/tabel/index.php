

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tabel <?= $this->input->get('tabel',TRUE) ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Tabel <?= $this->input->get('tabel',TRUE) ?></li>
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
                        <h3 class="card-title">List Data Tabel <?= $this->input->get('tabel',TRUE) ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No.Klasifikasi</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            foreach($lists as $r){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $r->no_klas ?></td>
                                    <td><?php echo $r->keterangan ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No.Klasifikasi</th>
                                <th>Keterangan</th>
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

