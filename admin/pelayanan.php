 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pelayanan | esemka-his</title>
  	<link rel="stylesheet" href="style.css">
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

				<marquee>Selamat Datang Di Halaman Pelayanan Aplikasi Rumah Sakit Sederhana Esemka-His Berbasis Web</marquee>

				</div>
			</nav>
			<div id="page-wrapper" >
			<div style="padding: 15px 20px;background-color: #fbf9f9; min-height: 500px; margin-right: 15px; margin-left: 5px; margin-bottom: 0px;" >
            <div id="page-inner">
	<div class="row" >
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
			Antrian Pendaftaran   </div>
            <div class="panel-body"><!--Panel Form pencarian -->
				<div class="panel-body" >
				<form class="form-inline" >
					<div class="form-group">
					<select class="form-control" id="Kolom" name="Kolom" required="">
						<?php
						$kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
						?>
						<option value="nama_pasien" <?php if ($kolom=="nama_pasien") echo "selected"; ?>>Nama Pasien</option>
						<option value="nama_dokter" <?php if ($kolom=="nama_dokter") echo "selected";?>>Nama Dokter</option>
					</select>
					</div>
					<div class="form-group">
					<input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
					</div>
					<button type="submit" class="btn btn-primary">Cari</button>
					<a href="pelayanan.php" class="btn btn-danger">Reset</a>
							<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="fas fa-diagnoses"></i> Layani</button>
				</form>	
				</div>
 			<!--/Panel Form pencarian -->
</br>


								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
							<tr>
								<th>Tgl Pelayanan</th>
								<th>Nama Dokter</th>
								<th>Nama Pasien</th>
								<th>Status</th>
								<th colspan="2">Opsi</th>
						</tr>
						</thead>
						<tbody>
							<?php
									// Include / load file koneksi.php
								include '../config.php';

								$page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
								
								$kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
								
								$kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

								// Jumlah data per halaman
								$limit = 5;

								$limitStart = ($page - 1) * $limit;
								
								//kondisi jika parameter pencarian kosong
								if($kolomCari=="" && $kolomKataKunci==""){
									$data = mysqli_query($koneksi,"SELECT * FROM pelayanan LIMIT ".$limitStart.",".$limit);								
								}else{
										//kondisi jika parameter kolom pencarian diisi
										$data = mysqli_query($koneksi, "SELECT * FROM pelayanan WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
									}
								
								$no = $limitStart + 1;
									// Buat query untuk menampilkan semua data pasien
									while($d = mysqli_fetch_array($data)){ 
								?>
								<tr>
									<td><?php echo $d["tgl_pelayanan"]; ?></td>
									<td><?php echo $d["id_dokter"]; ?></td>
									<td><?php echo $d["nama_pasien"]; ?></td>
									<td><?php echo $d["status"]; ?></td>
									<td><a href="edit_pelayanan.php?id=<?php echo $d['id_pelayanan']; ?>" class="btn btn-warning" ><i class="fas fa-edit"></i> Ubah</a></td>
									<td><a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus_pelayanan.php?id=<?php echo $d['id_pelayanan']; ?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i> Hapus</a>
								</tr>
								<?php
								}
								?>
							</tbody>
                            </div></div></div>
                        </div>
					</div>
				</div>
			</div>
</table>
<div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 5 of 5 entries</div></div><div class="col-sm-6">
		
		
<div align="right">
    <ul class="pagination">
      <?php
        // Jika page = 1, maka LinkPrev disable
        if($page == 1){ 
      ?>        
        <!-- link Previous Page disable --> 
        <li class="disabled"><a href="#">Previous</a></li>
      <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;  

          if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="pelayanan.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
       <?php     
          }else{
        ?> 
          <li><a href="pelayanan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
         <?php
           } 
        }
      ?>
	  <?php
	 		if($kolomCari=="" && $kolomKataKunci==""){
				$data = mysqli_query($koneksi,"SELECT * FROM pelayanan ");								
			}else{
					//kondisi jika parameter kolom pencarian diisi
					$data = mysqli_query($koneksi, "SELECT * FROM pelayanan WHERE $kolomCari LIKE '%$kolomKataKunci%'");
				} 

				
        $JumlahData = mysqli_num_rows($data);
        $jumlahPage = ceil($JumlahData / $limit); 
        $jumlahNumber = 1; 
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
		for($i = $startNumber; $i <= $endNumber; $i++){
			$linkActive = ($page == $i)? ' class="active"' : '';
  
			if($kolomCari=="" && $kolomKataKunci==""){
	  ?>
		          <li<?php echo $linkActive; ?>><a href="pelayanan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

				  <?php
        }else{
          ?>
          <li<?php echo $linkActive; ?>><a href="pelayanan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      }
      ?>

	  <!-- link Next Page -->
      <?php       
       if($page == $jumlahPage){ 
      ?>
        <li class="disabled"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
       if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="pelayanan.php?page=<?php echo $linkNext; ?>">Next</a></li>
       <?php     
          }else{
        ?> 
           <li><a href="pelayanan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
        }
      }
      ?>

		</div>
	</div>
	</ul>

		<!--script-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>



<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Layani Pasien</h4>
   </div>
   <div class="modal-body">
    <form method="post" action="tambah_pelayanan_aksi.php">
	 <label>Tanggal Pelayanan</label>
     <input type="date" name="tgl_pelayanan" id="tgl_pelayanan" class="form-control"  />
     <label>Nama Dokter</label>
     <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" value="<?php echo $d['nama_dokter']; ?>" />
     <label>Nama Pasien</label>
     <input type="text" name="nama_pasien" id="nama_pasien" class="form-control"/>
	 <label>Tinggi Badan</label>
     <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" />
     <label>Berat Badan</label>
     <input type="number" name="berat_badan" id="berat_badan" class="form-control"/>
	 <label>Suhu</label>
     <input type="number" name="suhu" id="suhu" class="form-control" />
     <label>Penyakit</label>
     <input type="text" name="penyakit" id="penyakit" class="form-control"/>
	 <label>Tindakan</label>
     <input type="text" name="tindakan" id="tindakan" class="form-control" />
     <label>Status</label>
	 <select name="status" id="status" class="form-control">
      <option value="Daftar">Daftar</option>  
      <option value="Pulang">Pulang</option>
     </select>
	 </br>
     <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-success" />
	 <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>

</div>