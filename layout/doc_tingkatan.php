<?php
  $getIN = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 1 ");
  $setIN = mysqli_num_rows($getIN);

  $getNa = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 2 ");
  $setNa = mysqli_num_rows($getNa);

  $getLo = mysqli_query($conn,"SELECT * FROM Document WHERE id_tingkatan = 3");
  $setLo = mysqli_num_rows($getLo);
?>
<div class="col-lg-8 col-md-7 order-1">
<div class="row">
                  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Document Tingkatan Kegiatan</h4>
                    <div class="col-lg-4 col-md-12 col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          </div>
                          <span class="fw-semibold d-block mb-1">Internasional</span>
                          <h3 class="card-title mb-2"><?= $setIN ?> Document</h3>
                          <small > <a href="file.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          </div>
                          <span class="fw-semibold d-block mb-1">Nasional</span>
                          <h3 class="card-title mb-2"><?= $setNa ?> Document</h3>
                          <small > <a href="file_n.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          </div>
                          <span class="fw-semibold d-block mb-1">Wilaya/Lokal</span>
                          <h3 class="card-title mb-2"><?= $setLo ?> Document</h3>
                          <small > <a href="file_lokal.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>

                      </div>
                      </div>