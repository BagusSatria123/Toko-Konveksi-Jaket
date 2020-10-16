<?php
class Mlogin extends CI_Model
{
    function cekadmin($u, $p)
    {
        $hasil = $this->db->query("select*from t_user where user_username='$u'and user_password=md5('$p')");
        return $hasil;
        // $this->db->query("SET sql_mode = '' ");
        // $this->db->select('user_username, user_password, user_level');
        // $this->db->from('t_user');
        // $this->db->where('user_username', $u);
        // $this->db->where('user_password', $p);
        // $this->db->limit(1);
        // $query = $this->db->get();

        // if ($query->num_rows() == 1) {
        //     return $query->result();
        // } else {
        //     return false;
        // }
    }
}
