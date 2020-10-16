<?php
class M_rencanabaru extends CI_Model{

	function simpan_rencana($rencana_kode,$total,$namabaju,$rencanaproduksi,$tgl_mulai,$perkiraan_selesai,$keterangan){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO t_rencanabaru (rencana_kode,r_produk_id,rencana_jumlah,tgl_mulai,perkiraan_selesai,keterangan,rencana_total,r_user_id,rencana_status) VALUES ('$rencana_kode','$namabaju','$rencanaproduksi','$tgl_mulai','$perkiraan_selesai','$keterangan','$total','$idadmin','0')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_rencana_kode' 		=>	$rencana_kode,
				'd_rencana_kain_id'		=>	$item['id'],
				'd_rencana_kain_nama'	=>	$item['name'],
				'd_rencana_kain_warna'	=>	$item['warna'],
				'd_rencana_kain_satuan'	=>	$item['satuan'],
				'd_rencana_harga'		=>	$item['price'],
				'd_rencana_jumlah'		=>	$item['qty'],
				'd_rencana_total'		=>	$item['subtotal']
			);
			$this->db->insert('t_rencanabaru_detail',$data);

		}
		return true;
	}
	function get_koderencana(){
		$q = $this->db->query("SELECT MAX(RIGHT(rencana_kode,4)) AS kd_max FROM t_rencanabaru");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "KRC".$kd;
	}

	//=====================================================


	function cetak_faktur(){
		$rencana_kode=$this->session->userdata('rencana_kode');
		$hsl=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_mulai,'%d/%m/%Y %H:%i:%s') AS r_produk_id, produk_nama, tgl_mulai,rencana_jumlah,perkiraan_selesai,keterangan,rencana_total,d_rencana_kain_id,d_rencana_kain_nama,d_rencana_kain_warna,d_rencana_kain_satuan,d_rencana_harga,d_rencana_jumlah,d_rencana_total FROM t_rencanabaru JOIN t_rencanabaru_detail ON rencana_kode=d_rencana_kode JOIN t_produkbaju ON r_produk_id=produk_id WHERE rencana_kode='$rencana_kode'");
		return $hsl;
	}
	
	function tampil_rencana(){
		$hsl=$this->db->query("SELECT rencana_kode,r_produk_id,produk_nama,produk_warna,rencana_jumlah,tgl_mulai,perkiraan_selesai FROM t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id order by rencana_kode asc");
		return $hsl;
	}
	function tampil_rencanadetail(){
		$hsl=$this->db->query("SELECT * from t_rencanabaru_detail JOIN t_rencanabaru ON d_rencana_kode=rencana_kode JOIN t_produkbaju ON r_produk_id=produk_id where d_rencana_status='0' order by d_rencana_kode asc");
		return $hsl;
	}
	function tampil_rencanabuatbeli(){
		$hsl=$this->db->query("SELECT rencana_kode,r_produk_id,produk_nama,produk_warna,rencana_jumlah,tgl_mulai,perkiraan_selesai FROM t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id where rencana_status='0' order by rencana_kode asc");
		return $hsl;
	}
	function tampil_rencanaotomatis(){
		$hsl=$this->db->query("SELECT bb_produk_id,bb_bahanbaku_id,produk_nama,produk_warna,kain_nama,k_warna_id,warna_nama FROM t_bahanbaku_baju JOIN t_produkbaju ON bb_produk_id=produk_id JOIN t_kain ON bb_bahanbaku_id=kain_id JOIN t_kain_warna on k_warna_id=warna_id order by bb_produk_id asc");
		return $hsl;
	}
	 
}