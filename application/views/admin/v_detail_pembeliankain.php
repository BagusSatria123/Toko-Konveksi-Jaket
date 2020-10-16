					<?php 
						error_reporting(0);
						$b=$kain->row_array();
					?>
					<table style="margin-top: 10px;">
						<tr>
		                    <th>Nama Kain</th>
		                    <th>Warna</th>
		                    <th>Satuan</th>
		                    <th>Harga</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td><input type="text" name="namakain" value="<?php echo $b['kain_nama'];?>" style="width:200px;margin-right:9px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="warna" value="<?php echo $b['warna_nama'];?>" style="width:120px;margin-right:9px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="satuan" value="<?php echo $b['kain_satuan'];?>" style="width:130px;margin-right:9px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harga" value="<?php echo $b['kain_harga'];?>" style="width:130px;margin-right:9px;" class="form-control input-sm" required></td>
		                    <td><input type="text" name="jumlah" id="jumlah" class="form-control input-sm" style="width:90px;margin-right:9px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">OK</button></td>
						</tr>
					</table>
					