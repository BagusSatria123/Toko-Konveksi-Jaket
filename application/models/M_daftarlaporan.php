<?php
class M_daftarlaporan extends CI_Model{
	
	function get_stok_kain(){
		$hsl=$this->db->query("SELECT * from t_kain JOIN t_kain_warna ON k_warna_id=warna_id order by kain_id asc");
		return $hsl;
	}
	function get_stok_produk(){
		$hsl=$this->db->query("SELECT * from t_produkbaju");
		return $hsl;
	}
	
	function get_total_beli_periode($tanggal1,$tanggal2){
		$hsl=$this->db->query("SELECT beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_harga,d_beli_jumlah,SUM(d_beli_total) as total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE beli_tanggal between '$tanggal1' and '$tanggal2' ORDER BY beli_nofak DESC");
		return $hsl;
	}
	function laporan_periode($tanggal1,$tanggal2) {
        $hsl=$this->db->query("SELECT beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_kain_nama,d_beli_kain_warna,d_beli_kain_satuan,d_beli_harga,d_beli_jumlah,d_beli_total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE beli_tanggal between '$tanggal1' and '$tanggal2' ORDER BY beli_nofak Asc");
		return $hsl;
    }
	
	function get_total_produksi_periode($tanggal1,$tanggal2){
		$hsl=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,SUM(hasil_jumlah) as total FROM t_rencanabaru WHERE tgl_selesai between '$tanggal1' and '$tanggal2' ORDER BY rencana_kode DESC");
		return $hsl;
	}
	function laporan_produksi_periode($tanggal1,$tanggal2){
        $hsl=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,produk_nama,produk_warna,produk_deskripsi,DATE_FORMAT(tgl_mulai,'%d %M %Y') AS tgl_mulai,hasil_jumlah FROM t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id WHERE tgl_selesai between '$tanggal1' and '$tanggal2' ORDER BY rencana_kode DESC");
		return $hsl;
    }
	
	function get_total_penjualan_periode($tanggal1,$tanggal2){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE jual_tanggal between '$tanggal1' and '$tanggal2'  ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function laporan_penjualan_periode($tanggal1,$tanggal2){
        $hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,d_jual_total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE jual_tanggal between '$tanggal1' and '$tanggal2' ORDER BY jual_nofak DESC");
		return $hsl;
    }
	
	function get_bulan_beli(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan FROM t_belikain");
		return $hsl;
	}
	function get_tahun_beli(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(beli_tanggal) AS tahun FROM t_belikain");
		return $hsl;
	}
	function get_beli_perbulan($bulan){
		$hsl=$this->db->query("SELECT beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_kain_nama,d_beli_kain_warna,d_beli_kain_satuan,d_beli_harga,d_beli_jumlah,d_beli_total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE DATE_FORMAT(beli_tanggal,'%M %Y')='$bulan' ORDER BY beli_nofak DESC");
		return $hsl;
	}
	function get_total_beli_perbulan($bulan){
		$hsl=$this->db->query("SELECT beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_harga,d_beli_jumlah,SUM(d_beli_total) as total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE DATE_FORMAT(beli_tanggal,'%M %Y')='$bulan' ORDER BY beli_nofak DESC");
		return $hsl;
	}
	
	function get_beli_pertahun($tahun){
		$hsl=$this->db->query("SELECT beli_nofak,YEAR(beli_tanggal) AS tahun,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_kain_nama,d_beli_kain_warna,d_beli_kain_satuan,d_beli_harga,d_beli_jumlah,d_beli_total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE YEAR(beli_tanggal)='$tahun' ORDER BY beli_nofak DESC");
		return $hsl;
	}
	function get_total_beli_pertahun($tahun){
		$hsl=$this->db->query("SELECT beli_nofak,YEAR(beli_tanggal) AS tahun,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,d_beli_kain_id,d_beli_harga,d_beli_jumlah,SUM(d_beli_total) as total FROM t_belikain JOIN t_belikain_detail ON beli_nofak=d_beli_nofak WHERE YEAR(beli_tanggal)='$tahun' ORDER BY beli_nofak DESC");
		return $hsl;
	}
	
		
	function get_bulan_produksi(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan FROM t_rencanabaru");
		return $hsl;
	}
	function get_tahun_produksi(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(tgl_selesai) AS tahun FROM t_rencanabaru");
		return $hsl;
	}
	function get_produksi_perbulan($bulan){
		$hsl=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,produk_nama,produk_warna,produk_deskripsi,DATE_FORMAT(tgl_mulai,'%d %M %Y') AS tgl_mulai,hasil_jumlah FROM t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id WHERE DATE_FORMAT(tgl_selesai,'%M %Y')='$bulan' ORDER BY rencana_kode DESC");
		return $hsl;
	}
	function get_total_produksi_perbulan($bulan){
		$hsl=$this->db->query("SELECT rencana_kode,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,SUM(hasil_jumlah) as total FROM t_rencanabaru WHERE DATE_FORMAT(tgl_selesai,'%M %Y')='$bulan' ORDER BY rencana_kode DESC");
		return $hsl;
	}
	
	function get_produksi_pertahun($tahun){
		$hsl=$this->db->query("SELECT rencana_kode,YEAR(tgl_selesai) AS tahun,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,produk_nama,produk_warna,produk_deskripsi,DATE_FORMAT(tgl_mulai,'%d %M %Y') AS tgl_mulai,hasil_jumlah FROM t_rencanabaru JOIN t_produkbaju ON r_produk_id=produk_id WHERE YEAR(tgl_selesai)='$tahun' ORDER BY tgl_selesai DESC");
		return $hsl;
	}
	function get_total_produksi_pertahun($tahun){
		$hsl=$this->db->query("SELECT rencana_kode,YEAR(tgl_selesai) AS tahun,DATE_FORMAT(tgl_selesai,'%M %Y') AS bulan,DATE_FORMAT(tgl_selesai,'%d %M %Y') AS tgl_selesai,r_produk_id,SUM(hasil_jumlah) as total FROM t_rencanabaru WHERE YEAR(tgl_selesai)='$tahun' ORDER BY tgl_selesai DESC");
		return $hsl;
	}
	
	function get_bulan_jual(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM t_jualproduk");
		return $hsl;
	}
	function get_tahun_jual(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(jual_tanggal) AS tahun FROM t_jualproduk");
		return $hsl;
	}
	function get_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,d_jual_total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_total_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak DESC");
		return $hsl;
	}
		function get_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,d_jual_total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_total_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_produk_id,d_jual_produk_nama,d_jual_produk_warna,d_jual_produk_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM t_jualproduk JOIN t_jualproduk_detail ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	
	
	

}