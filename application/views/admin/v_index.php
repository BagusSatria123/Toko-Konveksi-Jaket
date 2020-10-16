 <!-- Navigation -->
 <?php
	$this->load->view('admin/templates/v_header');
	$this->load->view('admin/templates/v_sidebar');
	?>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
 	<div class="row">
 		<ol class="breadcrumb">
 			<li><a href="https://localhost/konveksi/welcome\">
 					<em class="fa fa-home"></em>
 				</a></li>
 			<li class="active">Selamat Datang!</li>
 		</ol>
 	</div>
 	<!--/.row-->

 	<div class="row">
 		<div class="col-lg-12">
 			<h1 class="page-header">Selamat Datang!</h1>
 		</div>
 	</div>
 	<!--/.row-->
 	<?php $h = $this->session->userdata('akses'); ?>
 	<?php $u = $this->session->userdata('user'); ?>
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">

 					Selamat Datang, <?php if ($h == '1') { ?>Admin<?php } ?><?php if ($h == '2') { ?>Pemilik<?php } ?>!

 					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
 				<div class="panel-body">
 					<div class="canvas-wrapper">
 						<p>Selamat Datang di Sistem Informasi Produksi dan Pencatatan Penjualan di Paramount Konveksi</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!--/.row-->

 	<?php
		$this->load->view('admin/templates/v_footer');

		?>