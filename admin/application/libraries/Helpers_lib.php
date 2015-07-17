<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

class Helpers_lib {

  protected $CI;

  private function _logged_in(){
    if($this->session->userdata('logged_in')) {
      return true;
    } else {
      return false;
    }
  }

  public function __construct()
  {
          // Assign the CodeIgniter super-object
          $this->CI =& get_instance();
  }

  public function _jsonResult($params)
  {

    $json_encode = json_encode($params, true);
    $json_decode = json_decode($json_encode);

    $string = array();
    foreach ($json_decode as $string) {
      $result[] = $string;
      return $result;
    }
    return false;

  }

}

?>