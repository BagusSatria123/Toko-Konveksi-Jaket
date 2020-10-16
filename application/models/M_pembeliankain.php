<?php
class M_pembeliankain extends CI_Model{

	function simpan_pembelian($tglfak,$koderencana,$beli_kode){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO t_belikain (beli_tanggal,beli_user_id,beli_kode,beli_rencana_kode) VALUES ('$tglfak','$idadmin','$beli_kode','$koderencana')");

		$this->db->where('d_rencana_kode', $koderencana);
		$fetch_detail = $this->db->get('t_rencanabaru_detail');

		foreach ($fetch_detail->result() as $item) {
			$data=array(
				'd_beli_kain_id'	=>	$item->d_rencana_kain_id,
				'd_beli_kain_nama'	=>	$item->d_rencana_kain_nama,
				'd_beli_kain_warna'	=>	$item->d_rencana_kain_warna,
				'd_beli_kain_satuan'=>	$item->d_rencana_kain_satuan,
				'd_beli_harga'		=>	$item->d_rencana_harga,
				'd_beli_jumlah'		=>	$item->d_rencana_jumlah,
				'd_beli_total'		=>	$item->d_rencana_total,
				'd_beli_kode'		=>	$beli_kode
			);

			$this->db->insert('t_belikain_detail', $data);
			$this->db->query("UPDATE
							    t_kain
							SET
							    kain_stok = kain_stok + ?,
							    kain_harga = ?
							WHERE kain_id = ?", [
								$item->d_rencana_jumlah,
								$item->d_rencana_harga,
								$item->d_rencana_kain_id
							]
			);
		}
		return true;
	}
	function get_kobel(){
		$q = $this->db->query("SELECT MAX(RIGHT(beli_kode,4)) AS kd_max FROM t_belikain");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "BL".$kd;
	}
}