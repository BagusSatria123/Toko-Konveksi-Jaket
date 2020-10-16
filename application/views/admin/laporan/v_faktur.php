<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Faktur Penjualan Produk</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td>
                    <center><img src="<?php echo base_url() . '' ?>" style="width:150px;" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;">
                    <center><br>Paramount Composite Product<br>
                        JL. MT Haryono No. 986<br>
                        Telp. 0815528316</center><br>
            </tr>
        </table>

        <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>

            </tr>

        </table>
        <?php
        $b = $data->row_array();
        ?>
        <table border="0" align="center" style="width:700px;border:none;margin-bottom:5px;">
            <tr>
                <th style="text-align:left; width:90px;">No Faktur</th>
                <th style="text-align:left;">: <?php echo $b['jual_nofak']; ?></th>

            </tr>
            <tr>
                <th style="text-align:left;">Tanggal</th>
                <th style="text-align:left;">: <?php echo $b['jual_tanggal']; ?></th>

            </tr>
        </table>

        <table border="1" align="center" style="width:700px;margin-bottom:10px;">
            <thead>

                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Produk</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Jumlah Beli</th>
                    <th>Diskon</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) {
                    $no++;

                    $nabar = $i['d_jual_produk_nama'];
                    $warna = $i['d_jual_produk_warna'];

                    $harga = $i['d_jual_produk_harga'];
                    $qty = $i['d_jual_qty'];
                    $diskon = $i['d_jual_diskon'];
                    $total = $i['d_jual_total'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:left;"><?php echo $nabar; ?></td>
                        <td style="text-align:center;"><?php echo $warna; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harga); ?></td>
                        <td style="text-align:center;"><?php echo $qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($diskon); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($total); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="6" style="text-align:center;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['jual_total']); ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table border="0" align="right" style="width:485px;border:none;">
            <tr>
                <th style="text-align:left; width:90px;">Total</th>
                <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_total']) . ',-'; ?></th>
            </tr>
            <tr>
                <th style="text-align:left;">Tunai</th>
                <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_bayar']) . ',-'; ?></th>
            </tr>
            <tr>
                <th style="text-align:left;">Kembalian</th>
                <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_kembalian']) . ',-'; ?></th>
            </tr>
        </table>
        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:700px; border:none;margin-top:100px;margin-bottom:20px;">
            <tr>
                <td align="right">Malang, <?php echo date('d-M-Y') ?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( Agsal Ae )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>