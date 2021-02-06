<?php
require 'conn.php';
function persen($a,$b=100){
    return $a/$b;
};
function kali($a,$b){
    return $a*$b;
};


$laba = $_GET['nom_laba'];
$id = $_GET['id'];

$nama = $_POST['ubah_nama_alokasi'];
$persen = $_POST['ubah_persen_alokasi'];

$hasilpersen = persen($persen);
$hasil = kali($laba,$hasilpersen);

$sql = mysqli_query($conn, "UPDATE hitung SET nama_alokasi='$nama', persen='$persen', hasil='$hasil' WHERE id='$id' ");

if ($sql) {
    $status = "1";
} else {
    $status = "2";
}

echo "<script>window.location.href='index.php?s=$status';</script>";