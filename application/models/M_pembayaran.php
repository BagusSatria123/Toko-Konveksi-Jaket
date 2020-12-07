<?php
class M_Pembayaran extends CI_Model
{
    private $_table = "t_pembayaran";

    function get_pembayaran()
    {
        return $this->db->get('t_pembayaran');
    }

    function tambah_pembayaran()
    {
        $post = $this->input->post();
        $this->NamaLengkap = $post["nama"];
        $this->AlamatLengkap = $post["alamat"];
        $this->NoTelp = $post["no_telp"];
        $this->JasaPengiriman = $post["jasa_kirim"];
        $this->PilihBank = $post["pilih_bank"];
        $this->db->insert($this->_table, $this);
    }
}
