<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");
?>

        

        <!-- Layout container -->
        <div class="layout-page">
        <?php
          $id = $_GET["id"];
          $doc = query("SELECT * FROM user 
          INNER JOIN level ON user.id_level = level.id_level WHERE nip = '$id'")[0];
        ?>

<!-- content -->


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Ubah User</h4>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">User</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name" >NIP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="nip" value="<?= $doc["nip"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">NAMA LENGKAP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="nama" value="<?= $doc["nama"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">USERNAME</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="username" value="<?= $doc["username"];?>" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">PASSWORD</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-company" name="pass" value="<?= $doc["pass"];?>" />
                          </div>
                        </div>
                        <?php if ($doc["id_level"] == 1) : ?>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">LEVEL USER</label>
                          <div class="col-sm-10">
                            <select name="level" id="" class="form-control">
                                <option selected>---Pilih Tingkatan---</option>
                                  <?php $query1 =  "SELECT * FROM level ";
                                    $s = mysqli_query($conn,$query1);
                                while ($data = mysqli_fetch_array($s)) :    ?>
                                <option value="<?= $data["id_level"]; ?>"><?= $data["level"]; ?></option>
                                <?php endwhile ?>
                            </select>
                          </div>
                        </div>
                        <?php endif ?>
                        <?php if ($doc["id_level"] == 2) : ?>
                          <input type="hidden" name="level" value="2">
                          <?php endif ?>
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
                            alert('Data Berhasil Diubah')
                            document.location.href = 'user.php';
                        </script>
                        ";
                    }else {
                            echo "
                            <script>
                                alert('Data Tidak Berhasil Diubah')
                                document.location.href = 'user.php';
                            </script>
                            ";
                        } ?>
                 <?php endif ?>

                 <?php
                        function ubah($data){
                            global $conn;
                            $nip = $data["nip"];
                            $nama = $data["nama"];
                            $username = $data["username"];
                            $pass = $data["pass"];
                            $level = $data["level"];
                           
                         
                    
                            $query = "UPDATE user SET
                            nama = '$nama',
                            username = '$username',
                            pass = '$pass',
                            id_level = '$level'
                            WHERE nip = '$nip'";
                            mysqli_query($conn,$query);
                            return mysqli_affected_rows($conn);
                        }

                       
                 ?>