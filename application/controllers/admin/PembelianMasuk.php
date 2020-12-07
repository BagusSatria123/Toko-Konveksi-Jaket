<?php
class PembelianMasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = "administrator";
            redirect($url);
        };
        $this->load->model('M_pembelianMasuk');
    }

    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['data'] = $this->M_pembelianMasuk->get_pembelian()->result();
            $this->load->view('admin/v_PembelianMasuk', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
