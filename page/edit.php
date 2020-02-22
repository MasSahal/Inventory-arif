<?php

$id = $_GET['id'];

//ambil data sesuai id
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id'");

//pecah data menjadi array
$data = $ambil->fetch_assoc();
?>


<div class="card bg-light p-4 shadow border-light">
    <h3 class="text-center pt-2">Edit Produk</h3>
    <div class="row p-2">
        <div class="col m-auto justify-content-center">
            <div class="form pb-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="text-dark">Nama Produk</label>
                        <input type="text" name="nama" id="nama" required class="form-control" placeholder="Nama" aria-describedby="helpId" value="<?=$data['nama_produk'];?>">
                    </div>
                    <div class="form-group">
                        <label for="harga" class="text-dark">Harga Produk</label>
                        <input type="number" min="1" name="harga" id="harga" required class="form-control" placeholder="Rp ..." aria-describedby="helpId" value="<?=$data['harga_produk'];?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="text-dark">Jumlah Produk</label>
                        <input type="number" min="1" class="form-control" required name="jumlah" id="jumlah" placeholder="Qty" readonly value="<?=$data['jumlah_produk'];?>">
                    </div>
                    <div class="form-group">
                        <label for="detail" class="text-dark">Detail Produk</label>
                        <textarea name="detail" required id="detail" rows="3" class="form-control" placeholder="Ketikan sesuatu.." aria-describedby="helpId"><?=$data['detail_produk'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="text-dark">Foto Produk</label><br>
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div class="mt-4 float-right">
                        <a href="?page=inventory" class="btn btn-secondary">Kembali</a>
                        <input type="submit" class="btn btn-success" name="ubah_produk" value="Simpan">
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah_produk'])) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];

    $sql = "UPDATE tb_produk SET nama_produk='$nama', harga_produk='$harga', detail_produk='$detail' WHERE id_produk='$id'";
    $ubah = $koneksi->query($sql);

    if ($ubah) {
        echo "<script>alert('Behasil');</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=list_produk'>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=list_produk'>";
    }
}