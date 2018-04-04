<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/styles1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../DataTables/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script type="text/javascript" src ="../DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src ="../DataTables/js/dataTables.bootstrap4.min.js"></script>

    <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
    </style>
    <title>Cek Booking</title>

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
      <h2 class="form-menu-heading" align="center">Data Pendaftaran</h2>
        <hr>
        <div class="container">
        <div class="row text-center">
        <?php
        include '../config.php';
          $sql = 'SELECT no_pesan, kamar, nama, no_id FROM pendaftaran';
          $query = mysqli_query($koneksi,$sql);

          if(!$query){
            die('SQL Error: ' .mysqli_error($koneksi));
          }
          echo '<table class="table table-striped table-bordered" id="tabeldata" class="display" cellspacing="0" width="100%"">
            <thead>
              <tr>
                <th>No Pesanan</th>
                <th>Kamar</th>
                <th>Nama</th>
                <th>No Identitas</th>
              </tr>
            </thead>
            <tbody>';
            while($row = mysqli_fetch_array($query)){
              echo '<tr>
                      <td>'.$row['no_pesan'].'</td>
                      <td>'.$row['kamar'].'</td>
                      <td>'.$row['nama'].'</td>
                      <td>'.$row['no_id'].'</td>
                    </tr>';
            }
            echo '
            </tbody>
          </table>';

          mysqli_free_result($query);
          mysqli_close($koneksi);
          ?>
        </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
      $(document).ready(function()
      {
      $('#tabeldata').DataTable();
      });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>