<?php
class M_pemesananMasuk extends CI_Model
{

	private $_table = "pemesanan";
	public $gambar = "default.jpg";

	function get_pemesanan()
	{
		return $this->db->get('pemesanan');
	}

	function tambah_pesanan()
	{
		$post = $this->input->post();
		$this->nama = $post["nama"];
		$this->no_telp = $post["no_telp"];
		$this->alamat = $post["alamat"];
		$this->produk = $post["produk"];
		$this->kep_produk = $post["kep_produk"];
		$this->ukuran = $post["ukuran"];
		$this->jumlah = $post["jumlah"];
		$this->gambar = $this->_uploadImage();
		$this->pesan = $post["pesan"];
		$this->db->insert($this->_table, $this);
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->produk_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			$upload_data = $this->upload->data();
			return $upload_data["file_name"];
		}
		return "default.jpg";
	}
}
