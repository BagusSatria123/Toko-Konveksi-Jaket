<?php
class Rencanaotomatis extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kain');
		$this->load->model('m_produkbaju');
		$this->load->model('m_rencanabaru');
		$this->load->model('m_pembeliankain');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$data['data']=$this->m_kain->tampil_kain();
		$data['data2']=$this->m_rencanabaru->tampil_rencanabuatbeli();
		$data['data3']=$this->m_produkbaju->get_produkbaju(); 


		$this->load->view('admin/v_rencanaotomatis',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_kain(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$kodekain=$this->input->post('kode_kain');
		$x['kain']=$this->m_kain->get_kain($kodekain);
		$this->load->view('admin/v_detail_pembeliankain',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$nofak=$this->input->post('nofak');
		$tgl=$this->input->post('tgl');
		$koderencana=$this->input->post('koderencana');
		$this->session->set_userdata('nofak',$nofak);
		$this->session->set_userdata('tglfak',$tgl);
		$this->session->set_userdata('koderencana',$koderencana);
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

		$this->cart->insert($data); 
		redirect('admin/pembeliankain');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/pembeliankain');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_pembelian(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
		$nofak=$this->session->userdata('nofak');
		$tglfak=$this->session->userdata('tglfak');
		$koderencana=$this->session->userdata('koderencana');
		if(!empty($nofak) && !empty($tglfak)&& !empty($koderencana)){
			$beli_kode=$this->m_pembeliankain->get_kobel();
			$order_proses=$this->m_pembeliankain->simpan_pembelian($nofak,$tglfak,$koderencana,$beli_kode);
			if($order_proses){
				$this->cart->destroy();
				$this->session->unset_userdata('nofak');
				$this->session->unset_userdata('tglfak');
				$this->session->unset_userdata('koderencana');
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
				redirect('admin/pembeliankain');	
			}else{
				redirect('admin/pembeliankain');
			}
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Pembelian Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/pembeliankain');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }	
	}
}