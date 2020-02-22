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
                    <th>gl Masuk</th>
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
        <span><a href="?page=inventory" class="btn btn-sm btn-success mt-2"><i class="fa fa-plus"></i> Tambah</a></span>
    </div>
</div>