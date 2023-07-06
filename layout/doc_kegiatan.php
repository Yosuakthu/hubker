<?php
  $getIN = mysqli_query($conn,"SELECT * FROM Document WHERE jenis = 'Pendidikan'");
  $setIN = mysqli_num_rows($getIN);

  $getNa = mysqli_query($conn,"SELECT * FROM Document WHERE jenis = 'Penelitian'");
  $setNa = mysqli_num_rows($getNa);

  $getLo = mysqli_query($conn,"SELECT * FROM Document WHERE jenis = 'Pengabdian Masyarakat'");
  $setLo = mysqli_num_rows($getLo);
?>
<div class="col-lg-9 col-md-7 order-1">
<div class="row">
                  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Document Jenis Kegiatan</h4>
                    <div class="col-lg-4 col-md-12 col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Pendidikan</span>
                          <h3 class="card-title mb-2"><?= $setIN ?> Document</h3>
                          <small > <a href="file.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Penelitian</span>
                          <h3 class="card-title mb-2"><?= $setNa ?> Document</h3>
                          <small > <a href="file.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Pengabdian Masyarakat</span>
                          <h3 class="card-title mb-2"><?= $setLo ?> Document</h3>
                          <small > <a href="file.php" class="text-success fw-semibold">view</a></small>
                        </div>
                      </div>
                    </div>

                      </div>
                      </div>