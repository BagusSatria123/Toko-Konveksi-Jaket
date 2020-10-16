<!-- <div class="container"> -->

<body>
    <?php if ($this->session->flashdata('flash-data')) : ?><?php endif; ?>
    <section class="mian-content">
        <!-- /header-top-->
        <div class="header-top">
            <!-- /banner-info-->
            <div class="banner-content text-center text-white">
                <h3 class="text-uppercase"> Konveksi</h3>
                <h3>Paramount Jacket</h3>

                <div class="banner-high-lights text-center">

                    <div class="ban-text text-center py-3">
                        <h5 class="ban-text">
                            Best Partner For Promotion Branding Identity</h5>
                        <p class="text-uppercase pb-2 text-white"> memesan - upload desain - bayar - kirim</h4>
                    </div>
                </div>
            </div>
            <!-- //banner-info-->
        </div>
        <!-- //header-top-->
    </section>

    <!--//testimonials-->
    <!-- /services -->
    <section class="banner-bottom py-lg-5 py-md-5 py-3" id="services">
        <div class="container">
            <div class="row middle-grids pt-lg-5">
                <div class="col-lg-3 about-in middle-grid-info text-center" style="display: block; margin: auto;">
                    <!-- JIKA INGIN MEMBUAT POP BOX AKTIF MAKA KETIK active diantara info dan text -->
                    <div class="card">
                        <div class="card-body">
                            <span class="fa fa-shopping-cart mb-2"></span>
                            <h5 class="card-title text-uppercase my-3">Pesan Produk</h5>
                            <p class="card-text">pesanan bisa berupa jaket, almamater, jas, kaos, hem, dll.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 about-in middle-grid-info text-center" style="display: block; margin: auto;">
                    <div class="card">
                        <div class="card-body">
                            <span class="fa fa-map-marker mb-2"></span>
                            <h5 class="card-title text-uppercase my-3">Lokasi Kami</h5>
                            <p class="card-text">Info dan lokasi dari tempat usaha kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //services -->
    <!-- choose -->
    <section class="choose py-5">
        <div class="container py-md-4 mt-md-3">
            <div class="row inner_w3l_agile_grids-1 ">
                <div class="col-lg-7 w3layouts_choose_left_grid1">
                    <div class="choose_top">
                        <h4 class="w3l_header text-white">Ada Pertanyaan?</h4>
                        <p class="text-white">ada pertanyaan mengenai produk, kerja sama, pengiriman, desain atau harga?
                            <br>
                            anda bisa bertanya melalui kontak kami dibawah ini</p>
                        <a href=" <?php echo base_url() ?>Contact" class="btn btn-primary mt-3">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="stat_w3l py-5">
        <div class="container">
            <div class="row py-lg-5 stats-con">
                <div class="col-sm-3 col-6 stats_info counter_grid">
                    <span class="fa fa-briefcase"></span>
                    <p class="counter">23</p>
                    <h4>Years of Experience</h4>
                </div>
                <div class="col-sm-3 col-6 stats_info counter_grid1">
                    <span class="fa fa-shopping-cart"></span>
                    <p class="counter">100</p>
                    <h4>Our Models</h4>
                </div>
                <div class="col-sm-3 col-6 stats_info counter_grid">
                    <span class="fa fa-smile-o"></span>
                    <p class="counter">110</p>
                    <h4>Our Customers</h4>
                </div>
                <div class="col-sm-3 col-6 stats_info counter_grid2">
                    <span class="fa fa-users"></span>
                    <p class="counter">300</p>
                    <h4>Clients</h4>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- </div> -->