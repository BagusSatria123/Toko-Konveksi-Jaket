<?php
class M_pembelianMasuk extends CI_Model
{

    private $_table = "t_pembayaran";


    function get_pembelian()
    {
        return $this->db->get('t_pembayaran');
    }
}
