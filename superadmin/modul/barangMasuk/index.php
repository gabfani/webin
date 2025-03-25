<?php 
include 'sesi_admin.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/barangMasuk/title.php"; break;
	case 'simpan': include "modul/barangMasuk/simpan.php"; break;
	case 'hapus': include "modul/barangMasuk/hapus.php"; break;
	
}
 ?>