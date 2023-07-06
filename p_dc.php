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
          INNER JOIN respon ON document.id_respon = respon.id_respon");
        ?>

 <!-- Basic Bootstrap Table -->
 <div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Document /</span>Permohonan Document Kerjasama</h4>
    <!-- <button type="button" class="btn btn-primary mb-2">Primary</button> -->
 <div class="card">
              <h5 class="card-header">Table Permintaan Kerjasama</h5>
              <div class="container mb-3">
                  <table class="display" id="p_dc">
                    <thead>
                      <tr>
                        <th>NOMOR KERJASAMA</th>
                        <th>LEMBAGA MITRA</th>
                        <th>TINGKAT</th>
                        <th>BENTUK KEGIATAN</th>
                        <th>PERIODE KERJASAMA</th>
                        <th>AKHIR PERIODE KERJASAMA</th>
                        <th>Status</th>
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
                      <td><?= $d["respon"]; ?></td>
                      <form action="" method="post">
                        <td>
                            <a href="lihat.php?id=<?= $d["no_kerjasama"]; ?>" type="submit" name="lihat" class="btn btn-primary" ><i class='bx bxs-report'></i></a>
                            <?php if ( $d["id_respon"] == 1) : ?>
                            <a href="terima.php?id=<?= $d["no_kerjasama"]; ?>" type="submit" name="terima" class="btn btn-success" ><i class='bx bx-check'></i></a>
                            <a href="tolak.php?id=<?= $d["no_kerjasama"]; ?>" type="button" name="tolak" class="btn btn-danger" ><i class='bx bx-x'></i></a>
                            <?php endif ?>
                              <?php if ($d["id_respon"] != 1)  :
                            ?>
                            <a href="edit.php?id=<?= $d["no_kerjasama"]; ?>" type="submit" name="edit" class="btn btn-warning" ><i class='bx bx-pencil'></i></a>
                            <a href="hapus.php?id=<?= $d["no_kerjasama"]; ?>" type="button" name="hapus" class="btn btn-danger" onclick="return confirm('Andah Yakin Ingin Menghapus Data');"><i class='bx bx-trash'></i></a>
                            <?php endif ?>
                          </td>
                      </form>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              </div>
<?php
  include_once("layout/footer.php");
?>
<script>
  	
    $(document).ready( function () {
    $('#p_dc').DataTable({
    responsive: true
});
} );
	
              </script>