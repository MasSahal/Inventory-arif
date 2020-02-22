<?php
$id = $_GET['id'];
$delete = $koneksi->query("DELETE FROM tb_produk WHERE id_produk='$id'");
    
    if ($delete == 'success') {
            echo "<script>alert('Berhasil');</script>";
            echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=list_produk'>";
        }else{
            echo "<script>alert('Gagal');</script>";
            echo "<meta http-equiv='refresh' content='0.1;url=index.php?page=list_produk'>";
        }
?>