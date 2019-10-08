

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Data kategori</li>
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
                        <h3 class="card-title"><?= $kategori[0]->nomor_kategori." - ".$kategori[0]->nama_kategori ?></h3>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
<!--                                <th>No</th>-->
                                <th>Sub Kategori</th>
<!--                                <th>Nama Kategori</th>-->
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($lists as $index => $item) { ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url('kategori/klasifikasi/'.$item->nomorsubkategori) ?>"><?= $item->nomorsubkategori." - ".$item->keterangan ?></a>
                                    </td>
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

