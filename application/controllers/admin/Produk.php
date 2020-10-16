<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_produk');
    }
    function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data['data'] = $this->m_produk->get_produkbaju();
            $this->load->view('admin/v_produk', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_produk()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $product = $this->m_produk;
            $product->simpan_produk();
            echo $this->session->set_flashdata('msg', '<label class="label label-success">Produk Berhasil ditambahkan</label>');
            redirect('admin/produk');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function edit()
    {
        $product = $this->m_produk;
        $product->update();
        echo $this->session->set_flashdata('msg', '<label class="label label-success">Produk Berhasil diupdate</label>');
        redirect('admin/produk');
    }

    function edit_produk()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kodebaju = $this->input->post('kodebaju');
            $nama = $this->input->post('nama');
            $warna = $this->input->post('warna');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $this->m_produkbaju->update_produkbaju($kodebaju, $nama, $warna, $deskripsi, $harga, $stok);

            redirect('admin/produkbaju');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function hapus_produk()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kodebaju = $this->input->post('kodebaju');
            $gambar = $this->input->post('gambar');
            $this->m_produkbaju->hapus_produk($kodebaju, $gambar);

            redirect('admin/produk');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
