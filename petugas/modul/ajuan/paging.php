<head>
</head>
<?php 
include '../koneksi.php';

$batas = 25;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

// Parameter sorting
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'no_ajuan'; // Default sorting by 'no_ajuan'
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'DESC'; // Default order 'DESC'

$data = mysqli_query($koneksi, "SELECT * FROM tb_ajuan");
$jml_keluar_query = mysqli_query($koneksi, "SELECT a.*, b.jml_keluar 
                                FROM tb_ajuan a 
                                LEFT JOIN tb_barang_out b ON a.kode_brg = b.kode_brg");
$jml_keluar_data = [];
while ($row_keluar = mysqli_fetch_array($jml_keluar_query)) {
    $jml_keluar_data[$row_keluar['kode_brg']] = $row_keluar['jml_keluar'];
}
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_brg_in = mysqli_query($koneksi, "SELECT a.*, b.jml_keluar 
                                      FROM tb_ajuan a 
                                      LEFT JOIN tb_barang_out b ON a.kode_brg = b.kode_brg 
                                      ORDER BY $sort_column $sort_order 
                                      LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;

while ($row = mysqli_fetch_array($data_brg_in)) {
?>
<tr>
    <td><?php echo $row['no_ajuan']; ?></td>
    <td><?php echo $row['tanggal']; ?></td>
    <td><?php echo $row['kode_brg']; ?></td>
    <td><?php echo $row['nama_brg']; ?></td>
    <td><?php echo $row['jml_ajuan']; ?></td>
    <td><?php echo $row['jml_keluar']; ?></td>
    <td><?php echo $row['petugas']; ?></td>
    <td>
        <?php
        $jml_keluar = $row['jml_keluar'];
        if ($jml_keluar != $row['jml_ajuan']) {
        ?>
        <span class="badge badge-pill badge-success">Tidak sesuai permintaan</span>
        <?php
        } elseif ($row['val'] == 1) {
        ?>
        <span class="badge badge-pill badge-primary">Proses</span>
        <?php
        } else {
        ?>
        <span class="badge badge-pill badge-success">Stok Berhasil Dikeluarkan</span>
        <?php } ?>
    </td>
    <td><a href="index.php?m=ajuan&s=hapus&no_ajuan=<?php echo $row['no_ajuan'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a></td>
</tr>
<?php } ?>