<?php
class PemesananMasuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = "administrator";
			redirect($url);
		};
		$this->load->model('M_pemesananMasuk');
	}

	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$data['data'] = $this->M_pemesananMasuk->get_pemesanan()->result();
			$this->load->view('admin/v_pemesananMasuk', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
