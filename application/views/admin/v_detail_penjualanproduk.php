					<?php 
						error_reporting(0);
						$b=$produk->row_array();
					?>
					<table>
						<tr style="font-size:12px;">
		                    <th style="width:200px;"></th>
							<th>Nama Produk</th>
		                    <th>Warna Produk</th>
							<th>Stok</th>
		                    <th>Harga (Rp)</th>
							<th>Diskon (Rp)</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td style="width:200px;"></th>
							<td><input type="text" name="namaproduk" value="<?php echo $b['produk_nama'];?>" style="width:200px;margin-right:5px;" class="form-control input-sm" readonly></td>
							<td><input type="text" name="warna" value="<?php echo $b['produk_warna'];?>" style="width:110px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="stok" value="<?php echo $b['produk_stok'];?>" style="width:110px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harga" value="<?php echo number_format($b['produk_harga']);?>" style="width:110px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
							<td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="width:110px;margin-right:5px;" required></td>
							 <td><input type="number" name="jumlah" id="jumlah" value="1" min="1" max="<?php echo $b['produk_stok'];?>" class="form-control input-sm" style="width:110px;margin-right:9px;" required>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
					