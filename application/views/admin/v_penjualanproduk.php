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
            <li class="active">Penjualan Jaket</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penjualan Jaket</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">

                    Input Penjualan Baju
                    <div class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#largeModal"><span class="fa fa-search"></span> Cari Produk Baju</a></div>

                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">


                        <form action="<?php echo base_url() . 'admin/penjualanproduk/add_to_cart' ?>" method="post">
                            <table style="font-size:12px;">
                                <tr>
                                    <th>Kode Baju</th>
                                </tr>
                                <tr>
                                    <th><input type="text" name="kode_produk" id="kode_produk" class="form-control input-sm"></th>
                                </tr>
                                <div id="detail_produk" style="position:absolute;">
                                </div>
                            </table>
                        </form>
                        <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                            <thead>
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th style="text-align:center;">Warna Produk</th>
                                    <th style="text-align:center;">Harga(Rp)</th>
                                    <th style="text-align:center;">Diskon(Rp)</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:center;">Sub Total</th>
                                    <th style="width:100px;text-align:center;">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['name']; ?></td>
                                        <td style="text-align:center;"><?= $items['warna']; ?></td>
                                        <td style="text-align:right;"><?php echo number_format($items['amount']); ?></td>
                                        <td style="text-align:right;"><?php echo number_format($items['disc']); ?></td>
                                        <td style="text-align:center;"><?php echo number_format($items['qty']); ?></td>
                                        <td style="text-align:right;"><?php echo number_format($items['subtotal']); ?></td>

                                        <td style="text-align:center;"><a href="<?php echo base_url() . 'admin/penjualanproduk/remove/' . $items['rowid']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <form action="<?php echo base_url() . 'admin/penjualanproduk/simpan_penjualan' ?>" method="post">
                            <table style="font-size:12px;">
                                <tr>
                                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-save"></span> Simpan</button></td>
                                    <th style="width:140px;">Total Belanja(Rp)</th>
                                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total()); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total(); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                                </tr>
                                <tr>
                                    <th>Tunai(Rp)</th>
                                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th>Kembalian(Rp)</th>
                                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                                </tr>

                            </table>
                        </form>

                    </div>
                    <!-- /.row -->
                    <!-- ============ PRODUK BAJU =============== -->
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Daftar Produk Baju</h3>
                                </div>
                                <div class="modal-body" style="overflow:scroll;height:400px;">

                                    <table class="table table-bordered table-condensed" id="">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;width:40px;">No</th>
                                                <th style="width:120px;">Kode Produk</th>
                                                <th style="width:240px;">Nama Produk</th>
                                                <th>Warna</th>
                                                <th style="width:100px;">Harga</th>
                                                <th>Stok</th>
                                                <th style="width:100px;text-align:center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($data->result_array() as $a) :
                                                $no++;
                                                $id = $a['produk_id'];
                                                $nm = $a['produk_nama'];
                                                $warna = $a['produk_warna'];
                                                $harga = $a['produk_harga'];
                                                $stok = $a['produk_stok'];
                                            ?>
                                                <tr>
                                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $nm; ?></td>
                                                    <td><?php echo $warna; ?></td>
                                                    <td style="text-align:right;"><?php echo 'Rp ' . number_format($harga); ?></td>
                                                    <td style="text-align:center;"><?php echo $stok; ?></td>

                                                    <td style="text-align:center;">
                                                        <form action="<?php echo base_url() . 'admin/penjualanproduk/add_to_cart' ?>" method="post">
                                                            <input type="hidden" name="kode_produk" value="<?php echo $id ?>">
                                                            <input type="hidden" name="namaproduk" value="<?php echo $nm; ?>">
                                                            <input type="hidden" name="warna" value="<?php echo $warna; ?>">
                                                            <input type="hidden" name="stok" value="<?php echo $stok; ?>">
                                                            <input type="hidden" name="harga" value="<?php echo number_format($harga); ?>">
                                                            <input type="hidden" name="diskon" value="0">
                                                            <input type="hidden" name="jumlah" value="1" required>
                                                            <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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


                </div>
            </div>

            <?php
            $this->load->view('admin/templates/v_footer');
            ?>

            <!-- /.container -->


            <script type="text/javascript">
                $(function() {
                    $('#jml_uang').on("input", function() {
                        var total = $('#total').val();
                        var jumuang = $('#jml_uang').val();
                        var hsl = jumuang.replace(/[^\d]/g, "");
                        $('#jml_uang2').val(hsl);
                        $('#kembalian').val(hsl - total);
                    })

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#mydata').DataTable();
                });
            </script>
            <script type="text/javascript">
                $(function() {
                    $('.jml_uang').priceFormat({
                        prefix: '',
                        //centsSeparator: '',
                        centsLimit: 0,
                        thousandsSeparator: ','
                    });
                    $('#jml_uang2').priceFormat({
                        prefix: '',
                        //centsSeparator: '',
                        centsLimit: 0,
                        thousandsSeparator: ''
                    });
                    $('#kembalian').priceFormat({
                        prefix: '',
                        //centsSeparator: '',
                        centsLimit: 0,
                        thousandsSeparator: ','
                    });
                    $('.harjul').priceFormat({
                        prefix: '',
                        //centsSeparator: '',
                        centsLimit: 0,
                        thousandsSeparator: ','
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    //Ajax kabupaten/kota insert
                    $("#kode_produk").focus();
                    $("#kode_produk").on("input", function() {
                        var kodeproduk = {
                            kode_produk: $(this).val()
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'admin/penjualanproduk/get_produk'; ?>",
                            data: kodeproduk,
                            success: function(msg) {
                                $('#detail_produk').html(msg);
                            }
                        });
                    });

                    $("#kode_produk").keypress(function(e) {
                        if (e.which == 13) {
                            $("#jumlah").focus();
                        }
                    });
                });
            </script>


            </body>

            </html>