<?php
class M_produkbaju extends CI_Model
{

	private $_table = "t_produkbaju";
	public $gambar = "default.jpg";

	public $produk_id;

	function get_produkbajuUser()
	{
		return $this->db->get('t_produkbaju');
	}
	function get_produkbaju()
	{
		$hsl = $this->db->query("SELECT * FROM t_produkbaju");
		return $hsl;
	}

	function get_kodebaju()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(produk_id,4)) AS kd_max FROM t_produkbaju");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int) $k->kd_max) + 1;
				$kd = sprintf("%04s", $tmp);
			}
		} else {
			$kd = "0001";
		}
		return "BJ" . $kd;
	}

	function simpan_produkbaju()
	{
		$post = $this->input->post();
		$this->produk_id = $this->get_kodebaju();
		$this->produk_nama = $post["nama"];
		$this->produk_warna = $post["warna"];
		$this->produk_deskripsi = $post["deskripsi"];
		$this->produk_harga = $post["harga"];
		$this->produk_stok = 0;
		$this->gambar = $this->_uploadImage();
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->produk_id = $post["id"];
		$this->produk_nama = $post["nama"];
		$this->produk_warna = $post["warna"];
		$this->produk_deskripsi = $post["deskripsi"];
		$this->produk_harga = $post["harga"];
		$this->produk_stok = $post["stok"];

		if (!empty($_FILES["gambar"]["id"])) {
			$this->gambar = $this->_uploadImage();
		} else {
			$this->gambar = $post["old_image"];
		}

		$this->db->update($this->_table, $this, array('produk_id' => $post['id']));
	}

	function update_produkbaju($kodebaju, $nama, $warna, $deskripsi, $harga, $stok)
	{
		$user_id = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE t_produkbaju SET produk_nama='$nama',produk_warna='$warna',produk_deskripsi='$deskripsi',produk_harga='$harga',produk_stok='$stok' WHERE produk_id='$kodebaju'");
		return $hsl;
	}

	function hapus_produkbaju($kodebaju, $gambar)
	{
		$this->_deleteImage($kodebaju, $gambar);
		return $this->db->delete($this->_table, array("produk_id" => $kodebaju));
	}

	function get_produkbuatpenjualan($kodeproduk)
	{
		$hsl = $this->db->query("SELECT * FROM t_produkbaju where produk_id='$kodeproduk'");
		return $hsl;
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

	private function _deleteImage($kodebaju, $gambar)
	{
		if ($gambar != "default.jpg") {
			$filename = explode(".", $gambar)[0];
			return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
		}
	}
	function find($id)
	{
		$result = $this->db->where('produk_id', $id)
			->limit(1)
			->get('t_produkbaju');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
}
