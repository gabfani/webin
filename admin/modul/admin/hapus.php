<?php
include "sesi_admin.php";
if(isset($_GET['id_admin'])){
    include "../koneksi.php";
    $id = $_GET['id_admin'];
    $sql = "SELECT * FROM tb_admin WHERE id_admin='$id'";
    $hapus = mysqli_query($koneksi, $sql);
    
    if(mysqli_num_rows($hapus) > 0) {
        $r = mysqli_fetch_array($hapus);
        
        // Check if photo exists before trying to delete it
        if(!empty($r['foto'])) {
            $foto = $r['foto'];
            $file_path = "../images/admin/$foto";
            
            // Verify file exists before attempting to delete
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        $sql1 = "DELETE FROM tb_admin WHERE id_admin='$id'";
        $hapus1 = mysqli_query($koneksi, $sql1);
        
        if($hapus1){
            header("Location: ?m=admin");
            exit(); // Always exit after header redirect
        } else {
            echo 'Data Admin GAGAL di Hapus';
            echo '<a href="index.php">Kembali</a>';
        }
    } else {
        echo 'Data Admin tidak ditemukan';
        echo '<a href="index.php">Kembali</a>';
    }
}
?>