<!-- Navigation -->
<?php
$this->load->view('admin/templates/v_header');
$this->load->view('admin/templates/v_sidebar');
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="https://localhost/konveksi/welcome">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Pemesanan Masuk</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pemesanan Masuk</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">
                    Update Pemesanan Masuk

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:40px;">No</th>
                                        <th>Nama</th>
                                        <th>No Telephone</th>
                                        <th>Alamat</th>
                                        <th>Kep_Produk</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                        <th>Gambar</th>
                                        <th>Pesan</th>
                                        <th style="width:200px;text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $a) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a->nama ?></td>
                                            <td><?php echo $a->no_telp ?></td>
                                            <td><?php echo $a->alamat ?></td>
                                            <td><?php echo $a->kep_produk ?></td>
                                            <td><?php echo $a->ukuran ?></td>
                                            <td><?php echo $a->jumlah ?></td>
                                            <td><img src="<?php echo base_url('upload/product/' . $a->gambar) ?>" width="100" /></td>
                                            <td><?php echo $a->pesan ?></td>
                                            <td style="text-align:center;">
                                                <a class="btn btn-xs btn-warning" href="#<?php echo $a->id_Pemesanan ?>" data-toggle="modal" title="Edit">Edit</a>
                                                <a class="btn btn-xs btn-danger" href="#<?php echo $a->id_Pemesanan ?>" data-toggle="modal" title="Hapus">Hapus</a>
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