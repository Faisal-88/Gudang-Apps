<?php require_once 'koneksi.php'; ?>

<h2>Data Barang</h2>
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    Advanced Tables
            <a href="index.php?halaman=tambah_barang" class="btn btn-success">Tambah Barang</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Stok</th>
                        <th>Ukuran</th>
                        <th>Satuan</th>
                        <th>Harga (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    $hasil = $koneksi->query("SELECT * FROM barang LEFT JOIN satuan_barang ON barang.id_satuan_barang = satuan_barang.id_satuan");
                    while ($data = $hasil->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['stok_barang']; ?></td>
                            <td><?php echo $data['ukuran_barang']; ?></td>
                            <td><?php echo $data['satuan_barang']; ?></td>
                            <td><?php echo $data['harga_barang']; ?></td>
                            <td>
                                <a href="index.php?halaman=editbarang&id=<?php echo $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?halaman=hapusbarang&id=<?php echo $data['id_barang'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
