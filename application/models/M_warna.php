<?php
class M_warna extends CI_Model{

	function tampil_warna(){
		$hsl=$this->db->query("SELECT * from t_kain_warna");
		return $hsl;
	}
	
	function get_kodewarna(){
		$q = $this->db->query("SELECT MAX(RIGHT(warna_id,4)) AS kd_max FROM t_kain_warna");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "W".$kd;
	}
	
	function simpan_warna($kodewarna,$warna){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO t_kain_warna(warna_id,warna_nama) VALUES ('$kodewarna','$warna')");
		return $hsl;
	}
	
	function update_warna($kodewarna,$warna){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE t_kain_warna SET warna_nama='$warna' WHERE warna_id='$kodewarna'");
		return $hsl;
	}
	
	function hapus_warna($kode){
		$hsl=$this->db->query("DELETE FROM t_kain_warna where warna_id='$kode'");
		return $hsl;
	}
}