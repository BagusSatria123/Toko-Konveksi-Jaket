<?php
class Penggunaanbahan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_rencanabaru');
		$this->load->model('m_kain');
		$this->load->model('m_penggunaanbahan');
		$this->load->model('m_produkbaju');

	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$data['data2']=$this->m_rencanabaru->tampil_rencanadetail();
		$data['baju']=$this->m_produkbaju->get_produkbaju();
		$data['baju2']=$this->m_produkbaju->get_produkbaju();
		$data['kain2']=$this->m_kain->tampil_kain();
		$this->load->view('admin/v_penggunaanbahan',$data);

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function gunakan_bahan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$idkain=$this->input->post('idkain');
		$jumlah=$this->input->post('jumlah');
		$rencanakode=$this->input->post('rencanakode');
		$this->m_penggunaanbahan->gunakan_bahan($kode,$idkain,$jumlah,$rencanakode);
		
		echo $this->session->set_flashdata('msg','<label class="label label-success">Bahan berhasil digunakan!</label>');
		redirect('admin/penggunaanbahan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function hapus_bahan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$this->m_penggunaanbahan->hapus_bahan($kode);
		
		echo $this->session->set_flashdata('msg','<label class="label label-danger">Bahan berhasil dihapus!</label>');
		redirect('admin/penggunaanbahan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}