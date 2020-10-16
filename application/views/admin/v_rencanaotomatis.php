<!-- Navigation -->
<?php 
	$this->load->view('admin/templates/v_header');
	$this->load->view('admin/templates/v_sidebar');
?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <em class="fa fa-home"></em>
                </a>
            </li>
            <li class="active">Rencana Produksi NEW</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rencana Produksi NEW</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center>
                    <?php echo $this->session->flashdata('msg');?>
                </center>
                <div class="panel-heading">
                    Input Rencana Produksi
                    <div class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#largeModal">
                        <span class="fa fa-search"></span> Cari Bahan Baku</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <form id="general-form" action="javascript:void(0)">
                            <table>
                                <tr>
                                    <th style="width:130px;padding-bottom:5px;">Produk Baju</th>
                                    <th style="width:300px;padding-bottom:5px;">
                                        <select name="baju_code" id="baju_code" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Produk Baju" data-width="67%" placeholder="Pilih Produk Baju" required>
                                            <?php foreach ($data3->result_array() as $b2) {
                                                        $id_bj=$b2['produk_id'];
                                                        $nm_bj=$b2['produk_nama'];
                                                        $wrn_bj=$b2['produk_warna'];

                                                            echo "<option value='$id_bj'>$nm_bj - $wrn_bj</option>";
                                                        ?>

                                                <?php }?>
                                        </select>
                                    </th>
                                </tr>

                                <tr>
                                    <th>Tanggal</th>
                                    <td>
                                        <div class='input-group date' id='datepicker' style="width:200px;">
                                            <input type='text' name="inv_date" id="inv_date" class="form-control" placeholder="Tanggal..." required/>
                                            <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <hr/>

                        </form>

                        <div class="row">
                            <div class="col-xs-12">
                                <form action="javascript:void(0)">
                                    <div class="form-group">
                                        <label for="product_code">Tambah Baru</label>
                                        <select id="product_code" class="selectpicker show-tick form-control" placeholder="Pilih Kode Kain" title="Pilih Kode Kain">
                                            <?php foreach ($data->result() as $key => $kain): ?>
                                                <option value="<?= $kain->kain_id ?>">
                                                    <?= $kain->kain_id ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xs-12">
                                <table id="items" class="table table-bordered table-condensed" style="font-size:12px; margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>Kode Bahan Baku</th>
                                            <th>Nama Bahan Baku</th>
                                            <th style="text-align:center;">Warna</th>
                                            <th style="text-align:center;">Satuan</th>
                                            <th style="text-align:center;">Harga</th>
                                            <th style="text-align:center;">Jumlah Beli</th>
                                            <th style="text-align:center;">Sub Total</th>
                                            <th style="width:100px;text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12">
                                <dl class="row">
                                    <dt class="col-sm-3">Total</dt>
                                    <dd class="col-sm-9"><span id="total-numeric">0</span></dd>
                                </dl>
                            </div>

                            <div class="col-xs-12">
                                <!-- <a href="<?php echo base_url().'admin/pembeliankain/simpan_pembelian'?>" class="btn btn-primary btn-lg" id="button-save" disabled="disabled"><span class="fa fa-save"></span> Simpan</a> -->
                                <button href="<?php echo base_url().'admin/pembeliankain/simpan_pembelian'?>" class="btn btn-primary btn-lg" id="button-save" disabled="disabled"><span class="fa fa-save"></span> Simpan</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============ KAIN =============== -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Daftar Kain</h3>
                </div>
                <div class="modal-body" style="overflow:scroll;height:400px;">

                    <table class="table table-bordered table-condensed" style="" id="table-find-product">
                        <thead>
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Kode Kain</th>
                                <th>Nama Kain</th>
                                <th>Warna Kain</th>
                                <th>Satuan</th>
                                <th>Perkiraan Harga</th>
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
                                <tr product-id="<?php echo $id;?>">
                                    <td style="text-align:center;">
                                        <?php echo $no;?>
                                    </td>
                                    <td>
                                        <?php echo $id;?>
                                    </td>
                                    <td>
                                        <?php echo $nm;?>
                                    </td>
                                    <td>
                                        <?php echo $warna;?>
                                    </td>
                                    <td>
                                        <?php echo $satuan;?>
                                    </td>
                                    <td style="text-align:right;">
                                        <?php echo 'Rp '.number_format($harga);?>
                                    </td>

                                    <td style="text-align:center;">
                                        <button class="btn btn-xs btn-info btn-select-product" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
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

    <div id="new-item-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Item Baru</h4>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Kode Produk</dt>
                        <dd class="col-sm-9"><span attr-product="kain_id"></span></dd>

                        <dt class="col-sm-3">Nama Kain</dt>
                        <dd class="col-sm-9"><span attr-product="kain_nama"></span></dd>

                        <dt class="col-sm-3">Warna</dt>
                        <dd class="col-sm-9"><span attr-product="warna_nama"></span></dd>

                        <dt class="col-sm-3">Satuan</dt>
                        <dd class="col-sm-9"><span attr-product="kain_satuan"></span></dd>

                        <dt class="col-sm-3">Perkiraan Harga</dt>
                        <dd class="col-sm-9"><span attr-product="kain_harga"></span></dd>
                    </dl>
                    <form action="javascript:void(0)">
                        <div class="form-group">
                            <label for="product_price">Harga</label>
                            <input type="text" class="form-control currency_format" id="product_price">
                        </div>
                        <div class="form-group">
                            <label for="product_quantity">Kuantitas</label>
                            <input type="number" class="form-control" id="product_quantity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-add-new-product">Tambah Produk</button>
                </div>
            </div>

        </div>
    </div>

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

            $('#timepicker').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#table-find-product').DataTable();
            
            $('.currency_format').priceFormat({
                    prefix: 'Rp ',
                    thousandsSeparator: '.',
                    centsLimit: 0
            });

            const state = {
                items: [],
                selected_product: {}
            };

            class TableManagement {
                constructor() {
                    this.body = [];
                    this.table = $('table#items');
                    this.tbody = this.table.find('tbody');
                }

                setItems( items = [], autoRender = true ){
                    this.body = items
                    if (autoRender) {
                        this.renderBody();
                    }
                }

                renderBody() {
                    this.tbody.html(null);

                    let rows = '';

                    $.each(this.body, function(index, val) {
                        let row = `<tr item-id="${val.bb_produk_id}">` ;

                        row += `<td>${val.bb_bahanbaku_id}</td>`;
                        row += `<td>${val.kain_nama}</td>`;
                        row += `<td style="text-align:center;">${val.warna_nama}</td>`;
                        row += `<td style="text-align:center;">${val.kain_satuan}</td>`;
                        row += `<td style="text-align:center;">${val.kain_harga}</td>`;
                        row += `<td style="text-align:center;"><input type="number" id="product_quantity">`;
                        row += `<td style="text-align:center;">${val.d_rencana_total}</td>`;
                        row += `<td style="width:100px;text-align:center;">
                                <button class="btn btn-success btn-sm btn-delete">Batal</button></td>`;
                        row += '</tr>\n';

                        rows += row ;

                    });

                    this.tbody.html(rows);
                }

                empty() {
                    this.tbody.html(null);
                    this.tbody.html('<tr><td colspan="9" style="text-align:center; padding-top: 10px; padding-bottom: 10px;"><strong style="color: #DDD">Kosong</strong></td></tr>');
                }

            }

            let Table = new TableManagement();
            Table.empty();

            $('table#items').delegate('.btn-delete', 'click', function(event) {
                const item_id = $(this).parents('tr[item-id]').attr('item-id');

                $.ajax({
                    url: '<?= base_url('rest/purchase/plan/delete-item') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        plan_item: item_id,
                        baju_code: $("#baju_code").val(),
                    },
                })
                .done(function(response) {
                    if ("success" in response) {
                        let {data} = response.success;
                        Table.setItems(data.items);
                        $('#total-numeric').html(data.rencana_total)
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });

            $("#baju_code").on('change', function () {
                const this_picker = $(this);

                const value = this_picker.val();

                $.ajax({
                    url: '<?= base_url('rest/ProductionPlan/fetch_plan') ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {baju_code: value},
                })
                .done(function(response) {
                    if ("success" in response) {
                        let {data} = response.success;
                        $('#total-numeric').html(data.rencana_total)
                        Table.setItems(data.items);

                        $('#button-save').removeAttr('disabled');
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });

            $('#new-item-modal').on('hide.bs.modal', function () {
                $('#product_quantity').val(0);
                $('#product_price').val(0);
            })

            $('#add-new-item').click(function(event) {
                $('#new-item-modal').modal('show');
            });

            $("#product_code").on('change', function () {
                const body = {
                    product_code:$(this).val()
                };

                $.ajax({
                    type: "GET",
                    url: "<?= base_url('rest/purchase/plan/get-product')?>",
                    data: body,
                    dataType: "json",
                    success: function (response) {
                        if ("success" in response) {
                            let {data} = response.success;

                            state.selected_product = data;

                            $('[attr-product]').each(function(index, el) {
                                $(this).html(data[$(this).attr('attr-product')]);
                            });
                            $('#new-item-modal').modal('show');
                        }
                    }
                });
            });

            $('#btn-add-new-product').click(function(event) {

                $(this).attr('disabled', 'disabled');

                state.selected_product['quantity'] = $('#product_quantity').val();
                state.selected_product['price'] = $('#product_price').unmask();

                $.ajax({
                    url: '<?= base_url('rest/purchase/plan/add-product') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product: state.selected_product,
                        plan_id: $("#plan_code").val()
                    },
                })
                .done(function(response) {
                    if ("success" in response) {
                        let {data} = response.success;
                        Table.setItems(data.items);
                        $('#total-numeric').html(data.rencana_total);

                        $('#new-item-modal').modal('hide');
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    $('#btn-add-new-product').removeAttr('disabled');
                });
                
            });

            $('.btn-select-product').click(function(event) {
                const prodcut_id = $(this).parents('tr').attr('product-id');
                $("#product_code").val(prodcut_id);
                $("#product_code").trigger('change');
                $('#largeModal').modal('hide');
            });

        });

        $('#button-save').on('click', function(event) {
            event.preventDefault();
            
            $.ajax({
                url: "<?= base_url('rest/purchase/plan/save') ?>",
                type: 'POST',
                dataType: 'json',
                data: $('#general-form').serialize(),
            })
            .done(function(r) {
                if ("success" in r) {
                    alert('Berhasil Disimpan!!');
                    window.location.replace("<?= base_url('admin/pembeliankain') ?>")
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            

        });
        
    </script>

<?php 
	$this->load->view('admin/templates/v_footer');
?>