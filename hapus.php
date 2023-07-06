<?php
  include_once('koneksi.php');
 
  $id = $_GET["id"];

  if( hapus_data($id) > 0) {
    echo "
    <script>
        alert('Data Berhasil Dihapus ')
        document.location.href = 'p_dc.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus ')
        document.location.href = 'p_dc.php';
    </script>
    ";
}


  function hapus_data($id){
    global $conn;
    mysqli_query($conn," DELETE FROM document WHERE no_kerjasama = '$id'"); 
    return mysqli_affected_rows($conn);
}
