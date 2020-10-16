<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Produksi Pertahun</title>
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
<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PRODUKSI TAHUN <?php echo $b['tahun'];?></h4></center><br/></td>
</tr>                     
</table>


<table border="1" align="center" style="width:900px;margin-bottom:0px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['bulan']){
        $bulan=$d['bulan'];
        $query=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,SUM(hasil_jumlah) as total FROM t_rencanabaru WHERE DATE_FORMAT(tgl_selesai,'%M %Y')='$bulan'");
        $t=$query->row_array();
        $tots=$t['total'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='6'><b>Bulan: $bulan</b></td> <td style='text-align:right;'><b>Total Produksi:</b></td><td style='text-align:right;'><b>".number_format($tots)." pcs</b></td></tr>";
echo "<tr style='background-color:#ccc;'>
	<td width='5%' align='center'>Nomor</td>
    <td width='8%' align='center'>No Produksi</td>
    <td width='10%' align='center'>Nama Produk</td>
	<td width='10%' align='center'>Warna Produk</td>
	<td width='20%' align='center'>Deskripsi Produk</td>
    <td width='10%' align='center'>Tanggal Mulai</td>
    <td width='10%' align='center'>Tanggal Selesai</td>
    <td width='10%' align='center'>Hasil Jumlah Produksi</td>
    </tr>";
$nomor=1;
    }
    $group=$d['bulan'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;text-align:center;"><?php echo $d['rencana_kode']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['produk_nama']; ?></td>
				<td style="vertical-align:top;padding-left:5px;"><?php echo $d['produk_warna']; ?></td>
				<td style="vertical-align:top;padding-left:5px;"><?php echo $d['produk_deskripsi']; ?></td>
				<td style="vertical-align:top;padding-left:5px;"><?php echo $d['tgl_mulai']; ?></td> 				
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['tgl_selesai']; ?></td>
				<td style="vertical-align:top;padding-left:5px;"><?php echo $d['hasil_jumlah']; ?></td>
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