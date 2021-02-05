<form action="ubah_proses.php" method="post">
    <div class="form-group mt-2">
        <label for="nom_laba">Laba</label>
        <input required maxlength="20" type="number" name="nom_laba" id="nom_laba" class="form-control mt-1"
            aria-describedby="helpId" value="<?= $data['laba'] ?>">
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered" style="min-width: 500px;">
            <thead>
                <th class="" style="width: 250px;">Nama alokasi</th>
                <th class="" style="width: 100px;">Persen</th>
                <th class="" style="width: 200px;">Hasil</th>
                <th class="" style="width: 30px;">Aksi</th>
            </thead>
            <tbody>
                <?php 
                                    $lihat2 = mysqli_query($conn, "SELECT * FROM hitung");
                                    while ($data = mysqli_fetch_array($lihat2)) {
                                    ?>
                <tr>
                    <td><input maxlength="20" type="text" name="nama" value="<?= $data['nama_alokasi'] ?>"
                            class="form-control border-0">
                    </td>
                    <td>
                        <div class="input-group">
                            <input maxlength="20" type="text" name="persen" value="<?= $data['persen'] ?>"
                                class="form-control border-0 shadow-none">
                            <span class="mt-2">%</span>
                            <!-- <span class="border-0 form-control">%</span> -->
                        </div>
                    </td>
                    <td>
                        <div class="form-control border-0">Rp. <?= $data['hasil'] ?></div>
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="ubah.php?id=<?= $data['id'] ?>&laba=<?= $_GET['nom_laba'] ?>"
                            class="btn btn-success form-control me-1">Ubah</a>
                        <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger form-control">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>
                        <div class="form-control border-0">Total</div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="form-control border-0"><?= $totalpersen ?></div>
                            <span class="mt-2">%</span>
                        </div>
                    </td>
                    <td>
                        <div class="form-control border-0"><?= $totalhasil ?></div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>




</form>