<?php
  include_once("koneksi.php");
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/poli.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                <img src="img/poli.png" alt="Polnustar" height="100px" width="100px">
                </a>
              </div>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Buat Akun Baru</h4>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                <div class="mb-3">
                  <label for="nip" class="form-label">NIP</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nip"
                    name="nip"
                    placeholder="Masukan NIP"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    placeholder="Masukan Nama Lengkap"
                    autofocus
                  />
                  <input type="hidden" name="level" value="2">
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Masukan username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="pass1">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="pass1"
                      class="form-control"
                      name="pass1"
                      placeholder="Masukan Password"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="pass2">Konfirmasi Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="pass2"
                      class="form-control"
                      name="pass2"
                      placeholder="Masukan Konfirmasi Password"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100" name="regis">Kirim</button>
              </form>

              <p class="text-center">
                <span>Sudah Punya Akun?</span>
                <a href="login.php">
                  <span>Masuk Di Sini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

<?php

if (isset($_POST["regis"])) {

  // var_dump($_POST);  
  if( regis($_POST) > 0) {
      echo "
      <script>
          alert('User Berhasil Ditambah ')
          document.location.href = 'login.php';
      </script>
      ";
  }else{
      echo mysqli_error($conn);
  }
}

  function regis($regis){
    global $conn;
    $nip = strtolower(stripcslashes($regis["nip"]));
    $nama = strtolower(stripcslashes($regis["nama"]));
    $username = strtolower(stripcslashes($regis["username"])) ;
    $pass = mysqli_real_escape_string($conn,$regis["pass1"]);
    $pass2 = mysqli_real_escape_string($conn,$regis["pass2"]);
    $level = $regis["level"];
   

    $r = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($r)) {
        echo "
        <script>
            alert('Username dan Email Sudah Terdaftar')
        </script>
        ";
        return false;
    }
    
    // cek konfirmasi pass
    if ($pass !== $pass2) {
        echo "
        <script>
            alert('Konfirmasi Password Tidak Sesuai')
        </script>
        ";

        return false;
    }


    //tambah data ke database
    $query = "INSERT INTO user VALUES ('$nip','$nama','$username','$pass','$level')";

    $s = mysqli_query($conn,$query) or die ('gagal 1');



   return mysqli_affected_rows($conn);


}
?>