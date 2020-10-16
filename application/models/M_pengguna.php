<?php
class M_pengguna extends CI_Model
{
	function get_pengguna()
	{
		$hsl = $this->db->query("SELECT * FROM t_user");
		return $hsl;
	}
	function simpan_pengguna($nama, $username, $password, $level)
	{
		$hsl = $this->db->query("INSERT INTO t_user(user_nama,user_username,user_password,user_level) VALUES ('$nama','$username',md5('$password'),'$level')");
		return $hsl;
	}
	function update_pengguna_nopass($kode, $nama, $username, $level)
	{
		$hsl = $this->db->query("UPDATE t_user SET user_nama='$nama',user_username='$username',user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode, $nama, $username, $password, $level)
	{
		$hsl = $this->db->query("UPDATE t_user SET user_nama='$nama',user_username='$username',user_password=md5('$password'),user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	function update_status($kode)
	{
		$hsl = $this->db->query("DELETE FROM t_user where user_id='$kode'");
		return $hsl;
	}
}
