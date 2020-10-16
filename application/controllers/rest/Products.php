<?php

class Products extends CI_Controller {

	public function index()
	{
		header('Content-Type: application/json');
		echo json_encode(
			array(
				"status" => "HARAM!",
			)
		);
	}

	public function get_item()
	{	
		$product_id = $this->input->get('product_id');

		$this->db->where('produk_id', $product_id);
		$resolve =  $this->db->get('t_produkbaju');

		if ($resolve->num_rows() == 1) {
			$resolve = $resolve->row();

			header('Content-Type: application/json');
			echo json_encode(
				array(
					"success" => array(
						"data" => $resolve
					)
				)
			);

		} else {
			
			header('Content-Type: application/json');
			echo json_encode(
				array(
					"error" => array(
						"reason" =>  "NOT_FOUND"
					)
				)
			);

		}
	}

}

/* End of file Products.php */
/* Location: ./application/controllers/REST/admin/Products.php */