<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paramount Konveksi</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="<?php echo base_url() ?>assets/fonts/font.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
	<script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
	<![endif]-->
	
	<link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">


    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
	
	<!-- 2 
   <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>

    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
	
	<!-- 2 akhir -->
	
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Paramount Konveksi </span>- Sistem Informasi</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-sign-out"></em><span class="label label-danger"></span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="<?php echo base_url().'administrator/logout'?>">
								<div><em class="fa fa-power-off"></em> Logout
									<span class="pull-right text-muted small">Keluar Sekarang</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>