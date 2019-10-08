
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Buku</h1>
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

                                                    <form action=<?=site_url("buku/updateBuku/".$this->uri->segment(3))?> method="post">

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Nama Buku :</label>
                                                                    <input type="text" name="nama_buku" class="form-control" placeholder="Nama Buku" value="<?= $buku->nama_buku ?>" required="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Penerbit :</label>
                                                                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="<?= $buku->penerbit ?>" required="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Pengarang :</label>
                                                                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="<?= $buku->pengarang ?>" required="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Kategori :</label>
                                                                    <select id="kategori" name="kategori" required class="form-control" onchange="showKlasifikasi(this.value)">
                                                                        <?php foreach ($kategori as $item) {
                                                                            if ($buku->no_kategori == $item->nomor_kategori) echo "<option value='$item->nomor_kategori' selected>$item->nama_kategori</option >";
                                                                            else echo "<option value='$item->nomor_kategori'>$item->nama_kategori</option >";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <!--                                  <input type="text" name="kategori" class="form-control" placeholder="Kategori" required="">-->
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Nomor Klasifikasi :</label>
                                                                    <select id="no_klas" name="no_klas" required class="form-control" onchange="getNamaKlasifikasi(this.value)">
                                                                        <option value="<?= $buku->no_klas ?>" selected><?= $buku->no_klas ?></option>
                                                                    </select>
                                                                    <!--                                  <input type="text" name="no_klas" class="form-control" placeholder="Nomor Klasifikasi" required="">-->
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Nama Klasifikasi :</label>
                                                                    <input type="text" id="nama_klasifikasi" name="nama_klasifikasi" class="form-control" placeholder="Nama Klasifikasi" required="" value="<?= $buku->nama_klasifikasi ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Sinopsis :</label>
                                                                    <input type="text" name="sinopsis" class="form-control" placeholder="Sinopsis" value="<?= $buku->sinopsis ?>" required="">
                                                                </div>

                                                                <!--                                <div class="form-group">-->
                                                                <!--                                  <label>Keyword :</label>-->
                                                                <!--                                  <input type="text" name="keyword" class="form-control" placeholder="Keyword" required="">-->
                                                                <!--                                </div>-->
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
<script>
    function showKlasifikasi(str) {
        if (str == "") {
            return;
        } else {

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $('#no_klas').html(this.responseText);
                }
            };
            xmlhttp.open("GET","http://localhost/perpustakaan/buku/getKlasifikasi?no_kategori="+str,true);
            xmlhttp.send();
        }
    }

    function getNamaKlasifikasi(str) {
        if (str == "") {
            $("#nama_klasifikasi").val("");
            return;
        } else {

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $("#nama_klasifikasi").val(this.responseText);
                }
            };
            xmlhttp.open("GET","http://localhost/perpustakaan/buku/getNamaKlasifikasi?no_klas="+str,true);
            xmlhttp.send();
        }
    }
</script>

