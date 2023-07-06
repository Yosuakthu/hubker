<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");
?>

        

        <!-- Layout container -->
        <div class="layout-page">
        <?php
          $id = $_GET["id"];
          $doc = query("SELECT * FROM document 
          INNER JOIN tingkatan ON document.id_tingkatan = tingkatan.id_tingkatan 
          INNER JOIN respon ON document.id_respon = respon.id_respon WHERE document.no_kerjasama = '$id'")[0];
        ?>

<!-- content -->


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Document /</span>Ubah Document Kerjasama</h4>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Documen Kerjasama</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name" >Nomor Kerjasama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="nk" value="<?= $doc["no_kerjasama"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">LEMBAGA MITRA</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="lm" value="<?= $doc["l_mitra"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">TINGKAT KERJASAMA</label>
                          <div class="col-sm-10">
                            <select name="tk" id="" class="form-control">
                                <option selected>---Pilih Tingkatan---</option>
                                <?php $query1 =  "SELECT * FROM tingkatan ";
                                    $s = mysqli_query($conn,$query1);
                                while ($data = mysqli_fetch_array($s)) :    ?>
                                <option value="<?= $data["id_tingkatan"]; ?>"><?= $data["tingkatan"]; ?></option>
                                <?php endwhile ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">BENTUK KEGIATAN</label>
                          <div class="col-sm-10">
                          <?php $query1 =  "SELECT * FROM jenis ";
                                    $s = mysqli_query($conn,$query1);
                                while ($data = mysqli_fetch_array($s)) :    ?>
                            <input type="checkbox" class="mx-3" id="basic-default-company" name="bk[ ]" value="<?= $data["jenis"]; ?>"/><?= $data["jenis"]; ?>
                            <?php endwhile ?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">PERIODE KERJASAMA</label>
                          <div class="col-sm-5">
                            <input type="date" class="form-control" id="basic-default-company" name="pk" value="<?= $doc["periodik_k"];?>" />
                          </div>
                          <div class="col-sm-5">
                            <input type="date" class="form-control" id="basic-default-company" name="ap" value="<?= $doc["a_periodik"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">FILE KERJASAMA</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" id="basic-default-company" name="fk" value="<?= $doc["f_kerjasama"];?>" />
                            <input type="hidden" value="1" name="respon"/>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="kirim">KIRIM</button>
                          </div>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
                <?php if(isset($_POST["kirim"])) : ?>
                    <?php if (ubah($_POST) > 0) {
                        echo "
                        <script>
                            alert('Document Berhasil Diubah')
                            document.location.href = 'p_dc.php';
                        </script>
                        ";
                    }else {
                            echo "
                            <script>
                                alert('Data Tidak Berhasil Diubah')
                                document.location.href = 'p_dc.php';
                            </script>
                            ";
                        } ?>
                 <?php endif ?>

                 <?php
                        function ubah($data){
                            global $conn;
                            $nk = $data["nk"];
                            $lm = $data["lm"];
                            $tk = $data["tk"];
                            $bk = $data["bk"];
                            $pk = $data["pk"];
                            $ap = $data["ap"];
                            $res = $data["respon"];

                            $data = implode("," ,$bk);

                            $fk = up();
                                if(!$fk){
                                 return false;
                                    }
                    
                            $query = "UPDATE document SET
                            l_mitra = '$lm',
                            id_tingkatan = '$tk',
                            jenis = '$data',
                            periodik_k = '$pk',
                            a_periodik = '$ap',
                            id_respon = '$res',
                            f_kerjasama = '$fk'
                            WHERE no_kerjasama = '$nk'";
                            mysqli_query($conn,$query);
                            return mysqli_affected_rows($conn);
                        }

                        function up(){

                            $nama = $_FILES["fk"]["name"];
                            $ukuran =$_FILES["fk"]["size"];
                            $error = $_FILES["fk"]["error"];
                            $penyimpanan = $_FILES["fk"]["tmp_name"];
                        
                            // cek apakah data di upload
                        
                            if ($error === 4) {
                                echo "
                                <script>
                                    alert('Silakan Upload Doument')
                                    document.location.href='tambah_dc.php';
                                </script>
                                ";
                                return false;
                            }
                        
                            // cek extensi data
                        
                            $extensivalid = ['pdf'];
                            $extensi1 = explode('.',$nama);
                            $extensi = strtolower(end($extensi1));
                        
                            if (!in_array($extensi,$extensivalid)) {
                              echo "
                              <script>
                                  alert('Extensi File Tidak Sesuai')
                                  document.location.href='tambah_dc.php';
                              </script>
                              ";
                              return false;
                            }
                        
                            // batasi ukuran
                            if ($ukuran > 20000000) {
                              echo "
                              <script>
                                  alert('Ukuran File Terlalu Besar')
                                  document.location.href='tambah_dc.php';
                              </script>
                              ";
                              return false;
                            }
                            
                            move_uploaded_file($penyimpanan,'file/'.$nama);
                        
                            return $nama;
                        }
                 ?>