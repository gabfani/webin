<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "inventory"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get parameters from request
$id = isset($_GET['no_brg_out']) ? $_GET['no_brg_out'] : null;
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal_out'] : null;

// Build the SQL query
$sql = "SELECT * FROM tb_barang_out WHERE 1=1"; // Base query

if ($id) {
    $sql .= " AND no_brg_out = '$id'";
}

if (!empty($tanggal)) { // Cek apakah tanggal ada dan tidak kosong
    $sql .= " AND tanggal_out = '$tanggal'";
}

// Execute the query
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
    die("Query error: " . $conn->error);
}

// Check if data is found
if ($result->num_rows > 0) {
    echo '<html><head><title>Cetak Data Barang Out</title></head><body>';
    echo '<p>Dicetak pada: ' . date('Y-m-d') . '</p>';

    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>
            <th>No Barang Out</th>
            <th>No Ajuan</th>
            <th>Tanggal Ajuan</th>
            <th>Tanggal Keluar</th>
            <th>Petugas</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Ajuan</th>
            <th>Jumlah Keluar</th>
            <th>Admin</th>
          </tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['no_brg_out'] . '</td>
                <td>' . $row['no_ajuan'] . '</td>
                <td>' . $row['tanggal_ajuan'] . '</td>
                <td>' . $row['tanggal_out'] . '</td>
                <td>' . $row['petugas'] . '</td>
                <td>' . $row['kode_brg'] . '</td>
                <td>' . $row['nama_brg'] . '</td>
                <td>' . $row['jml_ajuan'] . '</td>
                <td>' . $row['jml_keluar'] . '</td>
                <td>' . $row['admin'] . '</td>
              </tr>';
    }
    echo '</table>';
    echo '<script>window.print();</script>';
    echo '</body></html>';
} else {
    echo "No records found.";
    if ($id) {
        echo " for ID: $id";
    }
    if ($tanggal) {
        echo " and Tanggal: $tanggal";
    }
}

// Close connection
$conn->close();
?>
