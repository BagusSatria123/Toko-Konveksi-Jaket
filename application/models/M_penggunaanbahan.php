<?php
class M_penggunaanbahan extends CI_Model
{


	function gunakan_bahan($kode, $idkain, $jumlah, $rencanakode)
	{

		$this->db->query("UPDATE t_rencanabaru SET rencana_status='1' where rencana_kode='$rencanakode'");
		$this->db->query("UPDATE t_rencanabaru_detail SET d_rencana_status='1' where d_rencana_id='$kode'");
		$this->db->query("UPDATE t_kain SET kain_stok=kain_stok-'$jumlah' where kain_id='$idkain'");

		return true;
	}

	function hapus_bahan($kode)
	{
		$hsl = $this->db->query("DELETE FROM t_rencanabaru_detail where d_rencana_id='$kode'");
		return $hsl;
	}
}
