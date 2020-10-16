<?php
class Penjualanproduk extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };

		$this->load->model('m_produkbaju');
		$this->load->model('m_penjualanproduk');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_produkbaju->get_produkbaju();
		$this->load->view('admin/v_penjualanproduk',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_produk(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kodeproduk=$this->input->post('kode_produk');
		$x['produk']=$this->m_produkbaju->get_produkbuatpenjualan($kodeproduk);
		$this->load->view('admin/v_detail_penjualanproduk',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kodeproduk=$this->input->post('kode_produk');
		$produk=$this->m_produkbaju->get_produkbuatpenjualan($kodeproduk);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['produk_id'],
               'name'     => $i['produk_nama'],
			   'warna'    => $i['produk_warna'],
               'price'    => str_replace(",", "", $this->input->post('harga'))-$this->input->post('diskon'),
			   'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('jumlah'),
			   'amount'	  => str_replace(",", "", $this->input->post('harga'))

            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kodeproduk=$this->input->post('kode_produk');
			$qty=$this->input->post('jumlah');
			if($id==$kodeproduk){
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

		redirect('admin/penjualanproduk');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualanproduk');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualanproduk');
			}else{
				$nofak=$this->m_penjualanproduk->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualanproduk->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
					
					$this->session->unset_userdata('tglfak');
					$this->load->view('admin/alert/alert_sukses');	
				}else{
					redirect('admin/penjualanproduk');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualanproduk');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualanproduk->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		$this->session->unset_userdata('nofak');
	}


}