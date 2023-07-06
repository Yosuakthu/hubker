<?php
  include_once('koneksi.php');
  include_once("layout/header.php");
 


  $id = $_GET["id"];
  $ambil = query("SELECT f_kerjasama FROM document WHERE no_kerjasama = '$id'");

  foreach($ambil as $data) : ?>

    <object data="file/<?= $data["f_kerjasama"] ?>" width="100%" height="1000px"></object>


 <?php endforeach ?>