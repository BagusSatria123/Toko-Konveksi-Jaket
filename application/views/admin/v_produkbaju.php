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
            <li class="active">Data Produk Baju</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Produk Baju</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">

                    <div class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Produk Baju</a></div>

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:50px;">No</th>
                                        <th>Nama Produk</th>
                                        <th>Gambar Produk</th>
                                        <th>Warna Produk</th>
                                        <th style="width:300px;text-align:center;">Deskripsi Produk</th>
                                        <th style="width:120px;text-align:center;">Harga</th>
                                        <th style="text-align:center;">Stok</th>
                                        <th style="width:140px;text-align:center;">Aksi</th>
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
                                        $deskripsi = $a['produk_deskripsi'];
                                        $harga = $a['produk_harga'];
                                        $stok = $a['produk_stok'];
                                        $gambar = $a['gambar'];
                                    ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no; ?></td>
                                            <td><?php echo $nm; ?></td>
                                            <td style="text-align:center;"><img src="<?php echo base_url('upload/product/' . $gambar) ?>" width="100" /></td>
                                            <td><?php echo $warna; ?></td>
                                            <td><?php echo $deskripsi; ?></td>
                                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($harga); ?></td>
                                            <td style="text-align:center;"><?php echo $stok; ?></td>

                                            <td style="text-align:center;">
                                                <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit">Edit</a>
                                                <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id ?>" data-toggle="modal" title="Hapus">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->

    <!-- ============ MODAL ADD =============== -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Produk Baju</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/produkbaju/tambah_produkbaju' ?>" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Produk</label>
                            <div class="col-xs-9">
                                <input name="nama" class="form-control" type="text" placeholder="Input Nama Produk.." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Warna Produk</label>
                            <div class="col-xs-9">
                                <input name="warna" class="form-control" type="text" placeholder="Input Warna Produk.." style="width:280px;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Deskripsi Produk</label>
                            <div class="col-xs-9">
                                <input name="deskripsi" class="form-control" type="text" placeholder="Input Deskripsi Produk.." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga</label>
                            <div class="col-xs-9">
                                <input name="harga" class="form-control" type="text" placeholder="Input Harga..." style="width:280px;" required>
                            </div>
                        </div>

                        <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="text" placeholder="Input stok..." style="width:280px;" readonly>
                        </div>
                    </div>-->

                        <div class="form-group">
                            <label class="control-label col-xs-3">Gambar Produk</label>
                            <div class="col-xs-9">
                                <input type="file" name="gambar" class="form-control" placeholder="Input stok..." style="width:280px;">
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
        $id = $a['produk_id'];
        $nm = $a['produk_nama'];
        $warna = $a['produk_warna'];
        $deskripsi = $a['produk_deskripsi'];
        $harga = $a['produk_harga'];
        $stok = $a['produk_stok'];
        $gambar = $a['gambar'];
    ?>
        <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Produk Baju</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/produkbaju/edit' ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input name="id" type="hidden" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Produk</label>
                                <div class="col-xs-9">
                                    <input name="nama" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Input Nama..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Warna Produk</label>
                                <div class="col-xs-9">
                                    <input name="warna" class="form-control" type="text" value="<?php echo $warna; ?>" placeholder="Input warna..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Deskripsi Produk</label>
                                <div class="col-xs-9">
                                    <input name="deskripsi" class="form-control" type="text" value="<?php echo $deskripsi; ?>" placeholder="Input Deskripsi Produk.." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga</label>
                                <div class="col-xs-9">
                                    <input name="harga" class="form-control" type="text" value="<?php echo $harga; ?>" placeholder="Input Harga..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Stok</label>
                                <div class="col-xs-9">
                                    <input name="stok" class="form-control" type="text" value="<?php echo $stok; ?>" placeholder="Input Stok..." style="width:280px;" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Gambar Produk</label>
                                <div class="col-xs-9">
                                    <input type="file" name="gambar" class="form-control" placeholder="Input stok..." style="width:280px;">
                                    <input type="hidden" name="old_image" value="<?php echo $gambar; ?>">
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
        $id = $a['produk_id'];
        $nm = $a['produk_nama'];
        $warna = $a['produk_warna'];
        $deskripsi = $a['produk_deskripsi'];
        $harga = $a['produk_harga'];
        $stok = $a['produk_stok'];
        $gambar = $a['gambar'];
    ?>
        <div id="modalHapusPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Produk Baju</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/produkbaju/hapus_produkbaju' ?>">
                        <div class="modal-body">
                            <p>Apakah anda yakin akan menghapus Produk <b><?php echo $nm; ?></b> ?</p>
                            <input name="kodebaju" type="hidden" value="<?php echo $id; ?>">
                            <input name="gambar" type="hidden" value="<?php echo $gambar; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
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