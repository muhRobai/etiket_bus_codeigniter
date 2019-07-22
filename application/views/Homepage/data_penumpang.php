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
						        <li>Pilih Tiket</li>
						        <li class="active">Data Penumpang</li>
						        <li>Cekout</li>
	                		</ul>
	                     </div>
		            </div>
	    		</div>
			</nav>
		</header>
	</section>
	<section class="pilihbus"> 
		<h3 class="text-center">Masukan Data Penumpang</h3>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" action="<?php echo site_url('Welcome/vrify');?>" method="get" role="form">
						<div class="box-body">
							<div class="data">
								<h4>Data Pemesan Tiket</h4>
								<?php foreach ($info as $key) { ?>
								<div class="form-group">
									<label for="nama" class="col-sm-2 control-label">Nama</label>
								
									<div class="col-sm-6">
										<input type="text" name="n_penumpang" class="form-control" value="<?php echo $key->fullname ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-sm-2 control-label">E-Mail</label>
									<div class="col-sm-6">
										<input type="text" name="alamat" class="form-control" value="<?php echo $key->email ?>">
									</div>
								</div>
								<hr>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<h4>Keterangan</h4>
					<div class="info">
						<ul>
							<li>Bus <?php echo $key->nama_bus?></li>
							<li>Berangkat jam <?php echo $key->jam_berangkat?></li>
							<li>Dari <?php echo $key->asal_bus ?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php $jml = $key->jumlah_beli?>
			<?php $this->session->set_userdata('jml', $jml); ?>
			<div class="row">
				<div class="col-md-8">
				<form class="form-horizontal" action="<?php echo site_url('Welcome/buktitf');?>" method="post" role="form">
						<div class="box-body">
							<?php for ($i=1; $i <= $jml ; $i++) {?>
							<div class="data">
								<h4>Penumpang ke-<?php echo $i?></h4>
								<div class="form-group">
									<label for="nama" class="col-sm-2 control-label">Nama</label>
								
									<div class="col-sm-6">
										<input type="text" name="n_penumpang[]" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-6">
										<input type="text" name="alamat[]" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="no_tlpn" class="col-sm-2 control-label">No Tlp</label>
									<div class="col-sm-6">
										<input type="text" name="ntlp[]" class="form-control">
									</div>
								</div>
								<hr>
							<?php }?>
							<?php $harga = $key->harga_tiket?>
								<div class="form-group">
									<label for="tbayar" class="col-sm-2 control-label">Total Bayar</label>
									<div class="col-sm-6">
										<input type="text" name="tbayar" class="form-control" value="<?php echo $harga * $jml?>"> 
									</div>
								</div>
								<hr>
								<div class="form-group">
									<div class="col-sm-8">
										<input type="submit" name="beli" value="Bayar" class="btn btn-success pull-right">
									</div>
								</div>
							</div>
						</div>
					</form>
					<?php }?>
				</div>	
			</div>
		</div>
	</section>
	
</body>
</html>