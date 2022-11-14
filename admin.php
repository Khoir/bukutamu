<?php include "header.php"; ?>

<?php

// uji bila tmbol simpan di klik
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

    // htmlspecialchars agar inputan aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('', '$tgl', '$nama', '$alamat', '$tujuan', '$nope')");

    // uji jika simpan data sukses
    if($simpan){
        echo "<script>alert('simpan sukses, terima kasih');
        document.location='?'</script>";

    }else {
        echo "<script>alert('simpan data gagal');
        document.location='?'</script>";
    }
}
?>

                       <!-- head awal -->
                        <div class="head text-center">
                            <img src="assets/img/pok.png" width="100">
                            <h2 class="text-white">sistem informasi buku tamu <br> Ngodingpintar</h2>
                        </div>
                        <!-- head end -->

                        <!-- awal row -->
                        <div class="row mt-2">
                            <!-- col-lg-7 -->
                            <div class="col-lg-7 mb-3">
                                <div class="card shadow bg-gradient-light">
                                    <!-- card body -->
                                    <div class="card-body">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                <div class="text-center"><h1 class="h4 text-gray-900 mb-4">identitas pengunjung</h1></div>
                                                <div class="card-body">
                                                    <form class="user" method="POST" action="">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Pengunjung" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan Pengunjung" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control form-control-user" name="nope" placeholder="No.Hp Pengunjung" required>

                                                        </div>


                                                        <button type="submit" name="bsimpan" class="btn btn-primary btn-block" >simpan data</button>
                                                        
                                                    </form>
                                                </div>
                                                <div class="card-footer text-center py-3">
                                                    <div class="small"><a href="#">by. Ngodingpintar | 2021 - <?=date('Y')?></a></div>
                                                </div>
                                            </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                            <!-- end-lg-7 -->

                            <!-- col-lg-5 -->
                            <div class="col-lg-5 mb-3">
                                <!-- card -->
                                <div class="card shadow">
                                    <!-- card body -->
                                    <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Statistik pengunjung</h1>
                                    </div>
                                    <?php
                                    // deklarasi tanggal

                                        $tgl_sekarang = date('Y-m-d');

                                        // menampilkan tgl kemarin
                                        $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                                        // mendapatkan 6 hari sebelum sekarang
                                        $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1day', strtotime($tgl_sekarang)));

                                        $sekarang = date('Y-m-d h:i:s');

                                        $bulan_ini = date('m');

                                        // persiapan query tampilkan jumlah data pengunjung
                                        $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                                            $koneksi,
                                            "SELECT count(*) FROM ttamu where tanggal like '%$tgl_sekarang%'"
                                        ));

                                        $kemarin = mysqli_fetch_array(mysqli_query(
                                            $koneksi,
                                            "SELECT count(*) FROM ttamu where tanggal like '%$kemarin%'"
                                        ));

                                        $seminggu = mysqli_fetch_array(mysqli_query(
                                            $koneksi,
                                            "SELECT count(*) FROM ttamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                                        ));

                                        $sebulan = mysqli_fetch_array(mysqli_query(
                                            $koneksi,
                                            "SELECT count(*) FROM ttamu where month(tanggal) = '$bulan_ini'"
                                        ));
                                        $keseluruhan = mysqli_fetch_array(mysqli_query(
                                            $koneksi,
                                            "SELECT count(*) FROM ttamu"
                                        ));

                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>hari ini</td>
                                            <td>: <?= $tgl_sekarang[0]?></td>
                                        </tr>
                                        <tr>
                                            <td>kemarin</td>
                                            <td>: <?= $kemarin[0]?></td>
                                        </tr>
                                        <tr>
                                            <td>minggu ini</td>
                                            <td>: <?= $seminggu[0]?></td>
                                        </tr>
                                        <tr>
                                            <td>sebulan</td>
                                            <td>: <?= $sebulan[0]?></td>
                                        </tr>
                                        <tr>
                                            <td>keseluruhan</td>
                                            <td>: <?= $keseluruhan[0]?></td>
                                        </tr>
                                        

                                    </table>
                                               
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end-lg-5 -->
                        </div>
                        <!-- akhir row -->

                        <!-- datatables esxample -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pengunjung Hari ini [<?=date('d-m-Y')?>]
                            </div>
                            <div class="card-body">
                                <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i></i> Rekapitulasi pengunjung</a>
                                <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out"></i></i> Logout</a>
                                <div class="table-responsive">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengunjung</th>
                                                <th>Alamat</th>
                                                <th>Tujuan</th>
                                                <th>No. HP</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengunjung</th>
                                                <th>Alamat</th>
                                                <th>Tujuan</th>
                                                <th>No. HP</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $tgl = date('Y-m-d');
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like '%$tgl%' order by id desc"); 
                                            $no = 1;
                                            while($data = mysqli_fetch_array($tampil)) {

                                            
                                            ?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $data['tanggal']?></td>
                                                <td><?= $data['nama']?></td>
                                                <td><?= $data['alamat']?></td>
                                                <td><?= $data['tujuan']?></td>
                                                <td><?= $data['nope']?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<?php include "footer.php" ?>