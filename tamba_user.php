<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
  include_once("layout/sidebar.php");
?>

        

        <!-- Layout container -->
        <div class="layout-page">

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
                            <input type="text" class="form-control" id="basic-default-name" name="nip" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">NAMA LENGKAP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="nama" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">USERNAME</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="username" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">PASSWORD</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-company" name="pass" />
                          </div>
                        </div>
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
            
<?php
  if (isset($_POST["kirim"])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $level = $_POST["level"];

   

    $query = "INSERT INTO user VALUES ('$nip','$nama','$username','$pass','$level')";
    $s = mysqli_query($conn,$query);
    if ($s) {
      echo "
      <script>
          alert('Data Berhasil Ditambah ')
          document.location.href = 'user.php';
      </script>
      ";
    }else {
      echo "
      <script>
          alert('Data Gagal Ditambah ')
          document.location.href = 'user.php';
      </script>
      ";
    }
  }
