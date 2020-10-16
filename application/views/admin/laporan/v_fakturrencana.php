<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Daftar Kebutuhan Bahan Baku</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <td><center><img src="<?php echo base_url().'assets/img/silvafashion.jpg'?>" style="width:150px;"/></td>
</tr>
<tr>
<td colspan="2" style="width:800px;paddin-left:20px;"><center><br>Silva Fashion<br>
JL. Nyengseret No. 44/94<br>
Telp. 085221101680</center><br>
</tr>
</table>

<table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    
</tr>
                       
</table>

<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>DAFTAR KEBUTUHAN BAHAN BAKU</h4></center><br/></td>
</tr> 
<?php 
    $b=$data->row_array();
?>
<table border="0" align="center" style="width:700px;border:none;margin-bottom:10px;">
        <tr>
            <th style="text-align:left;width:130;">Kode Rencana</th>
            <th style="text-align:left;">: <?php echo $b['rencana_kode'];?></th>
            
        </tr>
		<tr>
            <th style="text-align:left; width:90px;">Tujuan Produksi</th>
            <th style="text-align:left;">: <?php echo $b['produk_nama'];?></th>
            
        </tr>
        <tr>
            <th style="text-align:left;">Tanggal Mulai</th>
            <th style="text-align:left;">: <?php echo $b['tgl_mulai'];?></th>
        </tr>
		<tr>
            <th style="text-align:left;">Rencana Jumlah</th>
            <th style="text-align:left;">: <?php echo $b['rencana_jumlah'];?></th>
        </tr>
		<tr>
            <th style="text-align:left;">Rencana Selesai</th>
            <th style="text-align:left;">: <?php echo $b['perkiraan_selesai'];?></th>
        </tr>
		<tr>
            <th style="text-align:left;">Catatan</th>
            <th style="text-align:left;">: <?php echo $b['keterangan'];?></th>
        </tr>
</table>

<table border="1" align="center" style="width:700px;margin-bottom:10px;">
<thead>

    <tr>
        <th style="width:50px;">No</th>
		<th>Kode Bahan Baku</th>
        <th>Nama Bahan Baku yang Dibutuhkan</th>
        <th>Warna</th>
		<th>Satuan</th>
		<th>Jumlah yang Dibutuhkan</th>
        <th>Perkiraan Harga</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        
		$kodkai=$i['d_rencana_kain_id'];
        $nabar=$i['d_rencana_kain_nama'];
        $warna=$i['d_rencana_kain_warna'];
        $satuan=$i['d_rencana_kain_satuan'];
        $harga=$i['d_rencana_harga'];
        $qty=$i['d_rencana_jumlah'];
        $total=$i['d_rencana_total'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
		<td style="text-align:center;"><?php echo $kodkai;?></td>
        <td style="text-align:left;"><?php echo $nabar;?></td>
        <td style="text-align:center;"><?php echo $warna;?></td>
		<td style="text-align:center;"><?php echo $satuan;?></td>
		<td style="text-align:center;"><?php echo $qty;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="7" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['rencana_total']);?></b></td>
    </tr>
</tfoot>
</table>
<table border="0" align="right" style="width:500px;border:none;">
        <tr>
            <th style="text-align:left; width:90px;">Perkiraan Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['rencana_total']).',-';?></th>
        </tr>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:700px; border:none;margin-top:100px;margin-bottom:20px;">
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
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
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