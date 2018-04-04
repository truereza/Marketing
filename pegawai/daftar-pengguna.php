<?php
include '../config.php';

$query = $koneksi->query("SELECT * FROM detail_lantai WHERE status = 1 ORDER BY lantai ASC");
$rowCount = $query->num_rows;
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="../style/styles1.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Aplikasi Marketing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto"></ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

    <!--FORM-->
    <form action="booking.php" method="POST" class="form-menu-heading" onsubmit="isValid();">
    <div class="wrapper">
        <br><h2 class="form-menu-heading" align="center">Daftar Pengguna</h2><br>

        <div class="form-group" name="lantai" align="center">
            <label for="lantai" class="col-sm-2 control-label"><b>Lantai :</b></label>
            <div class="col-sm-2">
               <select class="form-control" name="lantai" id="lantai">
                   <option value="">---Pilih Lantai---</option>
                   <?php
                   if($rowCount > 0){
                        while($row = $query->fetch_assoc()){
                            echo '<option value="'.$row['kd_lantai'].'">'.$row['lantai'].'</option>';
                        }
                   }else{
                       echo '<option value="">Lantai tidak tersedia</option>';
                   }
                   ?>
               </select>
            </div>
        </div>
        <div class="form-group" name="kamar" align="center">
            <label for="kamar" class="col-sm-2 control-label"><b>Kamar :</b></label>
            <div class="col-sm-2">
               <select class="form-control" name="kamar" id="kamar">
               <option value="">---Pilih Lantai Dulu---</option>
               </select>
            </div>
        </div>
        <div class="form-group" name="nama" align="center">
            <label for="nama" class="col-sm-2 control-label"><b>Nama :</b></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="form-group" name="no_id" align="center">
            <label for="no_id" class="col-sm-2 control-label"><b>No Identitas :</b></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="no_id" name="no_id" placeholder="Masukan No. Identitas">
            </div>
        </div>
        <div class="form-group" name="daftar" align="center">
            <br>
            <button type="submit" name="daftar" class="btn btn-primary"><b>DAFTAR</b></button>
        </div>
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#lantai').on('change',function(){
                var kodeLt = $(this).val();
                if(kodeLt){
                    $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data: 'kd_lantai='+kodeLt,
                    success:function(html){
                        $('#kamar').html(html);
                    }
                    });
                } else {
                    $('#kamar').html('<option value="">Pilih Lantai terlebih dahulu</option>');
                }
            });
        });
    </script>
    <script type="text/javascript">
        function isValid(){
            var lantai = document.getElementById("lantai").value;
            var kamar = document.getElementById("kamar").value;
            var nama = document.getElementById("nama").value;
            var noID = document.getElementById("no_id").value;

            if(lantai != "" && kamar != "" && nama != "" && noID != ""){
                return true;
            }else{
                alert ('Anda harus mengisi semua data dengan lengkap!');
            }
        } 
    </script>
</body>
</html>