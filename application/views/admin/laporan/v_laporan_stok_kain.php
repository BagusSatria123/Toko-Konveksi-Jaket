<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan Stok Kain</title>
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

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN STOK KAIN</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['kain_nama']){
        $kat=$d['kain_nama'];
        
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='6'><b>Nama Kain: $kat</b></td> </tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Kain</td>
    <td width='30%' align='center'>Nama Kain</td>
	<td width='20%' align='center'>Warna Kain</td>
    <td width='20%' align='center'>Satuan</td>
    <td width='30%' align='center'>Stok</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['kain_nama'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";

            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['kain_id']; ?></td>
                <td style="vertical-align:center;padding-left:5px;"><?php echo $d['kain_nama']; ?></td>
				<td style="vertical-align:center;padding-left:5px;"><?php echo $d['warna_nama']; ?></td>
                <td style="vertical-align:center;text-align:center;"><?php echo $d['kain_satuan']; ?></td>
                <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['kain_stok']; ?></td>  
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