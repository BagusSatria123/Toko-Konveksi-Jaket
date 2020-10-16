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
                <h2 class="tittle text-center"> Pembayaran</h2> <br>

                <div class="btn btn-sm btn-success">
                    <?php $grand_total = 0;
                    if ($keranjang = $this->cart->contents()) {
                        foreach ($keranjang as $item) {
                            $grand_total = $grand_total + $item['subtotal'];
                        }
                        echo "<h4>Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');
                    ?>
                </div><br><br>
                <form method="POST" action="<?php echo base_url() ?>proses_pembayaran">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control">
                            <option>JNE</option>
                            <option>GOJEK</option>
                            <OPTION>GRAB</OPTION>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Bank </label>
                        <select class="form-control">
                            <option>BCA - 1234565432</option>
                            <option>OVO - 123455432</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>


                </form>
            <?php
                    } else  echo "<h4>Keranjang Belanja Anda masih kosong !"
            ?>
            </div>


            <div class="col-md-2"></div>
        </div>


        </div>

        <div class="row mt-lg-5 mt-md-4 mt-4">
        </div>
        </div>
        </div>
    </section>