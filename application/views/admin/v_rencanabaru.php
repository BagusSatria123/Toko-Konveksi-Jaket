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
				<li class="active">Rencana Produksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Rencana Produksi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				<center><?php echo $this->session->flashdata('msg');?></center>
					<div class="panel-heading">
					
						Input Rencana Produksi
						<div class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#largeModal"><span class="fa fa-search"></span> Cari Kain</a></div>
						
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
					
                
            <form action="<?php echo base_url().'admin/rencanabaru/add_to_cart'?>" method="post">
			
			<table style="font-size:12px;">
                <tr>
                    <th style="width:250px;padding-bottom:5px;">Produk Yang Akan di Produksi</th>
                    <th style="width:300px;padding-bottom:5px;">
                        <select name="namabaju" id="select-product" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Produk Baju" data-width="67%" placeholder="Pilih Produk Baju" required autofocus>
                            <?php foreach ($data->result() as $key => $product): ?>
                                <option value="<?= $product->produk_id ?>"><?= $product->produk_nama . " - " . $product->produk_warna ?></option>
                            <?php endforeach ?>
                        </select>
                    </th>
                    
                </tr>
                <tr>
                    <th style="width:100px;padding-bottom:5px;">Foto Produk</th>
                    <th>
                        <img id="product-image" src="<?= base_url('upload/product/default.jpg') ?>" alt="no-product" style="width: 200px; height: 150px;">
                    </th>
                </tr>
                <tr>
                    <th>&ensp;</th>
                </tr>
				<tr>
                    <th style="width:100px;padding-bottom:5px;">Rencana Jumlah Produksi</th>
                    <th style="width:300px;padding-bottom:5px;"><input type="number" name="rencanaproduksi" value="<?php echo $this->session->userdata('rencanaproduksi');?>" class="form-control input-sm" style="width:200px;" required></th>
                    
                </tr>
				<tr>
                    <th style="width:100px;padding-bottom:5px;">Tanggal Mulai</th>
                    <th style="width:300px;padding-bottom:5px;"><input type="date" name="tgl_mulai" value="<?php echo $this->session->userdata('tgl_mulai');?>" min="<?php echo date('Y-m-d')?>" class="form-control input-sm" style="width:200px;" required></th>
                    
                </tr>
				<tr>
                    <th style="width:100px;padding-bottom:5px;">Rencana Selesai</th>
                    <th style="width:300px;padding-bottom:5px;"><input type="date" name="perkiraan_selesai" value="<?php echo $this->session->userdata('perkiraan_selesai');?>" min="<?php echo date('Y-m-d')?>" class="form-control input-sm" style="width:200px;" required></th>
                    
                </tr>
				<tr>
                    <th style="width:100px;padding-bottom:5px;">Catatan</th>
                    <th style="width:300px;padding-bottom:5px;"><input type="text" name="keterangan" value="<?php echo $this->session->userdata('keterangan');?>" class="form-control input-sm" style="width:200px;" ></th>
                    
                </tr>
            </table><hr/>
			
            <table style="font-size:12px;">
                <tr>
                    <th>Masukkan Kode Bahan Baku</th>
                </tr>
                <tr>
                    <th><input type="text" name="kode_kain" id="kode_kain" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_kain" style="position:absolute;">
                    </div>
            </table>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Bahan Baku</th>
                        <th>Nama Bahan Baku</th>
                        <th style="text-align:center;">Warna</th>
						<th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Perkiraan Harga</th>
                        <th style="text-align:center;">Jumlah Beli</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
						 <td style="text-align:center;"><?=$items['warna'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/rencanabaru/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:center;">Perkiraan Total</td>
                        <td style="text-align:right;">Rp. <?php echo number_format($this->cart->total());?></td>
                    </tr>
             </tfoot>
            </table>
            <form action="<?php echo base_url().'admin/rencanabaru/simpan_rencana'?>" method="post">
            <table style="font-size:12px;">
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span> Simpan</button></td>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>

            </table>
            </form>
            </div>
        </div>
        <!-- /.row -->


    </div>
        <!-- /.row -->
        <!-- ============ KAIN =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Daftar Bahan Baku</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:400px;">

                  <table class="table table-bordered table-condensed" style="" id="">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
							<th>Kode Bahan Baku</th>
							<th>Nama Bahan Baku</th>
							<th>Warna Bahan Baku</th>
							<th>Satuan</th>
							<th>Perkiraan Harga</th>
							<th style="width:130px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data2->result_array() as $a):
                            $no++;
                            $id=$a['kain_id'];
							$nm=$a['kain_nama'];
							$k_warna_id=$a['k_warna_id'];
							$warna=$a['warna_nama'];
							$satuan=$a['kain_satuan'];
							$harga=$a['kain_harga'];                     

                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nm;?></td>
							<td><?php echo $warna;?></td>
							<td><?php echo $satuan;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>

							
                            <td style="text-align:center;">
                            <form action="<?php echo base_url().'admin/rencanabaru/add_to_cart'?>" method="post">
                            <input type="hidden" name="kode_kain" value="<?php echo $id?>">
                            <input type="hidden" name="namakain" value="<?php echo $nm;?>">
                            <input type="hidden" name="warna" value="<?php echo $warna;?>">
							<input type="hidden" name="warna" value="<?php echo $satuan;?>">
                            <input type="hidden" name="harga" value="<?php echo number_format($harga);?>">
                            <input type="hidden" name="jumlah" value="1" required>
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>


        <!--END MODAL-->


    </div></div>
	
	<?php 
	$this->load->view('admin/templates/v_footer');
?>

    <!-- /.container -->

    <script type="text/javascript">
        $(document).ready(function() {

            function fetchSelectedItem(e){
                const this_picker = $(this);

                let item_id = this_picker.val();

                $.ajax({
                    url: '<?= base_url('rest/product/get-item') ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {product_id: item_id},
                })
                .done(function(response) {
                    

                    if ("success" in response) {
                        let {data} = response.success ;

                        $('#product-image').attr({
                            src: ` <?= base_url('upload/product')."/" ?>${data.gambar}`,
                            alrt: data.produk_id
                        });
                        
                    }

                    if ("error" in response) {
                        console.log(response.error.reason);
                    }

                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            }


            $('#mydata').DataTable();

            //Ajax kabupaten/kota insert
            $("#kode_kain").focus();
            $("#kode_kain").keyup(function(){
                var kodekain = {kode_kain:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/rencanabaru/get_kain';?>",
               data: kodekain,
               success: function(msg){
               $('#detail_kain').html(msg);
               }
            });
            }); 

            $("#kode_kain").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });

            $('#select-product').on('change', fetchSelectedItem)

            <?php if ($this->session->userdata('namabaju') != false): ?>
                setTimeout(function() {
                    $('#select-product').val('<?= $this->session->userdata('namabaju'); ?>');
                    $('#select-product').trigger('change')
                }, 500);
            <?php endif; ?>

        });
    </script>
    
    
</body>

</html>
