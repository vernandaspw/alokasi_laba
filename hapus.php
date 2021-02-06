<?php
require 'conn.php';

$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM hitung where id='$id'");
if ($sql) {
    $status = "1";
} else {
    $status = "2";
}
echo "<script>window.location.href='index.php?&d=$status';</script>";