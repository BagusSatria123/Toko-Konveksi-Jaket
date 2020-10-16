<?php
class Daftarlaporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kain');
		$this->load->model('m_produkbaju');
		$this->load->model('m_daftarlaporan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_kain->tampil_kain();
		$data['jual_bln']=$this->m_daftarlaporan->get_bulan_beli();
		$data['jual_thn']=$this->m_daftarlaporan->get_tahun_beli();
		$data['prod_bln']=$this->m_daftarlaporan->get_bulan_produksi();
		$data['prod_thn']=$this->m_daftarlaporan->get_tahun_produksi();
		$data['penjualan_bln']=$this->m_daftarlaporan->get_bulan_jual();
		$data['penjualan_thn']=$this->m_daftarlaporan->get_tahun_jual();
		$this->load->view('admin/v_daftarlaporan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	
	
	
	function laporan_stok_kain(){
		$x['data']=$this->m_daftarlaporan->get_stok_kain();
		$this->load->view('admin/laporan/v_laporan_stok_kain',$x);
	}
	function laporan_stok_produk(){
		$x['data']=$this->m_daftarlaporan->get_stok_produk();
		$this->load->view('admin/laporan/v_laporan_stok_produk',$x);
	}
	function laporan_pembelian_periode(){
		$tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
		$data['jml']=  $this->m_daftarlaporan->get_total_beli_periode($tanggal1,$tanggal2);
        $data['record']=  $this->m_daftarlaporan->laporan_periode($tanggal1,$tanggal2);
        $this->load->view('admin/laporan/v_laporan_pembelian_periode',$data);
			
	}
	function laporan_produksi_periode(){
		$tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
		$data['jml']=  $this->m_daftarlaporan->get_total_produksi_periode($tanggal1,$tanggal2);
        $data['record']=  $this->m_daftarlaporan->laporan_produksi_periode($tanggal1,$tanggal2);
        $this->load->view('admin/laporan/v_laporan_produksi_periode',$data);
			
	}
	function laporan_penjualan_periode(){
		$tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
		$data['jml']=  $this->m_daftarlaporan->get_total_penjualan_periode($tanggal1,$tanggal2);
        $data['record']=  $this->m_daftarlaporan->laporan_penjualan_periode($tanggal1,$tanggal2);
        $this->load->view('admin/laporan/v_laporan_penjualan_periode',$data);
			
	}
	
	
	function laporan_pembelian_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_daftarlaporan->get_total_beli_perbulan($bulan);
		$x['data']=$this->m_daftarlaporan->get_beli_perbulan($bulan);
		$this->load->view('admin/laporan/v_laporan_pembelian_perbulan',$x);
	}
	function laporan_pembelian_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_daftarlaporan->get_total_beli_pertahun($tahun);
		$x['data']=$this->m_daftarlaporan->get_beli_pertahun($tahun);
		$this->load->view('admin/laporan/v_laporan_pembelian_pertahun',$x);
	}
	function laporan_produksi_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_daftarlaporan->get_total_produksi_perbulan($bulan);
		$x['data']=$this->m_daftarlaporan->get_produksi_perbulan($bulan);
		$this->load->view('admin/laporan/v_laporan_produksi_perbulan',$x);
	}
	function laporan_produksi_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_daftarlaporan->get_total_produksi_pertahun($tahun);
		$x['data']=$this->m_daftarlaporan->get_produksi_pertahun($tahun);
		$this->load->view('admin/laporan/v_laporan_produksi_pertahun',$x);
	}
		function laporan_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_daftarlaporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_daftarlaporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_laporan_jual_perbulan',$x);
	}
		function laporan_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_daftarlaporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_daftarlaporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_laporan_jual_pertahun',$x);
	}
}