<?php
require 'conn.php';
function persen($a,$b=100){
    return $a/$b;
};
function kali($a,$b){
    return $a*$b;
};

$id = $_GET['id'];

$laba = $_POST['nom_laba'];

$nama = $_POST['nama'];
$persen = $_POST['persen'];
$hasilpersen = persen($persen);
$hasil = kali($laba,$hasilpersen);

$sql = mysqli_query($conn, "UPDATE hitung SET laba='$laba', nama_alokasi='$nama', persen='$persen', hasil='$hasil' WHERE id='$id' ");
$cek = mysqli_num_rows($sql);

if ($cek>0) {
    $status = "1";
} else {
    $status = "2";
}

echo "<script>window.location.href='index.php?s=$status';</script>";