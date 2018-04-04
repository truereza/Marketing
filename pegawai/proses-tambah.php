<?php 
    include '../config.php';
    if(isset($_POST['booking']))
    {
        $no_kamar = mysqli_real_escape_string($koneksi, $_POST['kamar']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $no_id = mysqli_real_escape_string($koneksi, $_POST['no_id']);
        

        $query ="INSERT INTO pendaftaran(no_pesan,kamar,nama,no_id) VALUES ('','$no_kamar','$nama','$no_id')";

        if(mysqli_query($koneksi,$query)){
            $last_id = mysqli_insert_id($koneksi);
            mysqli_query($koneksi, "UPDATE head_kamar SET no_pesan='$last_id' WHERE kamar = '$no_kamar'");
            header("location: terimakasih.html");
        }else{
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
        mysqli_close($koneksi);
    }
?>