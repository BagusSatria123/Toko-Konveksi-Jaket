<!-- Navigation -->
   <?php 
        $this->load->view('admin/templates/v_header');
		$this->load->view('admin/templates/v_sidebar');
   ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Data Bahan Baku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Bahan Baku</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				<center><?php echo $this->session->flashdata('msg');?></center>
					<div class="panel-heading">
					
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Data Bahan Baku</a></div>
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
						
							<div class="table-responsive">
                <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Bahan Baku</th>
                        <th>Nama Bahan Baku</th>
                        <th>Warna Bahan Baku</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th style="width:130px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['kain_id'];
                        $nm=$a['kain_nama'];
						$warna=$a['warna_nama'];
                        $satuan=$a['kain_satuan'];
                        $harga=$a['kain_harga'];                     
                        $stok=$a['kain_stok'];
						$k_warna_id=$a['k_warna_id'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
						<td><?php echo $warna;?></td>
                        <td style="text-align:center;"><?php echo $satuan;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>

                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"> Edit</a>
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
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Bahan Baku</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kain/tambah_kain'?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Bahan Baku</label>
                        <div class="col-xs-9">
                            <input name="namakain" class="form-control" type="text" placeholder="Nama Kain..." style="width:335px;" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Warna Bahan Baku</label>
                        <div class="col-xs-9">
                            <select name="warnakain" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Warna" data-width="80%" placeholder="Pilih Warna" required>
                                <?php foreach ($data2->result_array() as $b2) {
                                    $idw=$b2['warna_id'];
                                    $nmw=$b2['warna_nama'];
                                        echo "<option value='$idw'>$nmw</option>";
                                    ?>
                                        
                                <?php }?> 
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-9">
                             <select name="satuan" class="form-control" style="width:335px; data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                <option>Meter</option>
                                <option>Roll</option>
                                <option>Lusin</option>
                                <option>Pack</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harga" class="harga form-control" type="text" placeholder="Harga ..." style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;" readonly>
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
                        $id=$a['kain_id'];
                        $nm=$a['kain_nama'];
						$warna=$a['warna_nama'];
                        $satuan=$a['kain_satuan'];
                        $harga=$a['kain_harga'];                     
                        $stok=$a['kain_stok'];
						$k_warna_id=$a['k_warna_id'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Bahan Baku</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kain/edit_kain'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Bahan Baku</label>
                            <div class="col-xs-9">
                                <input name="kodekain" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Kain..." style="width:335px;" readonly>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Nama Bahan Baku</label>
                            <div class="col-xs-9">
                                <input name="namakain" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama Kain..." style="width:335px;" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-xs-3" >Warna Bahan Baku</label>
                            <div class="col-xs-9">
                                <select name="warnakain" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Warna" data-width="80%" placeholder="Pilih Warna" required>
                                <?php foreach ($data2->result_array() as $b2) {
                                    $idw=$b2['warna_id'];
                                    $nmw=$b2['warna_nama'];
									
									if($idw==$k_warna_id)
                                        echo "<option value='$idw' selected>$nmw</option>";
                                    else
                                        echo "<option value='$idw'>$nmw</option>";
								}
                                    ?>
                                        
                           
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                 <select name="satuan" class="form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" style="width:335px;"  required>
                                    <?php if($satuan=='Meter'):?>
                                        <option selected>Meter</option>
                                        <option>Roll</option>
                                        <option>Pack</option>
                                        <option>Lusin</option>

                                    <?php elseif($satuan=='Pack'):?>
                                        <option selected>Pack</option>
                                        <option>Roll</option>
                                        <option>Meter</option>
                                        <option>Lusin</option>

                                    <?php elseif($satuan=='Lusin'):?>
                                        <option >Pack</option>
                                        <option>Roll</option>
                                        <option>Meter</option>
                                        <option selected>Lusin</option>

                                    <?php else:?>
                                        <option>Meter</option>
                                        <option selected>Roll</option>
                                        <option>Pack</option>
                                        <option>Lusin</option>

                                    <?php endif;?>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga</label>
                            <div class="col-xs-9">
                                <input name="harga" class="harga form-control" type="text" value="<?php echo $harga;?>" placeholder="Harga ..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." style="width:335px;" readonly>
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
                        $id=$a['kain_id'];
                        $nm=$a['kain_nama'];
						$warna=$a['warna_nama'];
                        $satuan=$a['kain_satuan'];
                        $harga=$a['kain_harga'];                     
                        $stok=$a['kain_stok'];
						$k_warna_id=$a['k_warna_id'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Bahan Baku</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kain/hapus_kain'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data Bahan Baku ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
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
		

	<script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    
<?php 
	$this->load->view('admin/templates/v_footer');
?>
