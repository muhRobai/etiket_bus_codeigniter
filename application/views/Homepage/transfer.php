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
		<h3 class="text-center">Data Penumpang</h3>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" method="get" role="form">
						<div class="box-body">
						<?php foreach ($user as $key) { ?>
							<div class="data">
								<h4>Data Pemesan Tiket</h4>
								<div class="form-group">
									<label for="nama" class="col-sm-2 control-label">Nama</label>
								
									<div class="col-sm-6">
										<input type="text" name="n_penumpang" class="form-control" value="<?php echo $key->fullname ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-sm-2 control-label">E-Mail</label>
									<div class="col-sm-6">
										<input type="text" name="alamat" class="form-control"  value="<?php echo $key->email ?>" >
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-sm-2 control-label">Total Harga</label>
									<div class="col-sm-6">
										<input type="text" name="alamat" class="form-control"  value="Rp.<?php echo $key->total_harga ?>" >
									</div>
								</div>
								<hr>
								<div class="form-group">
									<ul>
										<li>Silahkan Anda Melakukan Transfer</li>
										<li>Ke nomer rekening berikut <b>9900021210012</b></li>
										<li>Setelah melakukan transfer upload bukti transfer</li>
										<li>tunggu 3x 24 jam sistem kami akan memferifikasi bukti transfer anda</li>
									</ul>
								</div>
							<?php } ?>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<h4>Bukti Transfer</h4>
					<form method="post" action="<?php echo base_url('Welcome/etiket')?>" enctype="multipart/form-data" class="form-horizontal" >
						<div class="form-group">
							<input type="file" name="transfer" class="form-control" multiple="multiple">
						</div>
						<div class="form-group">
							<input type="submit" name="simpan" class="form-control btn btn-success">
						</div>

					</form>
				</div>
			</div>
	</section>
	
</body>
</html>