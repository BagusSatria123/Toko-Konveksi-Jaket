<?php
class Kain extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->model('m_kain');
	}

	function index()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$data['data'] = $this->m_kain->tampil_kain();
			$data['data2'] = $this->m_kain->tampil_warna();
			$this->load->view('admin/v_kain', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function tambah_kain()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kodekain = $this->m_kain->get_kodekain();
			$namakain = $this->input->post('namakain');
			$warnakain = $this->input->post('warnakain');
			$satuan = $this->input->post('satuan');
			$harga = str_replace(',', '', $this->input->post('harga'));
			$stok = $this->input->post('stok');
			$this->m_kain->simpan_kain($kodekain, $namakain, $warnakain, $satuan, $harga, $stok);

			redirect('admin/kain');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function edit_kain()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kodekain = $this->input->post('kodekain');
			$namakain = $this->input->post('namakain');
			$warnakain = $this->input->post('warnakain');
			$satuan = $this->input->post('satuan');
			$harga = str_replace(',', '', $this->input->post('harga'));
			$stok = $this->input->post('stok');
			$this->m_kain->update_kain($kodekain, $namakain, $warnakain, $satuan, $harga, $stok);

			redirect('admin/kain');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function hapus_kain()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kode = $this->input->post('kode');
			$this->m_kain->hapus_kain($kode);
			redirect('admin/kain');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
