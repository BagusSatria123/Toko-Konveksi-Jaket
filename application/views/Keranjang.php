<body>
    <!-- mian-content -->
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
            <div class="inner-sec py-lg-5 py-3">
                <h2 class="tittle text-center"> Keranjang Belanja</h2> <br>

                <div class="site-section ">
                    <div class="container">

                        <table class="table table-bordered table-striped table-hover">
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>

                            <?php
                            $no = 1;
                            foreach ($this->cart->contents() as $items) : ?>

                                <tr>
                                    <td align="center"><?php echo $no++ ?></td>
                                    <td><?php echo $items['name'] ?></td>
                                    <td align="center"><?php echo $items['qty'] ?></td>
                                    <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                                    <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>
                                </tr>


                            <?php endforeach; ?>

                            <tr>
                                <td colspan="4"></td>
                                <td align="right">Rp.<?php echo number_format($this->cart->total(), 0, ',', '.')  ?> </td>
                            </tr>
                        </table>

                        <div align="right">
                            <a href="<?php echo base_url('KeranjangBelanja/hapus_keranjang') ?>">
                                <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                            </a>
                            <a href="<?php echo base_url('KeranjangBelanja') ?>">
                                <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
                            </a>
                            <a href="<?php echo base_url('KeranjangBelanja/pembayaran') ?>">
                                <div class="btn btn-sm btn-success">Pembayaran</div>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="row mt-lg-5 mt-md-4 mt-4">
                </div>
            </div>
        </div>
    </section>