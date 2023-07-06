<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");

?>

        

        <!-- Layout container -->
        <div class="layout-page">
        <?php
          $doc = query("SELECT * FROM user 
          INNER JOIN level ON user.id_level = level.id_level ");
        ?>

<div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Document /</span> Document Kerjasama</h4>
 <?php if ($doc[0]["id_level"] == 1) : ?>
    <a href="tamba_user.php" type="button" class="btn btn-primary mb-2"><i class='bx bxs-user-plus'></i></a>
    <?php endif ?>
 <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="container mb-3">
                  <table class="display" id="user">
                    <thead>
                      <tr>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>LEVEL</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($doc as $d) : ?>
                    <td><?= $d["nip"]; ?></td>
                      <td><?= $d["nama"]; ?></td>
                      <td><?= $d["username"]; ?></td>
                      <td><?= $d["level"]; ?></td>
                      <?php if ($doc[0]["id_level"] == 1) : ?>
                      <td>
                      <a href="edit_u.php?id=<?= $d["nip"]; ?>" type="submit" name="edit" class="btn btn-warning" ><i class='bx bx-pencil'></i></a>
                            <a href="hapus_u.php?id=<?= $d["nip"]; ?>" type="button" name="hapus" class="btn btn-danger" onclick="return confirm('Andah Yakin Ingin Menghapus Data');"><i class='bx bx-trash'></i></a>
                      </td>
                      <?php endif ?>
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
  	
    let table = new DataTable('#user',{
    responsive: true
});
	
              </script>