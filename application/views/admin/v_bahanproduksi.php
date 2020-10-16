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
				<li class="active">Bahan Produksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bahan Produksi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				<center><?php echo $this->session->flashdata('msg');?></center>
					<div class="panel-heading">
					
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Bahan Produksi</a></div> 
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						
							<div class="table-responsive">
                <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Bahan</th>
                        <th>Kode Kain</th>
						<th>Nama Kain</th>
						<th>Satuan Kain</th>
                        <th>Kode Rencana</th>
						<th>Nama Produk</th>
                        <th>Jumlah Bahan</th>
                        <th style="width:120px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $bahanid=$a['bahan_id'];
						$kainid=$a['b_kain_id'];
						$kainnm=$a['kain_nama'];
						$kainsatuan=$a['kain_satuan'];
                        $rencanaid=$a['b_rencana_id'];
						$rencananm=$a['produk_nama'];
						$jumlah=$a['bahan_jumlah'];


                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $bahanid;?></td>
						<td><?php echo $kainid;?></td>
						<td><?php echo $kainnm;?></td>
						<td><?php echo $kainsatuan;?></td>
						<td><?php echo $rencanaid;?></td>
						<td><?php echo $rencananm;?></td>
						<td><?php echo $jumlah;?></td>

                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $bahanid?>" data-toggle="modal" title="Edit"> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $bahanid?>" data-toggle="modal" title="Hapus">Hapus</a>
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
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Bahan Produksi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/bahanproduksi/tambah_bahan'?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->
						
						<div class="form-group">
                            <label class="control-label col-xs-4" >Nama Kain</label>
                            <div class="col-xs-8">
                                <select name="kainid" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kain yang dibutuhkan" data-width="80%" placeholder="Pilih Kain yang dibutuhkan" required>
                                <?php foreach ($kain2->result_array() as $b2) {
                                    $id_kain=$b2['kain_id'];
                                    $nm_kain=$b2['kain_nama'];
									$satuan_kain=$b2['kain_satuan'];
                                    ?>
                                        <option value="<?php echo $id_kain;?>"><?php echo $nm_kain . " - " . $satuan_kain;?></option>
                                <?php }?> 
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-4" >Rencana Produksi</label>
                            <div class="col-xs-8">
                                <select name="rencanaid" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Rencana yang dikerjakan" data-width="80%" placeholder="Pilih Rencana yang dikerjakan" required>
                                <?php foreach ($rencana2->result_array() as $b2) {
                                    $id_rencana=$b2['rencana_id'];
                                    $nm_rencana=$b2['produk_nama'];
                                    ?>
                                        <option value="<?php echo $id_rencana;?>"><?php echo $id_rencana . " - " . $nm_rencana;?></option>
                                <?php }?> 
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-4" >Jumlah Bahan</label>
                            <div class="col-xs-8">
                                <input name="jumlahbahan" class="form-control" type="text" placeholder="Jumlah Bahan yang diperlukan..." style="width:295px;">
                            </div>
                        </div>  
					

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
		
        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                       $no++;
                        $id=$a['bahan_id'];
                        $kainid=$a['b_kain_id'];
						$rencanaid=$a['b_rencana_id'];
						$bahanjumlah=$a['bahan_jumlah'];

                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Bahan Produksi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/bahanproduksi/edit_bahan'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-4" >Kode Bahan</label>
                            <div class="col-xs-8">
                                <input name="kodebahan" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Bahan..." style="width:295px;" readonly>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-xs-4" >Nama Kain</label>
                            <div class="col-xs-8">
                                <select name="kainid" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kain yang dibutuhkan" data-width="80%" placeholder="Pilih Kain yang dibutuhkan" required>
                                <?php foreach ($kain2->result_array() as $b2) {
                                    $id_kain=$b2['kain_id'];
                                    $nm_kain=$b2['kain_nama'];
									$satuan_kain=$b2['kain_satuan'];
									
									if($id_kain==$kainid)
                                        echo "<option value='$id_kain' selected>$nm_kain - $satuan_kain</option>";
                                    else
                                        echo "<option value='$id_kain'>$nm_kain - $satuan_kain</option>";
                                    ?>
                                <?php }?> 
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-4" >Rencana Produksi</label>
                            <div class="col-xs-8">
                                <select name="rencanaid" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Rencana yang dikerjakan" data-width="80%" placeholder="Pilih Rencana yang dikerjakan" required>
                                <?php foreach ($rencana2->result_array() as $r2) {
                                    $id_rencana=$r2['rencana_id'];
                                    $nm_rencana=$r2['produk_nama'];
									
									if($id_rencana==$rencanaid)
                                        echo "<option value='$id_rencana' selected>$id_rencana - $nm_rencana</option>";
                                    else
                                        echo "<option value='$id_rencana'>$id_rencana - $nm_rencana</option>";
                                    ?>
                                <?php }?> 
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-4" >Jumlah Bahan</label>
                            <div class="col-xs-8">
                                <input name="jumlahbahan" class="form-control" type="text" value="<?php echo $bahanjumlah;?>"   placeholder="Jumlah Bahan yang diperlukan..." style="width:295px;">
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
                        $id=$a['bahan_id'];
                        $kainid=$a['b_kain_id'];
						$rencanaid=$a['b_rencana_id'];
						$bahanjumlah=$a['bahan_jumlah'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Bahan Produksi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/bahanproduksi/hapus_bahan'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data bahan produksi ini..?</p>
                                    <input name="kodebahan" type="hidden" value="<?php echo $id; ?>">
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
