<?php
class Hasil extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_hasil');
		$this->load->model('m_produkbaju');

	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_hasil->tampil_kegiatan();
		$data['baju']=$this->m_produkbaju->get_produkbaju();
		$data['baju2']=$this->m_produkbaju->get_produkbaju();
		$this->load->view('admin/v_hasil',$data);

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function edit_hasil(){
	if($this->session->userdata('akses')=='1'){
		$koderencana=$this->input->post('koderencana');
		$namabaju=$this->input->post('namabaju');
		$tgl_selesai=$this->input->post('tgl_selesai');
		$hasilproduksi=$this->input->post('hasilproduksi');
		
		$this->m_hasil->update_hasil($koderencana,$namabaju,$tgl_selesai,$hasilproduksi);
			
			echo $this->session->set_flashdata('msg','<label class="label label-success">Hasil Produksi Berhasil disimpan!</label>');
			redirect('admin/hasil');
	}else
        if($this->session->userdata('akses')=='3'){
			$koderencana=$this->input->post('koderencana');
			$namabaju=$this->input->post('namabaju');
			$tgl_selesai=$this->input->post('tgl_selesai');
			$hasilproduksi=$this->input->post('hasilproduksi');
		
			$this->m_hasil->update_hasilpenjahit($koderencana,$namabaju,$tgl_selesai,$hasilproduksi);
				
				echo $this->session->set_flashdata('msg','<label class="label label-success">Hasil Produksi disimpan, Menunggu validasi admin!</label>');
				redirect('admin/hasil');
    }
	else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_hasil(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		$koderencana=$this->input->post('koderencana');
		$this->m_hasil->hapus_hasil($koderencana);
		
		redirect('admin/hasil');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function validasi_selesai(){
	if($this->session->userdata('akses')=='1'){
		$koderencana=$this->input->post('koderencana');
		$namabaju=$this->input->post('namabaju');
		$tgl_selesai=$this->input->post('tgl_selesai');
		$hasilproduksi=$this->input->post('hasilproduksi');
		
		$this->m_hasil->update_validasi($koderencana,$namabaju,$tgl_selesai,$hasilproduksi);
			
			echo $this->session->set_flashdata('msg','<label class="label label-success">Hasil Produksi Berhasil Divalidasi!</label>');
			redirect('admin/hasil');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}