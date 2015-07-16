<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if(!($this->session->userdata('logged_in'))) {
			redirect('login/index');
		} else {

			$Get_UserInfoByUsername = $this->login_model->_UserInfoByUsername(array('username'),$this->session->userdata('username'));
			$params['welcome_callback'] = "welcome_callback(".json_encode($Get_UserInfoByUsername).")";
			
			$this->load->view('templates/header');
			$this->load->view('home_view', $params);
			$this->load->view('templates/footer');
		}
	}
}
