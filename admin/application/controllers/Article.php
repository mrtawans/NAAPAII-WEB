<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('logged_in')) {
			redirect('Article/Dashboard');
		} else {
			redirect('User/login');
		}
	}

	public function Dashboard()
	{
		$body_params['body_params'] = 'body_params';
		$pages = array(
			'view'=>'article/dashboard_view',
			'body'=>$body_params
			);
		$this->setup->_page($pages);
	}

}

/* End of file Article.php */
/* Location: ./application/controllers/Article.php */


?>