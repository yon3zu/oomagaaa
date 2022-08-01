<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

    public function proseslogin($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('tb_login')->row();
	}

}

/* End of file: model_login.php */
