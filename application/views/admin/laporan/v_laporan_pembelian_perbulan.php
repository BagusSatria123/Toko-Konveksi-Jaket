<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Pembelian Perbulan</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <td><center><img src="<?php echo base_url().'assets/img/silvafashion.jpg'?>" style="width:150px;"/></td>
</tr>
<tr>
<td colspan="2" style="width:800px;paddin-left:20px;"><center><br>Silva Fashion<br>
JL. Nyengseret No. 44/94<br>
Telp. 085221101680</center><br>
</tr>

</table>


<?php 
    $b=$jml->row_array();
?>

<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PEMBELIAN KAIN PERBULAN</h4></center><br/></td>
</tr>                     


<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11" style="text-align:left;">Bulan : <?php echo $b['bulan'];?></th>
</tr>
    <tr style='background-color:#ccc;'>
        <th style="width:50px;">No</th>
        <th>No Faktur</th>
        <th>Tanggal</th>
        <th>Kode Kain</th>
		<th>Nama Kain</th>
		<th>Warna Kain</th>
		<th>Satuan Kain</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['beli_nofak'];
        $tgl=$i['beli_tanggal'];
        $kodekain=$i['d_beli_kain_id'];
		$namakain=$i['d_beli_kain_nama'];
		$warna=$i['d_beli_kain_warna'];
		$satuan=$i['d_beli_kain_satuan'];
        
        
        $harga=$i['d_beli_harga'];
        $jumlah=$i['d_beli_jumlah'];
        $total=$i['d_beli_total'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $nofak;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:center;"><?php echo $kodekain;?></td>
		<td style="text-align:center;"><?php echo $namakain;?></td>
		<td style="text-align:center;"><?php echo $warna;?></td>
		<td style="text-align:center;"><?php echo $satuan;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
        <td style="text-align:center;"><?php echo $jumlah;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="9" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['total']);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Bandung, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( H. Ismail )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>