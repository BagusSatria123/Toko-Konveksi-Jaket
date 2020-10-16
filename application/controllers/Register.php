<?php
class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengguna');
    }

    function index()
    {
        $this->load->view('register');
        # code...
    }
    function tambah_user()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $level = '3';
        if ($password2 <> $password) {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
            redirect('register');
        } else {
            $this->m_pengguna->simpan_pengguna($nama, $username, $password, $level);
            echo $this->session->set_flashdata('msg', '<label class="label label-success"> Berhasil Mendaftar</label>');
            redirect('administrator');
        }

        # code...
    }
}
