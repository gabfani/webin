<?php 

date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
$jamSekarang = date("h:i a");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="..\images\logobtn.png">
    <meta name="author" content="">
    <title><?php echo $judul; ?></title>

  <!-- boootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

   <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

  <!-- icon dan fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- tema css -->
  <link href="../css/custom.css" rel="stylesheet">
  <link href="../css/tampilanadmin.css" rel="stylesheet">

</head>
<body>
  <!-- Menu -->
  <div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand">Inventory</a>
        </div>
        <?php 
        $id = $_SESSION['idinv'];
         include '../koneksi.php';
         $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
         $query = mysqli_query($koneksi, $sql);
          $r = mysqli_fetch_array($query);

         ?>
          <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           </i> <?php echo $r['nama']; ?>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
                <form class="" action="../index.php" method="post">
                  <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Keluar</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>

      <!-- menu samping -->
<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
                                      <li>
              <a href="?m=awal.php">
                <i class="fa fa-dashboard"></i> Beranda
              </a>
            </li>
            <!--<li>
              <a href="?m=admin&s=awal">
                <i class="fa fa-user"></i> Data Admin
              </a>
            </li>-->
             <li>
              <a href="?m=petugas&s=awal">
                <i class="fa fa-users"></i> Data Petugas
              </a>
            </li>
                          <li>
              <a href="?m=supplier&s=awal">
                <i class="fa fa-building"></i> Data Supplier
              </a>
            </li>
                          <li>
              <a href="?m=rak&s=awal">
                <i class="fa fa-cubes"></i> Data Rak
              </a>
            </li>
                          <li>
                <a href="?m=barang&s=awal">
                  <i class="fa fa-archive"></i> Data Barang
                </a>
              </li>
                            <li>
                <a href="?m=barangMasuk&s=awal">
                  <i class="fa fa-plus-square-o"></i> Data Barang Masuk
                </a>
              </li>

                          <li>
              <a href="?m=barangKeluar&s=awal">
                <i class="fa fa-cart-arrow-down"></i> Data Barang Keluar
              </a>
            </li>
            <li>
              <a href="logout.php" onclick="return confirm('yakin ingin logout?')">
                <i class="fa fa-warning"></i> Logout
              </a>
            </li>
            
          </ul>
        </div>
      </div>

    </nav>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Data Barang Keluar</h1>
        </div>
      </div>

      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Tambah data
</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dateInputModal">
  Cetak Tanggal
</button>

<script>
document.getElementById('cetakLink').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah link default
    var tanggal = document.getElementById('tanggalInput').value;
    if (tanggal) {
        window.location.href = "cetak.php?tanggal=" + tanggal;
    } else {
        alert("Pilih tanggal terlebih dahulu!");
    }
});
</script>


</button>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Ajuan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="?m=barangKeluar&s=simpan" method="POST" enctype="multipart/form-data">
          <div class="form-group">
  <!--<label for="exampleInputEmail1">No Barang Keluar</label>
  <input type="text"  class="form-control" id="exampleInputEmail1" name="no_brg_out" aria-describedby="emailHelp" placeholder="Masukkan Nomor Barang Keluar">
  <small id="emailHelp" class="form-text text-muted">Masukkan No Barang Keluar</small>-->
</div>
                <div class="form-group">
  <label for="exampleInputEmail1">Nomor Ajuan</label>
 <?php 
          include ("../koneksi.php");
          $supp = ("SELECT * FROM tb_ajuan WHERE val = '1' ");
          $result = mysqli_query($koneksi, $supp);

          $jsArray = "var prdName = new Array();";

          echo '<select name="no_ajuan" onchange="changeValue(this.value)">';
          echo '<option>--- PILIH ---</option>';

          while ($row = mysqli_fetch_array($result)) {
            
              echo '<option value="'. $row['no_ajuan'] .'">AJ0'.$row['no_ajuan'].'</option>';
              $jsArray .= "prdName['". $row['no_ajuan'] ."'] 
              = {tanggal_ajuan:'". addslashes($row['tanggal']) ."',
                petugas:'". addslashes($row['petugas']) ."',
                kode_brg:'". addslashes($row['kode_brg']) ."',
                nama_brg:'". addslashes($row['nama_brg']) ."',
                stok:'". addslashes($row['stok']) ."',
                jml_ajuan:'". addslashes($row['jml_ajuan']) ."',
                val:'". addslashes($row['val']) ."'

              };";
            }

          echo '</select>';
        ?>
        <script type="text/javascript">
          <?php echo $jsArray; ?>
          function changeValue(id){
  document.getElementById('prd_tanggal').value = prdName[id].tanggal_ajuan;
  document.getElementById('prd_petugas').value = prdName[id].petugas;
  document.getElementById('prd_kodebrng').value = prdName[id].kode_brg;
  document.getElementById('prd_namabrg').value = prdName[id].nama_brg;
  document.getElementById('prd_stokbrga').value = prdName[id].stok;
  document.getElementById('prd_jmlajuan').value = prdName[id].jml_ajuan;
  document.getElementById('prd_val').value = prdName[id].val;
  
  // Update max value for jml_keluar
  document.getElementById('jml_keluar').max = prdName[id].jml_ajuan;
}		
        </script>
</div>
      <div class="form-group">
  <label for="exampleInputEmail1">Tanggal Ajuan</label>
  <input type="text" readonly="" class="form-control" id="prd_tanggal" name="tanggal_ajuan" aria-describedby="emailHelp" placeholder="Tanggal Ajuan">
</div>
        <div class="form-group">
  <label for="exampleInputEmail1">Tanggal Keluar</label>
  <input type="text" class="form-control" id="exampleInputEmail1" name="tanggal_out" value="<?php echo $tanggalSekarang; ?>" aria-describedby="emailHelp" placeholder="Tanggal Keluar">
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Petugas</label>
  <input type="text" readonly="" class="form-control" id="prd_petugas" name="petugas" aria-describedby="emailHelp" placeholder="Petugas">

</div>
      
        <div class="form-group">
  <label for="exampleInputEmail1">Kode Barang</label>
      <input type="text" readonly="" class="form-control" id="prd_kodebrng" name="kode_brg" aria-describedby="emailHelp" placeholder="Kode Barang">

  
</div>
        <div class="form-group">
  <label for="exampleInputEmail1">Nama Barang</label>
  <input type="text" name="nama_brg" readonly="" id="prd_namabrg" class="form-control" placeholder="Nama Barang">

</div>
        <div class="form-group">
  <label for="exampleInputEmail1">Stok</label>
  <input type="text" class="form-control" id="prd_stokbrga" name="stok" readonly="" aria-describedby="emailHelp" placeholder="Stok">

</div>
        <div class="form-group">
  <label for="exampleInputEmail1">Jumlah Ajuan</label>
  <input type="text" class="form-control" readonly="" id="prd_jmlajuan" name="jml_ajuan" aria-describedby="emailHelp" placeholder="Jumlah Ajuan">

</div>
<div class="form-group">
  <label for="exampleInputEmail1">Jumlah Keluar</label>
  <input type="number" class="form-control" id="jml_keluar" name="jml_keluar" aria-describedby="emailHelp" 
         placeholder="Masukkan Jumlah Keluar" max="" oninput="validateJmlKeluar()">
</div>
        <div class="form-group">
  <label for="exampleInputEmail1">Admin</label>
  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $r['nama']; ?>" readonly="" name="admin" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin">
 
</div>
       


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
    </div>
      </form>
  </div>
</div>
</div>
<!-- Modal Cetak Berdasarkan Tanggal -->
<!-- Modal -->
<div class="modal fade" id="dateInputModal" tabindex="-1" role="dialog" aria-labelledby="dateInputModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cetak Berdasarkan Rentang Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form untuk mengirim tanggal ke cetakpdf.php -->
        <form id="cetakForm">
          <div class="form-group">
            <label for="inputTanggalA">Tanggal Awal</label>
            <input type="date" class="form-control" id="inputTanggalA" name="tanggal_a" required>
          </div>
          <div class="form-group">
            <label for="inputTanggalB">Tanggal Akhir</label>
            <input type="date" class="form-control" id="inputTanggalB" name="tanggal_b" required>
          </div>
          <button type="submit" class="btn btn-success" >Cetak</button>
        </form>
      </div>
      <div class="modal-footer">
        <div id="hasilCetak"></div> <!-- Tempat menampilkan data -->
      </div>
    </div>
  </div>
</div>

<!-- AJAX untuk menampilkan data dalam modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#cetakForm").submit(function(event) {
        event.preventDefault(); // Mencegah reload halaman

        // Ambil nilai tanggal A dan tanggal B
        let tanggalA = $("#inputTanggalA").val();
        let tanggalB = $("#inputTanggalB").val();

        if (tanggalA === "" || tanggalB === "") {
            alert("Tanggal A dan Tanggal B tidak boleh kosong!");
            return;
        }

        // Buka tab baru dengan URL cetakpdf.php dan kirim data tanggal
        let url = `modul/barangKeluar/cetakpdf.php?tanggal_a=${tanggalA}&tanggal_b=${tanggalB}`;
        window.open(url, '_blank');
    });
});
</script>
<script>
// Set max value when jml_ajuan changes
document.getElementById('prd_jmlajuan').addEventListener('change', function() {
  document.getElementById('jml_keluar').max = this.value;
});

// Validate input
function validateJmlKeluar() {
  var jmlAjuan = parseInt(document.getElementById('prd_jmlajuan').value);
  var jmlKeluar = parseInt(document.getElementById('jml_keluar').value);
  
  if (jmlKeluar > jmlAjuan) {
    alert('Jumlah keluar tidak boleh melebihi jumlah ajuan (' + jmlAjuan + ')');
    document.getElementById('jml_keluar').value = jmlAjuan;
  }
}
</script>
       <div class="row">

                              <div class="table-responsive table--no-card m-b-30">
                                  <table class="table table-borderless table-striped table-earning">
                                      <thead>
                                          <tr>
                               <th>No Barang Keluar</th>               
                               <th>No Ajuan</th>
                               <th>Tanggal Ajuan</th>
                               <th>Tanggal Keluar</th>
                               <th>Petugas</th>
                               <th>Kode Barang</th>
                               <th>Nama Barang</th>
                               <th>Stok</th>
                               <th>Jumlah Ajuan</th>
                                <th>Jumlah Keluar</th>
                               <th>Admin</th>
                              
                              

                              
                              
                              <th>Aksi</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                         
                                         <?php 
                                        
                                          include 'paging.php';

                                          ?>
                                      </tbody>
                                  </table>
                                  
                                  <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=barang&s=awal&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=barang&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=barang&s=awal&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
                                </div>
                          </div>


    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!--include-->
  <script src="../vendor/css/js/bootstrap.min.js"></script>

</body>
</html>
