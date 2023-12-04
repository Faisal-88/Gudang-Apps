<?php require_once 'koneksi.php'; ?>

<h2>Transaksi keluar</h2>
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    Advanced Tables
            <a href="index.php?halaman=tambah_transaksi_keluar" class="btn btn-success">Tambah transaksi keluar</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Stok masuk</th>
                        <th>tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $hasil = $koneksi->query("SELECT * FROM data_transaksi LEFT JOIN barang ON data_transaksi.id_nama_barang = barang.id_barang WHERE status_transaksi = 'keluar'") ?>
                    <?php while ($data = $hasil->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['qty_barang_transaksi']; ?></td>
                            <td><?php echo $data['tanggal_transaksi']; ?></td>
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