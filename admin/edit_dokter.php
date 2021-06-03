<html>
  <head>
    <title>Aplikasi Rumah Sakit</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <!--link bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--/link bootstrap-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

  </head>
  <body>		
    <div class="wrapper">
      <nav id="sidebar">
        <div class="sidebar-header">
          <a href="index.php"><h3>Esemka-His</h3>
          <strong>EH</strong>
          </a>
        </div>
        <ul class="list-unstyled components">
          <li>
            <a href="index.php">
              <i class="fas fa-home"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a href="pendaftaran.php">
              <i class="fas fa-american-sign-language-interpreting"></i>
              Pendaftaran
            </a>
          </li>
          <li>
            <a href="pelayanan.php">
              <i class="fas fa-diagnoses"></i>
              Pelayanan
            </a>
          </li>
          <li>
            <a href="dokter.php">
              <i class="fas fa-briefcase"></i>
              Pengaturan
            </a>
          </li>
        </ul>
        <button type="button" id="sidebarCollapse" class="btn btn-default">
            <i class="fas fa-angle-double-right"></i>
        </button>
      </nav>	

        <div id="content">
          <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">

                <marquee>Selamat Datang Di Halaman Dokter Aplikasi Rumah Sakit Sederhana Esemka-His Berbasis Web</marquee>

              </div>
          </nav>
          <div class="page-wrapper" >
		  <div style="padding: 15px 20px;background-color: #fbf9f9; min-height: 500px; margin-right: 15px; margin-left: 5px; margin-bottom: 0px;" >

              <div id="page-inner">
              

                          <!-- Form Elements -->
                        <div class="panel panel-success">
                          <div class="panel-heading">Ubah Data Pasien </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <?php
                                    // Load file config.php
                                    include "../config.php";
                                    // Ambil data ID yang dikirim oleh index.php melalui URL
                                    $id = $_GET['id'];
                                    // Query untuk menampilkan data dokter berdasarkan ID yang dikirim
                                    $sql = mysqli_query  ($koneksi,"SELECT * FROM dokter WHERE id_dokter='$id'");
                                    $data = mysqli_fetch_array($sql)
                                  ?>
                                  <form method="post" action="update_dokter.php?id=<?php echo $id; ?>">
                                      <div class="form-group">
                                          <label>Nama Dokter</label>
                                          <input class="form-control" type="text" name="nama_dokter" value="<?php echo $data['nama_dokter']; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Nama Poli</label>
                                          <input class="form-control" type="text" name="nama_poli" value="<?php echo $data['nama_poli']; ?>">
                                      </div>
                                      <div align="right" >
                                      <input type="submit" name="Ubah" id="simpan" value="Simpan" class="btn btn-success" />
                                      <a href="dokter.php"><input type="button" value="Batal" class="btn btn-danger"></a>

                                      </div>
                                  </form>
                                </div>
                            </div>
                          </div>
                        </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>

