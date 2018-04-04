<?php
include '../config.php';
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/styles1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cek Ketersediaan</title>
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Aplikasi Marketing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cek-booking.php">Cek Booking </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cek-ketersediaan.php">Cek Ketersediaan </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="wrapper">
        <h2 class="form-menu-heading" align="center">Cek Ketersediaan</h2><br/>

        <div class="form-group" name="lantai1" align="center">
            <div class="card bg-light mb-3" style="max-width: 25rem;" align="center">
            <div class="card-header"><b>Lantai 1</b></div>
            <div class="card-body">
            <?php
                $query = "SELECT * FROM head_kamar WHERE kd_lantai = 1";
                $result = $koneksi->query($query);

                while($row = $result->fetch_array())
                $rows[] = $row; 

                foreach($rows as $row){
                  if($row['no_pesan'] > 0){
                    echo '<img src="../img/onetada.png"/>';
                  }else{
                    echo '<img src="../img/oneada.png"/>';
                  }
                }
                ?>
            </div>
          </div>
        </div>

        <div class="form-group" name="lantai2" align="center">
            <div class="card bg-light mb-3" style="max-width: 25rem;" align="center">
            <div class="card-header"><b>Lantai 2</b></div>
            <div class="card-body">
            <?php
                $query = "SELECT kd_lantai, no_pesan FROM head_kamar LIMIT 5";
                $result = $koneksi->query($query);
                
                while($row = $result->fetch_array());
                $rows[] = $row;
                
                foreach($rows as $row){
                  if($row['no_pesan'] > 0){
                    echo '<img src="../img/twotada.png"/>';
                  }else{
                    echo '<img src="../img/twoada.png"/>';
                  }
                }
                ?>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>