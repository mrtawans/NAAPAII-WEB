<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!($this->session->userdata('logged_in'))) {
			redirect('User/login');
		} else {

			// @users_model: get secures user information
			$Get_UserInfoByUsername		= $this->users_model->_UserInfoResult(array('username','email','status'), $this->session->userdata('username'));

			// @helpers_lib: foreach json result
			foreach ($this->helpers_lib->_jsonResult($Get_UserInfoByUsername) as $welcome_result) {
				$params['welcome_callback'] = $welcome_result;
			}

			$this->load->view('templates/header');
			$this->load->view('home_view', $params);
			$this->load->view('templates/footer');
		}
	}
}
