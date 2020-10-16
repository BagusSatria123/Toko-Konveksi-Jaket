<section class="mian-content">
    <!-- /header-top-->
    <div class="header-top">
        <!-- /banner-info-->
        <div class="banner-content text-center text-white">
            <h3 class="text-uppercase"> Konveksi</h3>
            <h3>Paramount Jacket</h3>

            <div class="banner-high-lights text-center">

                <div class="ban-text text-center py-3">

                </div>
            </div>
        </div>
        <!-- //banner-info-->
    </div>
    <!-- //header-top-->
</section>
<section class="banner-bottom py-lg-5 py-md-5 py-3" id="feature">
    <div class="container">
        <center><?php echo $this->session->flashdata('msg'); ?></center>

        <div class="inner-sec py-lg-5 py-3">
            <h2 class="tittle text-center"> pembelian</h2>

            <div class="card">
                <div class="card-body">

                    <div class="row">

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
                                            $no = 1;
                                            foreach ($data as $a) : ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $a->produk_nama ?></td>
                                                    <td><img src="<?php echo base_url('upload/product/' . $a->gambar) ?>" width="100" /></td>
                                                    <td><?php echo $a->produk_warna ?></td>
                                                    <td><?php echo $a->produk_deskripsi ?></td>
                                                    <td><?php echo $a->produk_harga ?></td>
                                                    <td><?php echo $a->produk_stok ?></td>
                                                    <td><?php echo anchor('KeranjangBelanja/tambah_ke_keranjang/' . $a->produk_id, '<div class="btn btn-primary text-white px-2">Tambah Keranjang</div>') ?></td>
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

            <div class="row mt-lg-5 mt-md-4 mt-4">
            </div>
        </div>
    </div>
</section>