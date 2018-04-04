<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/styles1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Aplikasi Marketing</title>
  </head>
  <body>
    <!-- Header-->
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
    <form action="proses-tambah.php" method="POST" class="form-menu-heading">
      <div class="wrapper">
        <h2 class="form-menu-heading" align="center">Tersedia</h2><br/>
        <div class="form-group" name="booking" align="center">
        
        <?php
        include '../config.php';

        if(isset($_POST['daftar'])){
          $lantai = mysqli_real_escape_string($koneksi, $_POST['lantai']);
          $no_kamar = mysqli_real_escape_string($koneksi, $_POST['kamar']);
          $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
          $no_id = mysqli_real_escape_string($koneksi, $_POST['no_id']);

          $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pendaftaran WHERE kamar='$no_kamar'"));

          if($cek > 0){
            header('location: sudahada.php');
          }
        }
        ?>
        <input type="hidden" name="kamar" value="<?php echo $no_kamar;?>">
        <input type="hidden" name="nama" value="<?php echo $nama;?>">
        <input type="hidden" name="no_id" value="<?php echo $no_id;?>">
        <button type="submit" name="booking" class="btn btn-primary"><b>Booking</b></button>
        </div>
      </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>