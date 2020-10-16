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
                <h2 class="tittle text-center"> Pemesanan</h2>

                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="<?php echo base_url('pemesanan/tambah_pesanan') ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type=" text" name="nama" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor Telp</label>
                                        <input type="text" name="no_telp" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Produk</label>
                                        <select name="produk" class="form-control">
                                            <option value="">----------Pilih Produk----------</option>
                                            <option value="1">T-shirt</option>
                                            <option value="2">Jaket</option>
                                            <option value="3">Almamater</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Keperluan Produk</label>
                                        <input type="text" name="kep_produk" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ukuran</label>
                                        <input type="text" name="ukuran" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Gambar Desain</label>
                                        <div class="col-xs-9">
                                            <input type="file" name="gambar" class="form-control" placeholder="Input...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Pesan</label>
                                        <input type="text" name="pesan" class="form-control">
                                    </div>

                                    <button type="reset" class="btn btn-danger mt-4">Reset</button>
                                    <button class="btn btn-primary mt-4">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-lg-5 mt-md-4 mt-4">
                </div>
            </div>
        </div>
    </section>