<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
  private $user_table = DB_USER;

  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

  //get the username & password from tbl_usrs
  function _checkUserLogin($usr, $pwd)
  {
    $this->db->where('username', $usr);
    $this->db->where('password', $pwd);
    $query = $this->db->get($this->user_table);
    return $query->num_rows();
  }

  function _userInfoResult($agrs, $username) 
  {
    $agrs = implode(', ', $agrs);
    $this->db->select($agrs);
    $this->db->where('username', $username);
    $query = $this->db->get($this->user_table);
    return $query->result();
  }


}?>