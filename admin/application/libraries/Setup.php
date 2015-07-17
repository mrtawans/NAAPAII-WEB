<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup
{
	protected $ci;
	public $params = array();

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function _page($params){

		$params_header 	= empty($params['header'])? false :$params['header'] ;
		$params_body 	= empty($params['body'])? false :$params['body'] ;
		$params_view 	= empty($params['view'])? false :$params['view'] ;
		$params_footer 	= empty($params['footer'])? false :$params['footer'] ;
		$this->ci->load->view('templates/header', $params_header);
		$this->ci->load->view($params_view, $params_body);
		$this->ci->load->view('templates/footer', $params_footer);
		
	}

}

/* End of file Setup.php */
/* Location: ./application/libraries/Setup.php */

?>