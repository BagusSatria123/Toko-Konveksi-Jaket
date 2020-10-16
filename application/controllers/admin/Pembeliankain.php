<?php
class Pembeliankain extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kain');
		$this->load->model('m_rencanabaru');
		$this->load->model('m_pembeliankain');
	}
	function index(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
			$data['data']=$this->m_kain->tampil_kain();
			$data['data2']=$this->m_rencanabaru->tampil_rencanabuatbeli(); 


			$this->load->view('admin/v_pembeliankain',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }
	}

	function invoice()
	{

		$plan_code = $this->input->get('plan_code');

		$data['data'] = $this->db->query("SELECT
		  bk.`beli_nofak`,
		  bk.`beli_rencana_kode`,
		  bk.`beli_kode`,
		  pb.`produk_nama`,
		  bk.`beli_tanggal`,
		  rb.`rencana_total`
		FROM
		  t_belikain AS bk
		  INNER JOIN t_rencanabaru AS rb
		    ON rb.`rencana_kode` = bk.`beli_rencana_kode`
		  INNER JOIN t_produkbaju AS pb
		    ON pb.`produk_id` = rb.`r_produk_id`
		WHERE bk.`beli_rencana_kode` = ?; ", array(
			$plan_code
		));

		if ($data['data']->num_rows() == 0) {
			die('Tidak ditemukan');
		}

		$data['data'] = $data['data']->row_array();


		$this->db->where('d_rencana_kode', $plan_code);
		$data['data_item'] = $this->db->get('t_rencanabaru_detail');

		return $this->load->view('admin/laporan/v_fakturpembelian',$data);
	}
}