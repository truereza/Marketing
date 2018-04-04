<?php
include '../config.php';

if(!empty($_POST["kd_lantai"])){
    $query = $koneksi->query("SELECT * FROM head_kamar WHERE kd_lantai =".$_POST['kd_lantai']." AND status = 1 ORDER BY kamar ASC");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Pilih No Kamar</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['kamar'].'">'.$row['kamar'].'</option>';
        }
    }else{
        echo '<option value="">Kamar tidak tersedia</option>';
    }
}
?>