

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Nama Klasifikasi</li>
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

                                <form action="addBuku" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                          <h6><b><font color="red"><?= "Nama Klasifikasi: ".$klasifikasi ?></font></b></h6>

                                            <div class="form-group">
                                                <input type="text" name="nama_buku" class="form-control" value="<?= $title ?>" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required="">
                                            </div>

                                            <div class="form-group">
<!--                                                <select id="kategori" name="kategori" required class="form-control" onchange="showKlasifikasi(this.value)">-->
<!--                                                    --><?php //foreach ($kategori as $item) {
//                                                        echo "<option value='$item->nomor_kategori'>$item->nama_kategori</option >";
//                                                    }
//                                                    ?>
<!--                                                </select>-->
                                                <input type="text" id="kategori" name="kategori" required class="form-control" value="<?= $cari[0]->no_kategori." - ".$cari[0]->kategori ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" id="subkategori" name="subkategori" class="form-control" placeholder="Sub Kategori" required="" readonly value="<?= $subkategori->nomorsubkategori.' ('.$subkategori->keterangan.')' ?>">
                                            </div>

                                            <div class="form-group">
                                                <select id="no_klas" name="no_klas" required class="form-control" onchange="getNamaKlasifikasi(this.value)">
                                                    <?php foreach ($lists_klasifikasi as $item) {
                                                        echo "<option value='$item->no_klasifikasi'>$item->no_klasifikasi - $item->nama_klas</option >";
                                                        }
                                                        ?>
                                                </select>
                                                <!--                                  <input type="text" name="no_klas" class="form-control" placeholder="Nomor Klasifikasi" required="">-->
                                            </div>

                                            <div class="form-group">
                                                <input type="text" id="nama_klasifikasi" name="nama_klasifikasi" class="form-control" placeholder="Nama Klasifikasi" required="" readonly>
                                            </div>

                                            <div class="form-group">
                                                <textarea name="sinopsis" class="form-control" placeholder="Sinopsis" required=""></textarea>
                                                <font color="red" size="2px">*Sinopsis Hanya 1 atau 2 kalimat inti yang menggambarkan isi buku. </font>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Simpan" class="btn btn-block btn-success btn-flat" style="width:150px;">
                                            </div>

                                        </div>

                                    </div>
                                </form>

<!--                              <div class="form-group">-->
<!--                                --><?php
//                                echo $title;
//                                ?>
<!--                              </div>-->

<!--                              <div class="form-group">-->
<!--                                <input type="hidden" name="nama_buku" value="--><?php //echo $title ?><!--" class="form-control">-->
<!--                              </div>-->
<!---->
<!--                              <div class="form-group">-->
<!--                                <input type="text" name="no_klas" class="form-control" placeholder="Nomor Klasifikasi">-->
<!--                              </div>-->
<!---->
<!--                              <div class="form-group">-->
<!--                                <input type="text" name="sinopsis" class="form-control" placeholder="Sinopsis">-->
<!--                                <font color="red" size="2px">*Sinopsis Hanya 1 Kalimat</font>-->
<!--                              </div>-->
<!---->
<!--                              <div class="form-group">-->
<!--                                <input type="text" name="keyword" class="form-control" placeholder="Keyword">-->
<!--                              </div>-->
<!---->
<!--                              <div class="form-group">-->
<!--                                <input type="submit" name="submit" value="Simpan" class="btn btn-block btn-success btn-flat" style="width:150px;">-->
<!--                              </div>-->

                            </div>



                            <div class="col-md-9">

                              <!-- <div class="form-group">
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
                              </div> -->

                              <div class="form-group" style="margin-top:-70px">
                                <br><br><br>
                                <center><h2><b><?= "BUKU SERUPA" ?></b></h2></center>
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>No. Klasifikasi</th>
                                      <th>Judul Buku</th>
                                      <th>Urutan</th>
                                      <th>Nama Klasifikasi</th>
                                      <th>Sinopsis</th>
                                      <th>Detail Buku</th>
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
                                          <td>
                                              <div class="margin">
                                                  <div class="form-group">
                                                     <a href="<?php echo base_url() ?>buku/view/<?php echo $r->id ?>" class="btn btn-primary">Lihat</a>
                                                  </div>
                                              </div>
                                          </td>
<!--                                        <td>--><?php //echo $r->keyword ?><!--</td>-->
                                      </tr>

                                    <?php } ?>

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

                  <!-- right col -->
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
    $(document).ready(function(){
        // we call the function
        // var result = $('#kategori').val().split(" - ")[0];
        var result = $('#subkategori').val().split(" - ")[0];
        // console.log("masuk "+result);
        // showKlasifikasi(result);
        getNamaKlasifikasi($("#no_klas").val());
    });

    function showKlasifikasi(str) {
        console.log("masukkkk "+str);
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

