<?php
    $url  = 'http://localhost/latihan';;
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'db_marketing';

    $koneksi = new mysqli($host,$user,$pass,$name);
    
    if($koneksi->connect_error){
        die('Koneksi Gagal! : ' .$koneksi->connect_error);
    }

    $url = rtrim($url,'/');
?>