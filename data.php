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

if (isset($_POST['tambah'])) {
    function persen($a,$b=100){
        return $a/$b;
    };
    function kali($a,$b){
        return $a*$b;
    };

    $ceklaba = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_laba"));
    $labaaa = $ceklaba['nom_laba'];
    $tambah_nama = $_POST['tambah_nama'];
    $tambah_persen = $_POST['tambah_persen'];
    $persenn = persen($tambah_persen);
    $hasill = kali($labaaa,$persenn);

    $sql_tambah = mysqli_query($conn, "INSERT INTO `hitung` (`id`, `id_laba`, `nama_alokasi`, `persen`, `hasil`) VALUES (NULL, '1', '$tambah_nama', '$tambah_persen', '$hasill')");
    if ($sql_tambah) {
        $status = "1";
    } else {
        $status = "2";
    }
    echo "<script>window.location.href='index.php?&t=$status';</script>";


}

?>
<?php
    if(!empty($_GET['l'])){
        if($_GET['l'] == "1"){
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> Laba berhasil diubah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }else if($_GET['l'] == "2"){
        ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf !</strong> Laba gagal diubah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
        }
    }
    ?>

<?php
    if(!empty($_GET['t'])){
        if($_GET['t'] == "1"){
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> Alokasi berhasil ditambah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }else if($_GET['t'] == "2"){
        ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf !</strong> Alokasi gagal ditambah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
        }
    }
    ?>

<?php
                    if(!empty($_GET['s'])){
                        if($_GET['s'] == "1"){
                    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> data alokasi berhasil diubah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                        }else if($_GET['s'] == "2"){
                    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf !</strong> data alokasi gagal diubah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                        }
                    }
                    ?>


<?php
    if(!empty($_GET['d'])){
        if($_GET['d'] == "1"){
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> Alokasi berhasil dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }else if($_GET['d'] == "2"){
        ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf !</strong> Alokasi gagal dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <input required maxlength="20" type="text" name="nom_laba" id="nom_laba" class="form-control shadow-none"
                aria-describedby="helpId" value="<?= $datalaba['nom_laba'] ?>">
            <button type="submit" class="btn btn-primary form-control" name="ubah">Ubah laba</button>
        </div>
    </div>

</form>

<hr>
<div class="table-responsive">
    <table class="table table-bordered" style="min-width: 600px;">
        <thead>
            <th style="width: 10px;">
                <div class="border-0 form-control fw-bold">No.</div>
            </th>
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
                $cek = mysqli_query($conn, "SELECT h.*, l.* FROM hitung h INNER JOIN tb_laba l ON h.id_laba = l.id_laba");
                $no=1;
                while ($data = mysqli_fetch_array($cek)) 
                {
                ?>
            <tr>
                <td class="text-center">
                    <?= $no++ ?>
                </td>
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
                    <!-- <a href="index.php?h=ubah&id=<?= $data['id'] ?>&nom_laba=<?= $data['nom_laba'] ?>" class="">Ubah</a> -->
                    <a href="#" type="button" class="btn btn-warning text-white me-1 shadow-none" data-bs-toggle="modal"
                        data-bs-target="#myModal<?=$data['id'];?>">
                        Ubah
                    </a>
                    <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <!--  -->
            <div class="modal fade" id="myModal<?=$data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah data Alokasi laba</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="ubah_proses.php?id=<?=$data['id'];?>&nom_laba=<?= $data['nom_laba'] ?>"
                                method="post">
                                <?php
                                $linkd = $data['id'];
                                $cekubah = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM hitung where id='$linkd' "));
                                ?>
                                <div class="form-group mt-2">
                                    <label for="ubah_nama_alokasi">Nama Alokasi</label>
                                    <input type="text" name="ubah_nama_alokasi" id="ubah_nama_alokasi"
                                        value="<?=$cekubah['nama_alokasi'];?>" class="form-control mt-1"
                                        aria-describedby="helpId">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="ubah_persen_alokasi">Persen</label>
                                    <input type="text" name="ubah_persen_alokasi" id="ubah_persen_alokasi"
                                        value="<?=$cekubah['persen'];?>" class="form-control mt-1"
                                        aria-describedby="helpId">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                            <button type="submit" class="btn btn-warning" name="ubah_alokasi">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <?php } ?>

            <form action="" method="post">
                <tr>
                    <th></th>
                    <td>
                        <input required type="text" name="tambah_nama" placeholder="Alokasi baru"
                            class="border-0 form-control shadow-none">
                    </td>
                    <td>
                        <div class="input-group">
                            <input required type="text" name="tambah_persen" placeholder="0"
                                class="border-0 shadow-none form-control">
                            <span class="my-2 me-2">%</span>
                        </div>
                    </td>
                    <td>
                        <div class="border-0 form-control">

                        </div>
                    </td>
                    <td class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah
                            alokasi</button>
                    </td>
                </tr>
            </form>
            <tr>
                <td colspan="2">
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