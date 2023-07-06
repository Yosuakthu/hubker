<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");
?>

        

        <!-- Layout container -->
        <div class="layout-page">
        <?php
          $doc = query("SELECT * FROM document 
          INNER JOIN tingkatan ON document.id_tingkatan = tingkatan.id_tingkatan 
          INNER JOIN respon ON document.id_respon = respon.id_respon WHERE document.id_tingkatan = 1");
        ?>
        

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            
 <div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Fie Document Kerjasama Tingkatan Inetrnasional</h4>
            
            <div class="row mb-5">
            <?php foreach ($doc as $d) : ?>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="img/pdf.png" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title"><?= $d["no_kerjasama"];?></h5>
                      <h6 class="card-content"><?= $d["l_mitra"];?></h6>
                      <h6 class="card-content"><?= $d["periodik_k"]; ?>-<?= $d["a_periodik"]; ?></h6>
                      
                      <a href="lihat.php?id=<?= $d["no_kerjasama"]; ?>" class="btn btn-outline-primary">Lihat Document</a>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>


 </div>

 <?php include_once("layout/footer.php") ?>