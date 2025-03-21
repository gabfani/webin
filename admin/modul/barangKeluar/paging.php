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
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'no_brg_out'; // Default sorting by 'no_brg_out'
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'DESC'; // Default order 'DESC'

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : null;
$data = mysqli_query($koneksi, "SELECT * FROM tb_barang_out" . ($tanggal ? " WHERE tanggal_out = '$tanggal'" : ""));
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_brg_in = mysqli_query($koneksi, "SELECT * FROM tb_barang_out ORDER BY $sort_column $sort_order LIMIT $halaman_awal, $batas");

$nomor = $halaman_awal+1;

while ($row = mysqli_fetch_array($data_brg_in)) {
?>
<tr>
    <td><?php echo $row['no_brg_out']; ?></td>
    <td><?php echo $row['no_ajuan']; ?></td>
    <td><?php echo $row['tanggal_ajuan']; ?></td>
    <td><?php echo $row['tanggal_out']; ?></td>
    <td><?php echo $row['petugas']; ?></td>
    <td><?php echo $row['kode_brg']; ?></td>
    <td><?php echo $row['nama_brg']; ?></td>
    <td><?php echo $row['stok']; ?></td>
    <td><?php echo $row['jml_ajuan']; ?></td>
    <td><?php echo $row['jml_keluar']; ?></td>
    <td><?php echo $row['admin']; ?></td>
    <td><a href="index.php?m=barangKeluar&s=hapus&no_brg_out=<?php echo $row['no_brg_out'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a></td>
    <td><a href="index.php?m=barangKeluar&s=cetak&no_brg_out=<?php echo $row['no_brg_out'];?>"><button class="btn btn-primary">Cetak</button></a></td>
</tr>
<?php } ?>