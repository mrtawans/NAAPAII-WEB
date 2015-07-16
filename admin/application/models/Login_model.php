<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
  private $user_table = 'tbl_usrs';

  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  //get the username & password from tbl_usrs
  function get_user($usr, $pwd)
  {
    $this->db->where('username', $usr);
    $this->db->where('password', md5($pwd));
    $query = $this->db->get($this->user_table);
    return $query->num_rows();
  }

  function _UserInfoByUsername($agrs, $username) 
  {
    $agrs = implode(', ', $agrs);
    $this->db->select($agrs);
    $this->db->where('username', $username);
    $query = $this->db->get($this->user_table);
    return $query->result();
  }

}?>