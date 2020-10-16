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
            <li class="active">Data Pengguna</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Pengguna</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">

                    <div class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Pengguna</a></div>

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:40px;">No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Hak Akses</th>
                                        <th style="width:140px;text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data->result_array() as $a) :
                                        $no++;
                                        $id = $a['user_id'];
                                        $nm = $a['user_nama'];
                                        $username = $a['user_username'];
                                        $password = $a['user_password'];
                                        $level = $a['user_level'];
                                    ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no; ?></td>
                                            <td><?php echo $nm; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $password; ?></td>
                                            <td><?php if ($level == '1') : ?>
                                                    <option value="1" selected>Admin</option>
                                                <?php elseif ($level == '2') : ?>
                                                    <option value="2" selected>Pemilik</option>
                                                <?php else : ?>
                                                    <option value="3" selected>Pembeli</option>
                                                <?php endif; ?>
                                            </td>



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
                    <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pengguna/tambah_pengguna' ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama</label>
                            <div class="col-xs-9">
                                <input name="nama" class="form-control" type="text" placeholder="Input Nama..." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Username</label>
                            <div class="col-xs-9">
                                <input name="username" class="form-control" type="text" placeholder="Input Username..." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Password</label>
                            <div class="col-xs-9">
                                <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Ulangi Password</label>
                            <div class="col-xs-9">
                                <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Hak Akses</label>
                            <div class="col-xs-9">
                                <select name="level" class="form-control" style="width:280px;" required>
                                    <option value="1">Admin</option>
                                    <option value="2">Pemilik</option>
                                    <option value="3">pembeli</option>
                                </select>
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
        $id = $a['user_id'];
        $nm = $a['user_nama'];
        $username = $a['user_username'];
        $password = $a['user_password'];
        $level = $a['user_level'];
    ?>
        <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pengguna/edit_pengguna' ?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama</label>
                                <div class="col-xs-9">
                                    <input name="nama" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Input Nama..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Username</label>
                                <div class="col-xs-9">
                                    <input name="username" class="form-control" type="text" value="<?php echo $username; ?>" placeholder="Input Username..." style="width:280px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Password</label>
                                <div class="col-xs-9">
                                    <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Ulangi Password</label>
                                <div class="col-xs-9">
                                    <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Hak Akses</label>
                                <div class="col-xs-9">
                                    <select name="level" class="form-control" style="width:280px;" required>
                                        <?php if ($level == '1') : ?>
                                            <option value="1" selected>Admin</option>
                                            <option value="2">Pemilik</option>
                                            <option value="3">Pembeli</option>
                                        <?php elseif ($level == '2') : ?>
                                            <option value="1">Admin</option>
                                            <option value="2" selected>Pemilik</option>
                                            <option value="3">Pembeli</option>
                                        <?php else : ?>
                                            <option value="1">Admin</option>
                                            <option value="2">Pemilik</option>
                                            <option value="3" selected>Pembeli</option>
                                        <?php endif; ?>
                                    </select>
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
        $id = $a['user_id'];
        $nm = $a['user_nama'];
        $username = $a['user_username'];
        $password = $a['user_password'];
        $level = $a['user_level'];
    ?>
        <div id="modalHapusPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pengguna/nonaktifkan' ?>">
                        <div class="modal-body">
                            <p>Apakah anda yakin akan menghapus pengguna <b><?php echo $nm; ?></b> ?</p>
                            <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
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