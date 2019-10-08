

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
                                    <a href="<?php echo base_url() ?>kategori/tambah" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                                <th>Nomor Klasifikasi</th>
                                <th>Nama Klasifikasi</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            foreach($lists as $r){
                                if ($this->uri->segment(3) == "2X0-2X9" && substr($r->no_klasifikasi, 0, 3) == "002") continue;
                                if ($this->uri->segment(3) == "000-009" && substr($r->no_klasifikasi, 0, 2) == "2X") break;

                                $keterangan = str_replace("Tabel 1", "<a href='".site_url("tabel?tabel=1")."'>Tabel 1</a>", $r->keterangan);
                                $keterangan = str_replace("Tabel 2", "<a href='".site_url("tabel?tabel=2")."'>Tabel 2</a>", $keterangan);
                                $keterangan = str_replace("Tabel 3", "<a href='".site_url("tabel?tabel=3")."'>Tabel 3</a>", $keterangan);
                                $keterangan = str_replace("Tabel 4", "<a href='".site_url("tabel?tabel=4")."'>Tabel 4</a>", $keterangan);
                                $keterangan = str_replace("Tabel 5", "<a href='".site_url("tabel?tabel=5")."'>Tabel 5</a>", $keterangan);
                                $keterangan = str_replace("Tabel 6", "<a href='".site_url("tabel?tabel=6")."'>Tabel 6</a>", $keterangan);
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $r->no_klasifikasi ?></a></td>
                                    <td><?= $r->nama_klas ?></td>
                                    <td><?php echo $keterangan?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
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

