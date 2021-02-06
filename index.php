<?php 
require 'conn.php';






$lihat = mysqli_query($conn, "SELECT * FROM hitung");
$data = mysqli_fetch_array($lihat);
$totalpersen = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(persen) FROM hitung"))[0];
$totalhasil = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(hasil) FROM hitung"))[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Alokasi Laba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card shadow border-0">
                    <div class="card-header d-flex justify-content-between">
                        <b>Kalkulator Alokasi Laba</b>
                        <a href="index.php" class="btn btn-warning text-white">Refresh</i></a>
                    </div>
                    <div class="card-body">
                        <?php
                    if(!empty($_GET['s'])){
                        if($_GET['s'] == "1"){
                    ?>
                        <div class="alert alert-success">
                            <strong>Berhasil</strong> data berhasil diedit
                        </div>
                        <?php
                        }else if($_GET['s'] == "2"){
                    ?>
                        <div class="alert alert-danger">
                            <strong>Maaf !</strong> data gagal diedit
                        </div>
                        <?php
                        }
                    }
                    ?>

                        <?php 
                    if (!empty($_GET['h'])) {
                        if ($_GET['h'] == 'ubah') {
                            include 'ubah.php';
                        }
                    } else {
                        include 'data.php';
                    }
                    ?>

                        <button type="submit" class="btn btn-primary form-control mt-3 mb-2" name="tambah">Tambah
                            alokasi</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- bs -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
        </script>
</body>

</html>