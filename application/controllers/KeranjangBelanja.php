<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KeranjangBelanja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('masuk') != TRUE) {
            // belum diberi text box warning
            $url = 'administrator';
            redirect($url);
        };
        $this->load->model('m_produkbaju');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1') {
            $this->load->view('templates/header');
            $this->load->view('keranjang');
            $this->load->view('templates/footer');
        } else {
            echo "halaman tidak ada";
        }
    }

    public function tambah_ke_keranjang($id)
    {
        $produk = $this->m_produkbaju->find($id);
        $data = array(
            'id'      => $produk->produk_id,
            'qty'     => 1,
            'price'   => $produk->produk_harga,
            'name'    => $produk->produk_nama

        );

        $this->cart->insert($data);

        redirect('pembelian');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Home');
    }

    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->Model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf, Pesanan Anda Gagal diproses!";
        }
    }
}
