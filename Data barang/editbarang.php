<?php
require_once 'koneksi.php';

// Ambil id_barang dari parameter URL
$id_barang = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0;

// Periksa apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses form pengeditan barang
    $nama_barang = $_POST['nama_barang'];
    $stok_barang = $_POST['stok_barang'];
    $ukuran_barang = $_POST['ukuran_barang'];
    $id_satuan = $_POST['id_satuan'];
    $harga_barang = $_POST['harga_barang'];


    // query UPDATE
    $query_update = "UPDATE barang SET
                        nama_barang = '$nama_barang',
                        stok_barang = '$stok_barang',
                        ukuran_barang = '$ukuran_barang',
                        id_satuan_barang = '$id_satuan',
                        harga_barang = '$harga_barang'
                    WHERE id_barang = '$id_barang'";

    $hasil_update = $koneksi->query($query_update);

    if ($hasil_update) {
        echo "<script>alert('Data barang berhasil diupdate')</script>";
        echo "<script>location='index.php?halaman=barang'</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data barang. Error: " . $koneksi->error . "')</script>";
    }
}

// Ambil data barang yang akan di-edit dari database
$query_select = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$hasil_select = $koneksi->query($query_select);
$data_barang = $hasil_select->fetch_assoc();
?>
    <h2>Edit barang</h2>
    <form method="post" action="">
        <div class="form-group">
        <label>Nama Barang:</label>
        <input class="form-control" type="text" name="nama_barang" value="<?php echo $data_barang['nama_barang']; ?>" required>
        </div>

        <div class="form-group">
        <label>Stok Barang</label>
        <input class="form-control" type="number" name="stok_barang" value="<?php echo $data_barang['stok_barang'];?>" required>
        </div>

        <div class="form-group">
        <label>Ukuran Barang</label>
        <input class="form-control" type="text" name="ukuran_barang" value="<?php echo $data_barang['ukuran_barang']; ?>" required>
        </div>

        <div class="form-group">
        <label>Harga Barang</label>
        <input class="form-control" type="text" name="harga_barang" value="<?php echo $data_barang['harga_barang']; ?>" required>
        </div>

        <div class="form-group">
        <label>Satuan</label>
        <select class="form-control" name="id_satuan">
            <?php
            $query_satuan = "SELECT * FROM satuan_barang";
            $hasil_satuan = $koneksi->query($query_satuan);

            while ($data_satuan = $hasil_satuan->fetch_assoc()) {
                $selected = ($data_satuan['id_satuan'] == $data_barang['id_satuan_barang']) ? 'selected' : '';
                echo "<option value='" . $data_satuan['id_satuan'] . "' $selected>" . $data_satuan['satuan_barang'] . "</option>";
            }
            ?>
        </select>
        </div>
        <button class="btn btn-warning" type="submit">Simpan Perubahan</button>
    </form>
