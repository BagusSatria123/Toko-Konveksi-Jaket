<?php
class M_Kain extends CI_Model{

private $_table = "t_kain";

	function tampil_kain(){
		$hsl=$this->db->query("SELECT * from t_kain JOIN t_kain_warna ON k_warna_id=warna_id order by kain_id asc");
		return $hsl;
	}
	function tampil_warna(){
		$hsl=$this->db->query("SELECT * from t_kain_warna");
		return $hsl;
	}
	
	
	function tampil_buatbahan(){
		$hsl=$this->db->query("SELECT * from t_kain where kain_stok>0");
		return $hsl;
	}

	
	function get_kodekain(){
		$q = $this->db->query("SELECT MAX(RIGHT(kain_id,4)) AS kd_max FROM t_kain");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "BB".$kd;
	}
	
	function simpan_kain($kodekain,$namakain,$warnakain,$satuan,$harga,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO t_kain (kain_id,kain_nama,k_warna_id,kain_satuan,kain_harga,kain_stok) VALUES ('$kodekain','$namakain','$warnakain','$satuan','$harga','$stok')");
		return $hsl;
	}
	
	function update_kain($kodekain,$namakain,$warnakain,$satuan,$harga,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE t_kain SET kain_nama='$namakain',k_warna_id='$warnakain',kain_satuan='$satuan',kain_harga='$harga',kain_stok='$stok' WHERE kain_id='$kodekain'");
		return $hsl;
	}
	
	function hapus_kain($kode){
		$hsl=$this->db->query("DELETE FROM t_kain where kain_id='$kode'");
		return $hsl;
	}
	
	function get_kain($kodekain){
		$hsl=$this->db->query("SELECT * FROM t_kain JOIN t_kain_warna ON k_warna_id=warna_id where kain_id='$kodekain'");
		return $hsl;
	}
}