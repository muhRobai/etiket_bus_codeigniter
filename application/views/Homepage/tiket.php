<!DOCTYPE html>
<html>
<head>
	<title>ebus</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/css/nice.css">

	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/bootstrap.min.js"></script>

</head>
<body>
	<section id="beranda">
		<header class="header" id="header">
			<nav class="navbar navbar-top navbar-inverse">
				<div class="container">
		        	<div class="just">
		            	<div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		                    	<span class="sr-only">Toggle menu</span>
		                    	<span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		           			<a href="#home" class="navbar-brand"><i class="fa fa-map-marker" aria-hidden="true"></i> EBUS</a>
		                </div>
		       
		                <div class="collapse navbar-collapse" id="menu">
		                	<ul class="nav navbar-nav navbar-left" style="">
		                        <li><a href="<?php echo base_url('Welcome/userHomepage')?>">BERANDA<i class="fa fa-home" aria-hidden="true"></i></a></li>
		                    </ul>
		                    <ul class="nav navbar-nav navbar-right breadcrumb" style="margin-top:5px; background-color: #000100 ; color: white;">
		                        <li>Home</li>
						        <li class="active">Pilih Tiket</li>
						        <li>Data Promo</li>
	                		</ul>
	                     </div>
		            </div>
	    		</div>
			</nav>
		</header>
	</section>
	<section class="pilihbus"> 
		<h3 class="text-center">Pilih Bus</h3>
		<div class="container">
			<div class="row">
				<table id="tabel_bus" class="table table-bordered table-striped">
					<tr>
						<th>Nama Bus</th>
						<th>Nomor Bus</th>
						<th>Tanggal</th>
						<th>Jam berangkat</th>
						<th>Kode Tiket</th>
						<th>Detail</th>
					</tr>
					<?php foreach ($etiket as $key) {?>
					<tr>
						<td><?php echo $key->nama_bus?></td>
						<td><?php echo $key->nomor_bus?></td>
						<td><?php echo $key->tanggal?></td>
						<td><?php echo $key->jam_berangkat?></td>
						<td><?php echo $key->etiket_kode?></td>
						<td>
							 
							<a href="<?php echo base_url('Welcome/data_penumpang')?>" class="btn btn-success"> Detail </a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</section>
	
</body>
</html>