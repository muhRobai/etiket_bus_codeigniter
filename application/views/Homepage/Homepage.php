<!DOCTYPE html>
<html>
<head>
	<title>ebus</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/css/new.css">

	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/bootstrap.min.js"></script>

</head>
<body>
<section id="beranda">
	<header class="header" id="header">
		<nav class="navbar navbar-fixed-top navbar-inverse">
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
	                	<ul class="nav navbar-nav navbar-left">
	                        <li><a href="#beranda">BERANDA<i class="fa fa-home" aria-hidden="true"></i></a></li>
	                        <li><a href="#tiket">TIKET <i class="fa fa-globe" aria-hidden="true"></i></a></li>
	                        <li><a href="#informasi">INFORMASI <i class="fa fa-calendar" aria-hidden="true"></i></a></li>
	                        <li><a href="#tentang">TENTANG <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
	                    </ul>
	                    <ul class="nav navbar-nav navbar-right">
	                        <li><a href="<?php echo base_url()?>welcome/loginn">LOGIN <i class="fa fa-volume-control-phone" aria-hidden="true"></i></a></li>
	                        <li><a href="<?php echo base_url()?>welcome/signin">SIGN IN<i class="fa fa-group" aria-hidden="true"></i></a></li>
	                	</ul>
	                </div>
	            </div>
    		</div>
		</nav>
		<!-- end nav -->
		<div class="promo">
			<div class="container">   
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			      <div class="item active">
			      	<div class="carousel-caption">
			      		<h4> coba </h4>
			      	</div>
			        <img src="<?php echo base_url('image/Agra_mas.jpg')?>" alt="Los Angeles" style="width:1200px; height: 500px;" class="img-responsive">
			      </div>

			      <div class="item">
			        <img src="<?php echo base_url('image/pahala_kencana.jpg')?>" alt="Chicago" style="width:1200px; height: 500px;" class="img-responsive">
			      </div>
			    
			      <div class="item">
			        <img src="<?php echo base_url('image/Bus1.jpg')?>" alt="New york" style="width:1200px; height: 500px;" class="img-responsive">
			      </div>
			    </div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
			  </div>
			</div>
		</div>
	</header>
</section><section id="kodong"></section>
			<section class="tiket" id="tiket">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
								<div class="col-md-12">
									<form method="post" class="form-horizontal" action="<?php echo base_url()?>welcome/login" role="form">
										<div class="box-body">
											<div class="form-group">
												<label class="col-sm-3" for="username">Username : </label>
												<div class="col-sm-9">
													<input type="text" name="username" id="username" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3" for="password">Password : </label>
												<div class="col-sm-9">
													<input type="password" name="password" id="password" class="form-control">
												</div>
											</div>
											<div class="col-sm-12">
												<label><?php echo $this->session->userdata('username');?></label>
											</div>
											<div class="box-footer">
												<input type="submit" name="Login" class="btn btn-success" value="Login">
												<input type="submit" name="Login" class="btn btn-success" value="Cencel">
											</div>
										</div>
									</form>
								</div>
						</div>
							<div class="col-md-4" id="pembeliantiket">
								<div class="text-center">
									Pilih Tujuan Anda :
								</div><br>
									<form class="form-horizontal" method="post" action="<?php echo base_url();?>Welcome/pilihbus" role="form">
							              <div class="box-body">
							              	<div class="col-sm-10">
							                <div class="form-group">
												<label for="asal">Terminal Asal</label>
												<select class="form-control" name="Tawal">
													<option>Karawang</option>
													<option>Cikampek</option>
													<option>Purwakarta</option>
													<option>Cikarang</option>
												</select>
											</div>
											</div><div class="col-sm-2"></div>
											<div class="col-sm-10">
							                <div class="form-group">
							                  <label for="Tujuan">Tujuan</label>
													<select class="form-control" name="takhir">
														<option>Kebumen</option>
								 						<option>Cikampek</option>
														<option>Purwakarta</option>
														<option>Cikarang</option>
													</select>
							                </div>
							            	</div><div class="col-sm-2"></div>
							            	<div class="col-sm-10">
							                <div class="form-group">
							                  <label for="tgl">Tanggal</label>
												<input type="date" name="tgl" class="form-control" role="dd/mm/yy">
							                </div>
							            	</div> <div class="col-sm-2"></div>
							            	<div class="col-sm-10">
							                <div class="form-group">
							                  <label for="jumlahpesan">Jumlah Penumpang (anak2 diatas 2th dianggap dewasa)</label>
											<input type="text" name="jumlahpesan" class="form-control">
							                </div></div><div class="col-sm-2"></div>
							              <!-- /.box-body -->
							              <div class="box-footer">
							                <button type="submit" class="btn btn-success pull-leftT" name="simpan">Simpan</button>
							              </div>
							              <!-- /.box-footer -->
							            </form>
							</div>
					</div>
				</div>
			</section>

			<section class="partner" id="informasi">
				<div class="partner">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo base_url('image/Bus1.jpg')?>" alt="gadagambar">
							</div>
							<div class="col-md-3">
								<img src="<?php echo base_url('image/Bus1.jpg')?>" alt="gadagambar">
							</div>
							<div class="col-md-3">
								<img src="<?php echo base_url('image/Bus1.jpg')?>" alt="gadagambar">
							</div>
							<div class="col-md-3">
								<img src="<?php echo base_url('image/Bus1.jpg')?>" alt="gadagambar">
							</div>
						</div>
					</div>
				</div>
			</section>
			<footer id="tentang">
				<div class="footer">
					<div class="container">
						<div class="row">
							<p> Copyright @bai 2018</p>
						</div>
					</div>
					
				</div>
			</footer>

</body>


	

</html>