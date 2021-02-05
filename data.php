<?php 
if (isset($_POST['ubah'])) {
    $nom_laba = $_POST['nom_laba'];
    $sql_laba = mysqli_query($conn, "UPDATE tb_laba SET nom_laba='$nom_laba' WHERE id_laba=1 ");
    
    if ($sql_laba) {
        $status = "1";
    } else {
        $status = "2";
    }
    echo "<script>window.location.href='index.php?&l=$status';</script>";
}
?>
<?php
                    if(!empty($_GET['l'])){
                        if($_GET['l'] == "1"){
                    ?>
<div class="alert alert-success">
    <strong>Berhasil</strong> Laba berhasil diubah
</div>
<?php
                        }else if($_GET['l'] == "2"){
                    ?>
<div class="alert alert-danger">
    <strong>Maaf !</strong> Laba gagal diubah
</div>
<?php
                        }
                    }
                    ?>

<?php 
$lihat = mysqli_query($conn, "select * from tb_laba where id_laba='1'");
$datalaba = mysqli_fetch_array($lihat);
?>
<form action="" method="post">
    <div class="form-group mt-2">
        <label for="nom_laba">Laba</label>
        <div class="input-group mt-1">
            <input required maxlength="20" type="text" name="nom_laba" id="nom_laba" class="form-control"
                aria-describedby="helpId" value="<?= $datalaba['nom_laba'] ?>">
            <button type="submit" class="btn btn-primary form-control" name="ubah">Ubah laba</button>
        </div>
    </div>

</form>

<hr>
<div class="table-responsive">
    <table class="table table-bordered" style="min-width: 500px;">
        <thead>
            <th style="width: 250px;">
                <div class="border-0 form-control fw-bold">Nama alokasi</div>
            </th>
            <th style="width: 100px;">
                <div class="border-0 form-control fw-bold">Persen</div>
            </th>
            <th style="width: 200px;">
                <div class="border-0 form-control fw-bold">Hasil</div>
            </th>
            <th style="width: 30px;">
                <div class="border-0 form-control fw-bold">Aksi</div>
            </th>
        </thead>
        <tbody>
            <?php
                $lihat2 = mysqli_query($conn, "SELECT h.*, l.* FROM hitung h INNER JOIN tb_laba l ON h.id_laba = l.id_laba");
                while ($data = mysqli_fetch_array($lihat2)) {
                ?>
            <tr>
                <?php
            var_dump($data);
            ?>
                <td>
                    <div class="border-0 form-control"><?= $data['nama_alokasi'] ?></div>
                </td>
                <td>
                    <div class="border-0 form-control"><?= $data['persen'] ?> %</div>
                </td>
                <td>
                    <div class="border-0 form-control">Rp. <?= $data['hasil'] ?></div>
                </td>
                <td class="d-flex justify-content-center">
                    <a href="ubah.php?id=<?= $data['id'] ?>&laba=<?= $_GET['nom_laba'] ?>"
                        class="btn btn-success me-1">Ubah</a>
                    <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td>
                    <div class="form-control border-0 fw-bold">Total</div>
                </td>
                <td>
                    <div class="input-group">
                        <div class="form-control border-0 fw-bold"><?= $totalpersen ?> %</div>
                    </div>
                </td>
                <td>
                    <div class="form-control border-0 fw-bold">Rp. <?= $totalhasil ?></div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>