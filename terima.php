<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");


  $id = $_GET["id"];
  $ambil = query("SELECT id_respon FROM document WHERE no_kerjasama = '$id'");
  
    if (isset($id)) {
        $query = "UPDATE document SET id_respon = 3 WHERE no_kerjasama = '$id'";
        $ubah = mysqli_query($conn,$query)or die('gagal 1');
        if ($ubah == 1) {
            echo "
            <script>
                alert('Document Diterima')
                document.location.href = 'p_dc.php';
            </script>
            ";
        }else {
            echo "
            <script>
                alert('Gagal Direspon')
                document.location.href = 'p_dc.php';
            </script>
            ";
        }
    }


  include_once("layout/footer.php");
