<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi.php ada

$user = $_POST['user'];
$pass = md5($_POST['pass']); // Enkripsi password dengan MD5

// Cek di tabel admin terlebih dahulu
$sql_admin = "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'";
$login_admin = mysqli_query($koneksi, $sql_admin);
$ketemu_admin = mysqli_num_rows($login_admin);

if ($ketemu_admin > 0) {
    // Jika ditemukan di tabel admin
    $b = mysqli_fetch_array($login_admin);

    // Set session untuk admin
	$_SESSION['idinv'] = $b['id_admin'];
	$_SESSION['userinv'] = $b['username'];
	$_SESSION['passinv'] = $b['password'];
	$_SESSION['namainv'] = $b['nama'];
	$_SESSION['teleponinv'] = $b['telepon'];
	$_SESSION['fotoinv'] = $b['foto'];


    header("location: admin/index.php"); // Redirect ke halaman admin
    exit();
}

// Jika tidak ditemukan di tabel admin, cek di tabel petugas
$sql_petugas = "SELECT * FROM tb_petugas WHERE username = '$user' AND password = '$pass'";
$login_petugas = mysqli_query($koneksi, $sql_petugas);
$ketemu_petugas = mysqli_num_rows($login_petugas);

if ($ketemu_petugas > 0) {
    // Jika ditemukan di tabel petugas
    $b = mysqli_fetch_array($login_petugas);

    // Set session untuk petugas
	$_SESSION['idinv2'] = $b['id_petugas'];
	$_SESSION['userinv2'] = $b['username'];
	$_SESSION['passinv2'] = $b['password'];
	$_SESSION['namainv2'] = $b['nama'];
	$_SESSION['teleponinv2'] = $b['telepon'];


    header("location: petugas/index.php"); // Redirect ke halaman petugas
    exit();
}

// Jika tidak ditemukan di kedua tabel
echo '<script language="javascript">';
echo 'alert("Username/Password salah, atau akun Anda belum aktif.")';
echo '</script>';
header("refresh:1; url=index.php"); // Kembali ke halaman login setelah 1 detik
?>