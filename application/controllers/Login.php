<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('login_view');
    }

    public function ceklogin()
    {
        error_reporting(0);
		if (isset($_POST['login'])) {
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$cek = $this->model_login->proseslogin($username,$password);
			$hasil = count($cek);
			if ($hasil > 0) {
				$pelogin = $this->db->get_where('tb_login',array('username' => $username, 'password' => $password))->row();
				$sess_data = array(
					'username'	=> 	$username,
					'name'		=>  $pelogin->nickname,
					'login'		=> 'Ok'
				);
				$this->session->set_userdata($sess_data);
				if ($pelogin->status == 'admin') {
					echo "<script>alert('berhasil login sebagai admin : ".$pelogin->nickname." !'); document.location='".site_url('dashboard')."';</script>";
				}
				// redirect('welcome/beranda');
			}else{
				echo "<script>alert('username atau password anda salah'); document.location='".site_url('login')."';</script>";
			}
		}
    }

	public function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Logout Berhasil'); document.location='".site_url('login')."';</script>";
	}

}

/* End of file: Login.php */
