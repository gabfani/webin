<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil tanggal A dan tanggal B dari parameter GET
$tanggalA = isset($_GET['tanggal_a']) ? $_GET['tanggal_a'] : '';
$tanggalB = isset($_GET['tanggal_b']) ? $_GET['tanggal_b'] : '';

if ($tanggalA == "" || $tanggalB == "") {
    die("<p style='color:red;'>Tanggal A dan Tanggal B tidak boleh kosong!</p>");
}

// Query untuk mengambil data berdasarkan rentang tanggal
$sql = "SELECT * FROM tb_barang_out WHERE tanggal_out BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $tanggalA, $tanggalB);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<html><head><title>Cetak Data Barang Out</title></head><body>';
    echo '<p>Dicetak pada: ' . date('Y-m-d') . '</p>';

    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>
            <th>No Ajuan</th>
            <th>Tanggal Ajuan</th>
            <th>Tanggal Keluar</th>
            <th>Petugas</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Ajuan</th>
            <th>Jumlah Keluar</th>

          </tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['no_ajuan'] . '</td>
                <td>' . $row['tanggal_ajuan'] . '</td>
                <td>' . $row['tanggal_out'] . '</td>
                <td>' . $row['petugas'] . '</td>
                <td>' . $row['kode_brg'] . '</td>
                <td><span style="color:red;">' . $row['nama_brg'] . '</span></td>
                <td>' . $row['jml_ajuan'] . '</td>
                <td><span style="color:red;">' . $row['jml_keluar'] . '</span></td>

              </tr>';
    }
    echo '</table>';
    echo '<script>window.print();</script>';
    echo '</body></html>';
} else {
    echo "<p style='color:red;'>Tidak ada data ditemukan untuk rentang tanggal: $tanggalA hingga $tanggalB</p>";
}

// Tutup koneksi database
$conn->close();
?>