<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");


  $getIN = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 1");
  $setIN = mysqli_num_rows($getIN);

  $getNa = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 2");
  $setNa = mysqli_num_rows($getNa);

  $getLo = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 3");
  $setLo = mysqli_num_rows($getLo);
?>

        

        <!-- Layout container -->
        <div class="layout-page">
        <?php
        
          $doc = query("SELECT * FROM document 
          INNER JOIN tingkatan ON document.id_tingkatan = tingkatan.id_tingkatan 
          INNER JOIN respon ON document.id_respon = respon.id_respon WHERE document.id_respon = 3 ");
          $_SESSION["awal"] = $doc[0]["periodik_k"];
          $_SESSION["akhir"] = $doc[0]["a_periodik"];

        ?>
        

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Hallo <?= $_SESSION["nama"]; ?>!</h5>
                          <p class="mb-4">
                              Selamat Datang Terima Kasih Telah Mengunjungi Website <span>Sistem Informasi Manajemen Kerja Sama Pada Politeknik Negeri Nusa Utara</span> 
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   
            </div>

                   <?php 
                   include "layout/doc_tingkatan.php" ;
                   ?>
            <div class="row mb-5">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Document Kerjasama Yang Akan Selesai</h4>
              <?php if ($_SESSION["awal"] == $_SESSION["akhir"]) : ?>
              <?php foreach ($doc as $d) : ?>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="img/pdf.png" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title"><?= $d["no_kerjasama"];?></h5>
                      <h6 class="card-content"><?= $d["l_mitra"];?></h6>
                      <h6 class="card-content"><?= $d["tingkatan"];?></h6>
                      <h6 class="card-content"><?= $d["periodik_k"]; ?>-<?= $d["a_periodik"]; ?></h6>
                      <a href="lihat.php?id=<?= $d["no_kerjasama"]; ?>" class="btn btn-outline-primary">Lihat Document</a>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>




<?php
  include_once("layout/footer.php")
?>
