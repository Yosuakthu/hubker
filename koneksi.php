<?php
    $conn = mysqli_connect('localhost','root','','kerjasama');


    // fungsi query
    function query($query){
        global $conn;
        $ambil = mysqli_query($conn,$query);
        $rows = [];
        while ($row = mysqli_fetch_array($ambil)) {
            $rows[] =$row;
        }
        return $rows;
    }



?>