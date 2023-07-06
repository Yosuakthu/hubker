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
          INNER JOIN respon ON document.id_respon = respon.id_respon WHERE document.id_respon = 3");
        ?>

 <!-- Basic Bootstrap Table -->
 <div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Document /</span> Document Kerjasama</h4>
    <!-- <button type="button" class="btn btn-primary mb-2">Primary</button> -->
 <div class="card">
                <h5 class="card-header">Table Document Kerjasama</h5>
                <div class="container mb-3">
                  <table class="display" id="dc">
                    <thead>
                      <tr>
                        <th>NOMOR KERJASAMA</th>
                        <th>LEMBAGA MITRA</th>
                        <th>TINGKAT</th>
                        <th>BENTUK KEGIATAN</th>
                        <th>PERIODE KERJASAMA</th>
                        <th>AKHIR PERIODE KERJASAMA</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($doc as $d) : ?>
                    <td><?= $d["no_kerjasama"]; ?></td>
                      <td><?= $d["l_mitra"]; ?></td>
                      <td><?= $d["tingkatan"]; ?></td>
                      <td><?= $d["jenis"]; ?></td>
                      <td><?= $d["periodik_k"]; ?></td>
                      <td><?= $d["a_periodik"]; ?></td>
                        <td>
                          <form method="post">
                            <a href="lihat.php?id=<?= $d["no_kerjasama"]; ?>" type="submit" name="lihat" class="btn btn-primary" ><i class='bx bxs-report'></i></a>
                          </form>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
              </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              

              </div>
              <?php include_once("layout/footer.php") ?>

              <script>
  	
    let table = new DataTable('#dc',{
    responsive: true
});
	
              </script>