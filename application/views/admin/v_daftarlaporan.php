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
            <li class="active">Daftar Laporan</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Laporan</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">

                    Daftar Laporan

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">

                        <table class="table table-bordered " id="">
                            <thead>
                                <tr>
                                    <th style="text-align:center;width:60px;">No</th>
                                    <th>Laporan</th>
                                    <th style="width:150px;text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td style="text-align:center;vertical-align:middle">1</td>
                                    <td style="vertical-align:middle;">Laporan Data Stok</td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'admin/daftarlaporan/laporan_stok_produk' ?>" target="_blank" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                                    </td>
                                </tr>
                                <!-- 					
					<tr>
                        <td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Laporan Pembelian Kain Periode</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_beli_periode" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>
					
					<tr>
                        <td style="text-align:center;vertical-align:middle">3</td>
                        <td style="vertical-align:middle;">Laporan Produksi Periode</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_produksi_periode" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>
					
					<tr>
                        <td style="text-align:center;vertical-align:middle">4</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Periode</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_penjualan_periode" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>		 -->

                                <!-- 	<tr>
                        <td style="text-align:center;vertical-align:middle">3</td>
                        <td style="vertical-align:middle;">Laporan Pembelian Kain Perbulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_beli_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>
					
					<tr>
                        <td style="text-align:center;vertical-align:middle">4</td>
                        <td style="vertical-align:middle;">Laporan Pembelian Kain Pertahun</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_beli_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr> 
					
					<tr>
                        <td style="text-align:center;vertical-align:middle">7</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Perbulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_penjualan_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>

                     <tr>
                        <td style="text-align:center;vertical-align:middle">8</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Pertahun</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-primary" href="#lap_penjualan_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

                <!-- ============ LAPORAN PEMBELIAN PERBULAN =============== -->
                <div class="modal fade" id="lap_beli_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_pembelian_perbulan' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Bulan</label>
                                        <div class="col-xs-9">
                                            <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                            <?php foreach ($jual_bln->result_array() as $k) {
                                                $bln = $k['bulan'];
                                            ?>
                                                <option><?php echo $bln; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PEMBELIAN PERTAHUN =============== -->
                <div class="modal fade" id="lap_beli_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_pembelian_pertahun' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Tahun</label>
                                        <div class="col-xs-9">
                                            <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                                            <?php foreach ($jual_thn->result_array() as $t) {
                                                $thn = $t['tahun'];
                                            ?>
                                                <option><?php echo $thn; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PRODUKSI PERBULAN =============== -->
                <div class="modal fade" id="lap_produksi_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_produksi_perbulan' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Bulan</label>
                                        <div class="col-xs-9">
                                            <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                            <?php foreach ($prod_bln->result_array() as $t) {
                                                $bln = $t['bulan'];
                                            ?>
                                                <option><?php echo $bln; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PRODUKSI PERTAHUN =============== -->
                <div class="modal fade" id="lap_produksi_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_produksi_pertahun' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Tahun</label>
                                        <div class="col-xs-9">
                                            <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                                            <?php foreach ($prod_thn->result_array() as $t) {
                                                $thn = $t['tahun'];
                                            ?>
                                                <option><?php echo $thn; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PENJUALAN PERBULAN =============== -->
                <div class="modal fade" id="lap_penjualan_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_penjualan_perbulan' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Bulan</label>
                                        <div class="col-xs-9">
                                            <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                            <?php foreach ($penjualan_bln->result_array() as $t) {
                                                $bln = $t['bulan'];
                                            ?>
                                                <option><?php echo $bln; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PENJUALAN PERTAHUN =============== -->
                <div class="modal fade" id="lap_penjualan_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_penjualan_pertahun' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Tahun</label>
                                        <div class="col-xs-9">
                                            <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                                            <?php foreach ($penjualan_thn->result_array() as $t) {
                                                $thn = $t['tahun'];
                                            ?>
                                                <option><?php echo $thn; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PEMBELIAN PERIODE =============== -->
                <div class="modal fade" id="lap_beli_periode" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Masukan Tanggal Pembelian</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_pembelian_periode' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Tanggal</label>
                                        <div class="col-xs-4">
                                            <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                        <div class="col-xs-1">
                                            <label class="control-label col-xs-1">_</label>
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PRODUKSI PERIODE =============== -->
                <div class="modal fade" id="lap_produksi_periode" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Masukan Tanggal Produksi</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_produksi_periode' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Tanggal</label>
                                        <div class="col-xs-4">
                                            <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                        <div class="col-xs-1">
                                            <label class="control-label col-xs-1">_</label>
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============ LAPORAN PENJUALAN PERIODE =============== -->
                <div class="modal fade" id="lap_penjualan_periode" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Masukan Tanggal Penjualan</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/daftarlaporan/laporan_penjualan_periode' ?>" target="_blank">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Tanggal</label>
                                        <div class="col-xs-4">
                                            <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                        <div class="col-xs-1">
                                            <label class="control-label col-xs-1">_</label>
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Mulai" style="width:190px;" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <!--END MODAL-->

                <hr>
            </div>
            <!-- /.container -->

            <script type="text/javascript">
                $(function() {
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
                $(document).ready(function() {
                    $('#mydata').DataTable();
                });
            </script>

            <?php
            $this->load->view('admin/templates/v_footer');
            ?>