<?php 
  
  include '../koneksi.php';

if ( !isset($_SESSION["idinv2"])) {
  header("Location: login_petugas.php");
  exit();
}


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
          $id = $_SESSION['idinv2'];
           include '../koneksi.php';
           $sql = "SELECT * FROM tb_petugas WHERE id_petugas = '$id'";
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
          
                            <li>
                <a href="?m=ajuan&s=awal">
                  <i class="fa fa-gift"></i> Data Ajuan
                </a>
              </li>
              <li>
                <a href="logout.php" onclick="return confirm('yakin ingin logout?');">
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
            <h1 class="page-header">Selamat Datang,<span class="nama-user"> <?php echo $r['nama']; ?></h1>
          </div>
        </div>

        <div class="row">
                        
               
              
                                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT count(id_brg_in) as jbrg_in FROM tb_barang_in";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jbrg_in']."</h3>";
                                ?>
                                    <div>Jumlah Barang Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=barangMasuk&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT count(no_ajuan) as jajuan FROM tb_ajuan";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jajuan']."</h3>";
                                ?>
                                    <div>Jumlah Ajuan</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=ajuan&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?php
                                include_once "../koneksi.php";
                                $sql="SELECT sum(jml_keluar) as jkeluar FROM tb_barang_out";
                                //$sql="SELECT count(jml_keluar) as jkeluar FROM tb_barang_out";
                                $query=mysqli_query($koneksi,$sql);
                                $r=mysqli_fetch_assoc($query);
                                echo "<h3>".$r['jkeluar']."</h3>";
                                ?>
                                    <div>Jumlah Barang Ajuan Yang Disetujui</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="?m=ajuan&s=awal">View Details</a></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
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
