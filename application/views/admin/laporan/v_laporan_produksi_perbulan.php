<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Produksi Perbulan</title>
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
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PRODUKSI PERBULAN</h4></center><br/></td>
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
        <th>Kode Produksi</th>
		<th>Nama Produk</th>
		<th>Warna Produk</th>
		<th>Deskripsi Produk</th>
        <th>Tanggal Mulai</th>
		<th>Tanggal Selesai</th>
		<th>Hasil Jumlah Produksi</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $noren=$i['rencana_kode'];
        $idprod=$i['r_produk_id'];
		$nmprod=$i['produk_nama'];
		$wrnprod=$i['produk_warna'];
		$dskprod=$i['produk_deskripsi'];
        $tgl_mulai=$i['tgl_mulai'];
		$tgl_selesai=$i['tgl_selesai'];
		$hasprod=$i['hasil_jumlah'];

?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $noren;?></td>
		<td style="text-align:center;"><?php echo $nmprod;?></td>
		<td style="text-align:center;"><?php echo $wrnprod;?></td>
		<td style="text-align:center;"><?php echo $dskprod;?></td>
        <td style="text-align:center;"><?php echo $tgl_mulai;?></td>
		<td style="text-align:center;"><?php echo $tgl_selesai;?></td>
		<td style="text-align:center;"><?php echo $hasprod;?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="7" style="text-align:center;"><b>Total Hasil Produksi Perbulan</b></td>
        <td style="text-align:center;"><b><?php echo $b['total']?></b></td>
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