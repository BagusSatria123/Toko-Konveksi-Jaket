<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>laporan Stok Produk Baju</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
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

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;">
                    <center>
                        <h4>LAPORAN STOK PRODUK BAJU</h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <?php
            $urut = 0;
            $nomor = 0;
            $group = '-';
            foreach ($data->result_array() as $d) {
                $nomor++;
                $urut++;
                if ($group == '-' || $group != $d['produk_nama']) {
                    $kat = $d['produk_nama'];

                    if ($group != '-')
                        echo "</table><br>";
                    echo "<table align='center' width='900px;' border='1'>";
                    echo "<tr><td colspan='6'><b>Nama Produk: $kat</b></td> </tr>";
                    echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Produk</td>
    <td width='25%' align='center'>Nama Produk</td>
	<td width='15%' align='center'>Warna Produk</td>
    <td width='30%' align='center'>Deskripsi Produk</td>
    <td width='30%' align='center'>Stok</td>
    
    </tr>";
                    $nomor = 1;
                }
                $group = $d['produk_nama'];
                if ($urut == 500) {
                    $nomor = 0;
                    echo "<div class='pagebreak'> </div>";
                }
            ?>
                <tr>
                    <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                    <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['produk_id']; ?></td>
                    <td style="vertical-align:center;padding-left:5px;"><?php echo $d['produk_nama']; ?></td>
                    <td style="vertical-align:center;padding-left:5px;"><?php echo $d['produk_warna']; ?></td>
                    <td style="vertical-align:center;text-align:left;"><?php echo $d['produk_deskripsi']; ?></td>
                    <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['produk_stok']; ?></td>
                </tr>


            <?php
            }
            ?>
        </table>

        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
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
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
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