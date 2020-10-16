<?php
class Rencanabaru extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };

		$this->load->model('m_kain');
		$this->load->model('m_produkbaju');
		$this->load->model('m_rencanabaru');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_produkbaju->get_produkbaju();
		$data['data2']=$this->m_kain->tampil_kain();
		
		$this->load->view('admin/v_rencanabaru',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }

	}
	function get_kain(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$kodekain=$this->input->post('kode_kain');
		$x['kain']=$this->m_kain->get_kain($kodekain);
		$this->load->view('admin/v_detail_rencanabaru',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$namabaju=$this->input->post('namabaju');
		$rencanaproduksi=$this->input->post('rencanaproduksi');
		$tgl_mulai=$this->input->post('tgl_mulai');
		$perkiraan_selesai=$this->input->post('perkiraan_selesai');
		$keterangan=$this->input->post('keterangan');
		
		$this->session->set_userdata('namabaju',$namabaju);
		$this->session->set_userdata('rencanaproduksi',$rencanaproduksi);
		$this->session->set_userdata('tgl_mulai',$tgl_mulai);
		$this->session->set_userdata('perkiraan_selesai',$perkiraan_selesai);
		$this->session->set_userdata('keterangan',$keterangan);
		
		$kodekain=$this->input->post('kode_kain');
		$produk=$this->m_kain->get_kain($kodekain);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['kain_id'],
               'name'     => $i['kain_nama'],
               'warna'    => $i['warna_nama'],
			   'satuan'   => $i['kain_satuan'],
               'price'    => $this->input->post('harga'),
               'qty'      => $this->input->post('jumlah')
            );
			
		if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kodekain=$this->input->post('kode_kain');
			$qty=$this->input->post('jumlah');
			if($id==$kodekain){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}

		redirect('admin/rencanabaru');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	
	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/rencanabaru');
	}else{
        echo "Halaman tidak ditemukan";
    }
	
	}
	function simpan_rencana(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$total=$this->input->post('total');
		$namabaju=$this->session->userdata('namabaju');
		$rencanaproduksi=$this->session->userdata('rencanaproduksi');
		$tgl_mulai=$this->session->userdata('tgl_mulai');
		$perkiraan_selesai=$this->session->userdata('perkiraan_selesai');
		$keterangan=$this->session->userdata('keterangan');

		if(!empty($namabaju) && !empty($rencanaproduksi) && !empty($tgl_mulai) && !empty($perkiraan_selesai)){
			$rencana_kode=$this->m_rencanabaru->get_koderencana();
			$this->session->set_userdata('rencana_kode',$rencana_kode);
			$order_proses=$this->m_rencanabaru->simpan_rencana($rencana_kode,$total,$namabaju,$rencanaproduksi,$tgl_mulai,$perkiraan_selesai,$keterangan);
			if($order_proses){
				$this->cart->destroy();
				$this->session->unset_userdata('namabaju');
				$this->session->unset_userdata('rencanaproduksi');
				$this->session->unset_userdata('tgl_mulai');
				$this->session->unset_userdata('perkiraan_selesai');
				$this->session->unset_userdata('keterangan');
				echo $this->session->set_flashdata('msg','<label class="label label-success">Rencana Berhasil di Simpan ke Database</label>');
				$this->load->view('admin/alert/alert_suksesrencana');	
			}else{
				redirect('admin/rencanabaru');
			}
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Rencana Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/rencanabaru');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	
	}

	function cetak_faktur(){
		$x['data']=$this->m_rencanabaru->cetak_faktur();
		$this->load->view('admin/laporan/v_fakturrencana',$x);
		$this->session->unset_userdata('rencana_kode');
	}

}