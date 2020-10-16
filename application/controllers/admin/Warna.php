<?php
class Warna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_warna');
		
	}
	
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_warna->tampil_warna();
		$this->load->view('admin/v_warna',$data);
	}else{
        echo "Halaman tidak ditemukan";
		}
	}
	
	function tambah_warna(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kodewarna=$this->m_warna->get_kodewarna();
		$warna=$this->input->post('warna');
		$this->m_warna->simpan_warna($kodewarna,$warna);

		redirect('admin/warna');
	}else{
        echo "Halaman tidak ditemukan";
		}
	}
	
	function edit_warna(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kodewarna=$this->input->post('kodewarna');
		$warna=$this->input->post('warna');
		$this->m_warna->update_warna($kodewarna,$warna);
		
		redirect('admin/warna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function hapus_warna(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_warna->hapus_warna($kode);
		redirect('admin/warna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}