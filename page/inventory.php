<div class="card bg-light p-4 shadow border-light">
    <h3 class="text-center pt-2">Input Produk</h3>
    <div class="row p-2">
        <div class="col m-auto justify-content-center">
            <div class="form pb-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="text-dark">Nama Produk</label>
                        <input type="text" name="nama" id="nama" required class="form-control" placeholder="Nama" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="harga" class="text-dark">Harga Produk</label>
                        <input type="number" min="1" name="harga" id="harga" required class="form-control" placeholder="Rp ..." aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="text-dark">Jumlah Produk</label>
                        <input type="number" min="1" class="form-control" required name="jumlah" id="jumlah" placeholder="Qty">
                    </div>
                    <div class="form-group">
                        <label for="detail" class="text-dark">Detail Produk</label>
                        <textarea name="detail" required id="detail" rows="3" class="form-control" placeholder="Ketikan sesuatu.." aria-describedby="helpId"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="text-dark">Foto Produk</label><br>
                        <input type="file" required name="foto" id="foto">
                    </div>
                    <div class="mt-4 float-right">
                        <input type="reset" class="btn btn-primary" name="reset" value="Reset">
                        <input type="submit" class="btn btn-success" name="tambah_produk" value="Simpan">
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card bg-light p-4 shadow border-light mt-5">
    <h3 class="text-center py-2">Daftar Produk</h3>

    <div class=" table table-responsive">
        <table class="table table-bordered table-hover table-striped dataTable" id="myTable">
            <thead>
                <tr class="bg-info text-light">
                    <th>Id produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sql = $koneksi->query("SELECT * FROM tb_produk");
                while ($data = $sql->fetch_array()) {
                ?>
                    <tr>
                        <td><?= $data['id_produk']; ?></td>
                        <td><?= $data['nama_produk']; ?></td>
                        <td>Rp. <?= number_format($data['harga_produk']); ?></td>
                        <td><?= $data['jumlah_produk']; ?></td>
                        <td><?= date('D, m Y', strtotime($data['tanggal_produk'])); ?></td>
                        <td>
                            <a href="?page=edit&id=<?= $data['id_produk']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="?page=hapus&id=<?= $data['id_produk']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php

if (isset($_POST['tambah_produk'])) {

    $id = time();
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $tgl = date('Y-m-d');
    echo$tgl;
    $detail = $_POST['detail'];

    //ambil nama foto
    $nama_foto = $_FILES['foto']['name'];
    echo$nama_foto;
    //ambil size foto
    $size_foto = $_FILES['foto']['size'];
    echo$size_foto;
    //ambil temporay foto
    $tmp_foto = $_FILES['foto']['tmp_name'];
    
    //jika file kurang dari 2048000 kilobytes atau 2mb
    if ($size_foto < 2048000) {
        move_uploaded_file($tmp_foto, "images/" . $nama_foto);

        $add = $koneksi->query("INSERT INTO tb_produk (id_produk, nama_produk, harga_produk, jumlah_produk, tanggal_produk, foto_produk, detail_produk) VALUES ('$id','$nama','$harga','$jumlah','$tgl','$nama_foto','$detail')");

        if ($add == 'success') {
                echo "<script>alert('Behasil');</script>";
                echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=invetory'>";
            } else {
                echo "<script>alert('gagal');</script>";
                echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=invetory'>";
            }
    }
    
    
}
// ?>