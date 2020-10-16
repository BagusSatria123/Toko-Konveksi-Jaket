	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<?php $h = $this->session->userdata('akses'); ?>
		<?php $u = $this->session->userdata('user'); ?>

		<?php if ($h == '1') { ?>
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="<?php echo base_url() . 'assets/img/admin.png' ?>" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">ADMIN</div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if ($h == '2') { ?>
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="<?php echo base_url() . 'assets/img/pemilik.png' ?>" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">PEMILIK</div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<?php if ($h == '3') { ?>
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="<?php echo base_url() . 'assets/img/pemilik.png' ?>" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">PENJAHIT</div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>


		<ul class="nav menu">
			<?php if ($h == '1') { ?>
				<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
						<em class="fa fa-navicon">&nbsp;</em> Data Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li><a class="" href="<?php echo base_url() . 'admin/pengguna' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data User
							</a></li>
						<li><a class="" href="<?php echo base_url() . 'admin/warna' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Warna
							</a></li>
						<!-- <li><a class="" href="<?php echo base_url() . 'admin/kain' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Bahan Baku
							</a></li> -->
						<li><a class="" href="<?php echo base_url() . 'admin/produkbaju' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Produk Jaket
							</a></li>
					</ul>
				</li>
				<!-- <li><a href="<?php echo base_url() . 'admin/pembeliankain' ?>"><em class="fa fa-shopping-cart">&nbsp;</em> Pembelian Bahan</a></li> -->
				<!-- <li><a href="<?php echo base_url() . 'admin/penggunaanbahan' ?>"><em class="fa fa-hourglass-1">&nbsp;</em> Penggunaan Bahan</a></li> -->
				<li><a href="<?php echo base_url() . 'admin/PemesananMasuk' ?>"><em class="fa fa-hourglass-1">&nbsp;</em> Pemesanan Masuk</a></li>
				<li><a href="<?php echo base_url() . 'admin/hasil' ?>"><em class="fa fa-leaf">&nbsp;</em> Hasil Produksi</a></li>
				<!--<li><a href="<?php echo base_url() . 'admin/rencana' ?>"><em class="fa fa-bar-chart">&nbsp;</em> RPROD Lama</a></li>
			<li><a href="<?php echo base_url() . 'admin/bahanproduksi' ?>"><em class="fa fa-hourglass-1">&nbsp;</em> Bahan Produksi</a></li>-->
				<li><a href="<?php echo base_url() . 'admin/penjualanproduk' ?>"><em class="fa fa-dollar">&nbsp;</em> Pencatatan Penjualan</a></li>
				<li><a href="<?php echo base_url() . 'admin/daftarlaporan' ?>"><em class="fa fa-sticky-note-o">&nbsp;</em> Laporan</a></li>

			<?php } ?>
			<?php if ($h == '2') { ?>
				<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
						<em class="fa fa-navicon">&nbsp;</em> Data Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li><a class="" href="<?php echo base_url() . 'admin/pengguna' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data User
							</a></li>
						<li><a class="" href="<?php echo base_url() . 'admin/warna' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Warna
							</a></li>
						<li><a class="" href="<?php echo base_url() . 'admin/kain' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Bahan Baku
							</a></li>
						<li><a class="" href="<?php echo base_url() . 'admin/produkbaju' ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Data Produk Baju
							</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url() . 'admin/rencanabaru' ?>"><em class="fa fa-bar-chart">&nbsp;</em> Rencana Produksi</a></li>
				<li><a href="<?php echo base_url() . 'admin/daftarlaporan' ?>"><em class="fa fa-sticky-note-o">&nbsp;</em> Laporan</a></li>
			<?php } ?>
			<?php if ($h == '3') { ?>
				<li><a href="<?php echo base_url() . 'admin/penggunaanbahan' ?>"><em class="fa fa-hourglass-1">&nbsp;</em> Penggunaan Bahan</a></li>
				<li><a href="<?php echo base_url() . 'admin/hasil' ?>"><em class="fa fa-shopping-cart">&nbsp;</em> Hasil Produksi</a></li>
			<?php } ?>

			<li><a href="<?php echo base_url() . 'administrator/logout' ?>"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		</ul>

	</div>
	<!--/.sidebar-->