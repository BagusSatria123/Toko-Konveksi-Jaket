<?php
$a = $this->session->userdata('akses');
$u = $this->session->userdata('user');
error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Paramount Jacket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="<?php echo base_url() ?>assets/css1/bootstrap.css" rel='stylesheet' />
    <link href="<?php echo base_url() ?>assets/css1/style.css" rel='stylesheet' />
    <link href="<?php echo base_url() ?>assets/css1/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<!-- header -->
<header>
    <nav class="mnu navbar-light">
        <div class="logo" id="logo">
            <h2><a href="<?php echo base_url() ?>">Paramount</a></h2>
        </div>
        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="drop">
        <ul class="menu">
            <li class="mr-lg-4 mr-3">
                <a href="<?php echo base_url() ?>">Home</a></li>

            <li class="mr-lg-4 mr-3">
                <a href="<?php echo base_url() ?>About">About</a></li>

            <li class="mr-lg-4 mr-3">
                <!-- First Tier Culture -->
                <label for="drop-2" class="toggle">Menu <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                <a href="#">Menu <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2" />
                <ul>
                    <li><a href="<?php echo base_url() ?>Pembelian">Pembelian</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>Pemesanan">Pemesanan</a>
                    </li>
                </ul>
            </li>
            <li class="mr-lg-4 mr-3">
                <a href="<?php echo base_url() ?>Gallery">Gallery</a></li>
            <li class="mr-lg-4 mr-3">
                <a href="<?php echo base_url() ?>Contact">Contact</a></li>
            <?php
            if ($u) {
            ?>
                <li>
                    <?php $keranjang = 'Keranjang : ' . $this->cart->total_items() . ' items' ?>
                    <a><?php echo anchor('KeranjangBelanja', $keranjang) ?></a>
                </li>

            <?php
            } else {
            ?>
                <li class="mr-lg-4 mr-3">
                <?php
            }
                ?>

                <?php
                if ($u) {
                ?>
                <li class="mr-lg-4 mr-3">
                    <a href="<?php echo base_url() ?>administrator/logout">LogOut</a></li>
            <?php
                } else {
            ?>
                <li class="mr-lg-4 mr-3">
                    <a href="<?php echo base_url() ?>administrator">Login</a></li>
            <?php
                }
            ?>
        </ul>


    </nav>
</header>
<!-- //header -->