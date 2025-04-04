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
    <title>Input Data Barang Masuk</title>

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
                  <form class="" action="logout.php" onclick="return confirm('yakin ingin logout?');" method="post">
                    <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Logout</button>
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
              <li>
                <a href="?m=admin&s=awal">
                  <i class="fa fa-user"></i> Data Admin
                </a>
                <li>
                <a href="?m=petugas&s=awal">
                  <i class="fa fa-users"></i> Data Petugas
                </a>
              </li>
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
            <h1 class="page-header">Data Barang Masuk</h1>
          </div>
        </div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Tambah data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah barang masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?m=barangMasuk&s=simpan" method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label for="exampleInputEmail1">Tanggal</label>
    <input type="text" class="form-control" value="<?php echo $tanggalSekarang; ?>" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" readonly="" placeholder="Masukkan Tanggal">
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">No. Invoice</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="noinv" aria-describedby="emailHelp" placeholder="Masukkan Nomor Invoice">

  </div>

          <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    
    <?php 
            include ("../koneksi.php");
            $supp = ("SELECT * FROM tb_barang");
            $result = mysqli_query($koneksi, $supp);

            $jsArray = "var prdName = new Array();";

            echo '<select name="kode_brg" onchange="changeValue(this.value)">';
            echo '<option>--- PILIH ---</option>';

            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'. $row['nama_brg'] .'">'.$row['nama_brg'].'</option>';
              $jsArray .= "prdName['". $row['nama_brg'] ."'] 
              = {kode_brg:'". addslashes($row['kode_brg']) ."',
                stok:'". addslashes($row['stok']) ."', supplier:'". addslashes($row['supplier']) ."'
              };";
            }


            echo '</select>';
          ?>
          <script type="text/javascript">
            <?php echo $jsArray; ?>
            function changeValue(id){
              
              document.getElementById('prd_kodebrng').value = prdName[id].kode_brg;
              document.getElementById('prd_stk').value = prdName[id].stok;
               document.getElementById('prd_sup').value = prdName[id].supplier;
            }
          </script>
          
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Kode Barang</label>
    <input type="text" name="kode_brg" readonly="" id="prd_kodebrng" class="form-control">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Supplier</label>
    <input type="text" name="supplier" readonly="" id="prd_sup" class="form-control">

  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Stok</label>
    <input type="text" class="form-control" id="prd_stk" readonly="" name="stok" aria-describedby="emailHelp">

  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Jumlah Masuk</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jml_masuk" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Masuk">
   
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Jam</label>
    <input type="text" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $jamSekarang; ?>" name="jam" aria-describedby="emailHelp" placeholder="Masukkan Jam">
    
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Admin</label>
    <input type="text" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $r['nama']; ?>" aria-describedby="emailHelp">
   
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

         <div class="row">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                
                                 <th>Id Barang Masuk</th>
                                 <th>Tanggal</th>
                                 <th>No Invoice</th>
                                 <th>Supplier</th>
                                 <th>Kode Barang</th>
                                 <th>Nama Barang</th>
                                 <th>Stok</th>
                                 <th>Jumlah Masuk</th>
                                 <th>Jam</th>
                                 <th>Petugas</th>

                                
                                
                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           <?php 
                                          
                                            include 'paging.php';

                                            ?>
                                        </tbody>
                                    </table>
                                    
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
