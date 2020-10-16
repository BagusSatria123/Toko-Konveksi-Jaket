<?php
class M_hasil extends CI_Model
{

	function tampil_kegiatan()
	{
		$hsl = $this->db->query("SELECT * from t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id where rencana_status='1' order by rencana_kode asc");
		return $hsl;
	}

	function update_hasil($koderencana, $namabaju, $tgl_selesai, $hasilproduksi)
	{
		$this->db->query("UPDATE t_rencanabaru SET tgl_selesai='$tgl_selesai',hasil_jumlah='$hasilproduksi',validasi_selesai='1',rencana_status='2' WHERE rencana_kode='$koderencana'");

		$this->db->query("update t_produkbaju set produk_stok=produk_stok+'$hasilproduksi' where produk_id='$namabaju'");
		return true;
	}

	function update_hasilpenjahit($koderencana, $namabaju, $tgl_selesai, $hasilproduksi)
	{
		$user_id = $this->session->userdata('idadmin');
		$this->db->query("UPDATE t_rencanabaru SET tgl_selesai='$tgl_selesai',hasil_jumlah='$hasilproduksi' WHERE rencana_kode='$koderencana'");

		return true;
	}

	function update_validasi($koderencana, $namabaju, $tgl_selesai, $hasilproduksi)
	{
		$user_id = $this->session->userdata('idadmin');
		$this->db->query("UPDATE t_rencanabaru SET tgl_selesai='$tgl_selesai',hasil_jumlah='$hasilproduksi',validasi_selesai='1',rencana_status='2' WHERE rencana_kode='$koderencana'");

		$this->db->query("update t_produkbaju set produk_stok=produk_stok+'$hasilproduksi' where produk_id='$namabaju'");

		return true;
	}

	function hapus_hasil($koderencana)
	{
		$hsl = $this->db->query("DELETE FROM t_rencanabaru where rencana_kode='$koderencana'");
		return $hsl;
	}
}
