<?php
class M_penjualanproduk extends CI_Model{

	function simpan_penjualan($nofak,$total,$jml_uang,$kembalian){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO t_jualproduk (jual_nofak,jual_total,jual_bayar,jual_kembalian,jual_user_id) VALUES ('$nofak','$total','$jml_uang','$kembalian','$idadmin')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_produk_id'		=>	$item['id'],
				'd_jual_produk_nama'	=>	$item['name'],
				'd_jual_produk_warna'	=>	$item['warna'],
				'd_jual_produk_harga'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('t_jualproduk_detail',$data);
			$this->db->query("update t_produkbaju set produk_stok=produk_stok-'$item[qty]' where produk_id='$item[id]'");
		}
		return true;
	}
	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,4)) AS kd_max FROM t_jualproduk WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return date('dmy').$kd;
	}

	//=====================================================


	function cetak_faktur(){
		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_bayar,jual_kembalian,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,d_jual_total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;
	}
	
}