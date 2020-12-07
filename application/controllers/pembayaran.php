<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembayaran extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('masuk') != TRUE) {
            // belum diberi text box warning
            $url = 'administrator';
            redirect($url);
        };
        $this->load->model('M_Pembayaran');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1') {
            $this->load->view('templates/header');
            $this->load->view('Pemesanan');
            $this->load->view('templates/footer');
        } else {
            echo "halaman tidak ada";
        }
    }

    public function tambah_pembayaran()
    {
        if ($this->session->userdata('akses') == '3' || $this->session->userdata('akses') == '1') {
            $this->M_Pembayaran->tambah_pembayaran();
            echo $this->session->set_flashdata('bayar', '<label class="label label-success">Pembayaran Berhasil ditambahkan</label>');
            redirect('About');
        } else {
            echo "halaman tidak ditemukan";
        }
    }
}
