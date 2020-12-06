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
            <li class="active">Pembelian Masuk</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pembelian Masuk</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Pembayaran (Beli) Masuk

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:40px;">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat Lengkap</th>
                                        <th>No Telp</th>
                                        <th>Jasa Pengiriman</th>
                                        <th>Pilih Bank</th>
                                        <th>Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $a) : ?>
                                        <tr>
                                            <!-- <?php
                                                    //if ($a->JasaPengiriman == "1") {
                                                    //    $hasil = "JNE";
                                                    //} elseif ($a->JasaPengiriman == "2") {
                                                    //    $hasil = "GOJEK";
                                                    // } elseif ($a->JasaPengiriman == "3") {
                                                    // $hasil = "GRAB";
                                                    // }
                                                    ?> -->
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a->NamaLengkap ?></td>
                                            <td><?php echo $a->AlamatLengkap ?></td>
                                            <td><?php echo $a->NoTelp ?></td>
                                            <td><?php echo $a->JasaPengiriman ?></td>
                                            <td><?php echo $a->PilihBank ?></td>
                                            <td><?php echo $a->TglBayar ?></td>
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


</div>
<!--/.row-->