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
				<li class="active">Hasil Produksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Hasil Produksi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				<center><?php echo $this->session->flashdata('msg');?></center>
					<div class="panel-heading">
					
					Update Hasil Produksi 
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						
							<div class="table-responsive">
                <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Rencana</th>
                        <th>Nama Produk Baju</th>
						<th>Rencana Jumlah</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah Hasil Produksi</th>
                        <th style="width:190px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['rencana_kode'];
                        $produkid=$a['r_produk_id'];
						$produknm=$a['produk_nama'];
						$produkwrn=$a['produk_warna'];
						$rcnjmlh=$a['rencana_jumlah'];
						$tgl_mulai=$a['tgl_mulai'];
						$tgl_selesai=$a['tgl_selesai'];
						$hasil_jumlah=$a['hasil_jumlah'];
						$validasi_selesai=$a['validasi_selesai'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo "$produknm - $produkwrn";?></td>
						<td><?php echo $rcnjmlh;?></td>
						<td><?php echo $tgl_mulai;?></td>
						<td><?php echo $tgl_selesai;?></td>
						<td><?php echo $hasil_jumlah;?></td>

		<?php $h=$this->session->userdata('akses'); ?>
        <?php $u=$this->session->userdata('user'); ?>
		
                        <td style="text-align:center;">
							<?php if ($validasi_selesai=='0' && empty($hasil_jumlah)):?>
								<a class="btn btn-xs btn-info" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"> Update Produksi</a>
							<?php elseif ($validasi_selesai=='0' && $h=='1'):?>
								<a class="btn btn-xs btn-success" href="#modalvalidasiselesai<?php echo $id?>" data-toggle="modal" title="Edit"> Validasi Selesai</a>
								<a class="btn btn-xs btn-info" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"> Update</a>
							<?php else:?>
								<a class="btn btn-xs btn-info" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"> Update Produksi</a>
							<?php endif;?>
                            
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
		
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                       $no++;
                        $id=$a['rencana_kode'];
                        $produkid=$a['r_produk_id'];
						$produknm=$a['produk_nama'];
						$rcnjmlh=$a['rencana_jumlah'];
						$tgl_mulai=$a['tgl_mulai'];
						$tgl_selesai=$a['tgl_selesai'];
						$hasil_jumlah=$a['hasil_jumlah'];

                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Hasil Produksi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/hasil/edit_hasil'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Rencana</label>
                            <div class="col-xs-9">
                                <input name="koderencana" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Rencana..." style="width:335px;" readonly>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Nama Produk Baju</label>
                            <div class="col-xs-9">
                                <select name="namabaju" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Produk Baju" data-width="80%" placeholder="Pilih Produk Baju" readonly>
                                <?php foreach ($baju2->result_array() as $b2) {
                                    $id_baju=$b2['produk_id'];
                                    $nm_baju=$b2['produk_nama'];
									$wrn_baju=$b2['produk_warna'];
                                     if($id_baju==$produkid)
                                        echo "<option value='$id_baju' selected>$nm_baju - $wrn_baju</option>";
                                    else
                                        echo "<option value='$id_baju'>$nm_baju - $wrn_baju</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Rencana Jumlah</label>
                            <div class="col-xs-9">
                                <input name="rencanajumlah" class="form-control" type="text" value="<?php echo $rcnjmlh;?>" placeholder="Rencana Jumlah Produksi..." style="width:335px;" readonly>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Tanggal Mulai</label>
                            <div class="col-xs-9">
                                <input name="tgl_mulai" class="form-control" type="date" value="<?php echo $tgl_mulai;?>" placeholder="Tanggal Mulai..." style="width:335px;" readonly>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Tanggal Selesai</label>
                            <div class="col-xs-9">
                                <input name="tgl_selesai" class="form-control" type="date" min="<?php echo date('Y-m-d')?>" value="<?php echo $tgl_selesai;?>" placeholder="Tanggal Selesai..." style="width:335px;" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Hasil Jumlah Produksi</label>
                            <div class="col-xs-9">
                                <input name="hasilproduksi" class="form-control" type="text" value="<?php echo $hasil_jumlah;?>" placeholder="Hasil Jumlah Produksi..." style="width:335px;" required>
                            </div>
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id=$a['rencana_kode'];
                        $produkid=$a['r_produk_id'];
						$produknm=$a['produk_nama'];
						$rcnjmlh=$a['rencana_jumlah'];
						$tgl_mulai=$a['tgl_mulai'];
						$tgl_selesai=$a['tgl_selesai'];
						$hasil_jumlah=$a['hasil_jumlah'];

                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Produksi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/hasil/hapus_hasil'?>">
                        <div class="modal-body">
                            <p>Hapus data ini ?</p>
                                    <input name="koderencana" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>
		
		        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id=$a['rencana_kode'];
                        $produkid=$a['r_produk_id'];
						$produknm=$a['produk_nama'];
						$rcnjmlh=$a['rencana_jumlah'];
						$tgl_mulai=$a['tgl_mulai'];
						$tgl_selesai=$a['tgl_selesai'];
						$hasil_jumlah=$a['hasil_jumlah'];

                    ?>
                <div id="modalvalidasiselesai<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Validasi Hasil Produksi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/hasil/validasi_selesai'?>">
                        <div class="modal-body">
                            <p>Validasi Hasil Produksi ini ?</p>
                                    <input name="koderencana" type="hidden" value="<?php echo $id; ?>">
									<input name="namabaju" type="hidden" value="<?php echo $produkid; ?>">
									<input name="tgl_selesai" type="hidden" value="<?php echo $tgl_selesai; ?>">
									<input name="hasilproduksi" type="hidden" value="<?php echo $hasil_jumlah; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Validasi</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!--END MODAL-->
 
<?php 
	$this->load->view('admin/templates/v_footer');
?>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });
                
                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker2').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
				$('#datepicker3').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker4').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
    </script>
