<?php
class Administrator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('m_pengguna');
        $this->load->library('form_validation');
    }
    function index()
    {
        $x['judul'] = "Silahkan Masuk..!";
        $this->load->view('v_login', $x);
    }
    function cekuser()
    {
        $username = strip_tags(stripslashes($this->input->post('username', TRUE)));
        $password = strip_tags(stripslashes($this->input->post('password', TRUE)));
        $u = $username;
        $p = $password;
        $cadmin = $this->mlogin->cekadmin($u, $p);
        if ($cadmin->num_rows > 0) {
            $this->session->set_userdata('masuk', true);
            $this->session->set_userdata('user', $u);
            $xcadmin = $cadmin->row_array();
            if ($xcadmin['user_level'] == '1') {
                $this->session->set_userdata('akses', '1');
                $idadmin = $xcadmin['user_id'];
                $user_nama = $xcadmin['user_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
            }
            if ($xcadmin['user_level'] == '2') {
                $this->session->set_userdata('akses', '2');
                $idadmin = $xcadmin['user_id'];
                $user_nama = $xcadmin['user_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
            }
            if ($xcadmin['user_level'] == '3') {
                $this->session->set_userdata('akses', '3');
                $idadmin = $xcadmin['user_id'];
                $user_nama = $xcadmin['user_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
            } //Front Office
        }

        if ($this->session->userdata('masuk') == true) {
            if (($xcadmin['user_level'] == '1')  || ($xcadmin['user_level'] == '2')) {
                redirect('administrator/berhasilLogin');
            } elseif ($xcadmin['user_level'] == '3') {
                redirect('administrator/berhasilLoginUser');
            }
        } else {
            redirect('administrator/gagallogin');
        }
    }
    function berhasillogin()
    {
        redirect('welcome');
    }
    function berhasilLoginUser()
    {
        redirect('home');
    }
    function gagallogin()
    {
        $url = base_url('administrator');
        echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
        redirect($url);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
        // $url = base_url('administrator');
        // redirect($url);
    }

    function register()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $level = '3';
        if ($password2 <> $password) {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
            redirect('register');
        } else {
            $this->m_pengguna->simpan_pengguna($nama, $username, $password, $level);
            echo $this->session->set_flashdata('msg', '<label class="label label-success">Pengguna Berhasil ditambahkan</label>');
            redirect('register');
        }
    }

    # code...
    //     $username = htmlspecialchars($this->input->post('username'));
    //     $password = md5(htmlspecialchars($this->input->post('password')));
    //     $u = $username;
    //     $p = $password;
    //     $ceklogin = $this->mlogin->cekadmin($u, $p);

    //     if ($ceklogin) {
    //         foreach ($ceklogin as $row) {

    //             $this->session->set_userdata('user_username', $row->u);
    //             $this->session->set_userdata('user_level', $row->user_level);
    //         }
    //         if ($this->session->userdata('user_level') == 1) {
    //             $data['user_level'] = 'admin';
    //             redirect('administrator/berhasillogin');
    //             redirect('welcome');
    //         } elseif ($this->session->userdata('user_level') == 3) {
    //             redirect('home');
    //         }
    //     } else {
    //         $url = base_url('administrator');
    //         echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
    //         redirect($url);
    //     }
    // }
    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('administrator');
    // }
}
