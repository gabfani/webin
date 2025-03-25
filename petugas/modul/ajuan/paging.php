<?php 
include '../koneksi.php';

// Pagination settings
$batas = 25;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

// Sorting parameters
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'no_ajuan';
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

// Main query with count for pagination
$query_count = "SELECT COUNT(DISTINCT a.no_ajuan) as total FROM tb_ajuan a";
$result_count = mysqli_query($koneksi, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$jumlah_data = $row_count['total'];
$total_halaman = ceil($jumlah_data / $batas);

// Data query
$query = "SELECT a.no_ajuan, a.tanggal, a.kode_brg, a.nama_brg, 
                 a.jml_ajuan, SUM(b.jml_keluar) as total_keluar,
                 a.petugas, a.val
          FROM tb_ajuan a
          LEFT JOIN tb_barang_out b ON a.no_ajuan = b.no_ajuan
          GROUP BY a.no_ajuan
          ORDER BY $sort_column $sort_order
          LIMIT $halaman_awal, $batas";

$data_brg_in = mysqli_query($koneksi, $query);
$nomor = $halaman_awal+1;

// Display data
while ($row = mysqli_fetch_array($data_brg_in)) {
    $status = '';
    $badge_class = '';
    
    if ($row['total_keluar'] === null) {
        $status = 'Belum diproses';
        $badge_class = 'badge-secondary';
    } elseif ($row['total_keluar'] == $row['jml_ajuan']) {
        $status = 'Sesuai permintaan';
        $badge_class = 'badge-success';
    } elseif ($row['total_keluar'] < $row['jml_ajuan']) {
        $status = 'Proses (Tidak lengkap)';
        $badge_class = 'badge-warning';
    } else {
        $status = 'Melebihi permintaan';
        $badge_class = 'badge-danger';
    }
?>
<tr>
    <td>AJ0<?php echo $row['no_ajuan']; ?></td>
    <td><?php echo $row['tanggal']; ?></td>
    <td><?php echo $row['kode_brg']; ?></td>
    <td><?php echo $row['nama_brg']; ?></td>
    <td><?php echo $row['jml_ajuan']; ?></td>
    <td><?php echo ($row['total_keluar'] !== null) ? $row['total_keluar'] : '0'; ?></td>
    <td><?php echo $row['petugas']; ?></td>
    <td>
        <span class="badge badge-pill <?php echo $badge_class; ?>"><?php echo $status; ?></span>
    </td>
    <td>
        <a href="index.php?m=ajuan&s=hapus&no_ajuan=<?php echo $row['no_ajuan'];?>" onclick="return confirm('Yakin Akan dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php } ?>