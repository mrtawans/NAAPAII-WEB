<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index() {
          if(!($this->session->userdata('logged_in'))) {
               redirect('User/login');
          } 
     }

     public function login()
     {
          if(!($this->session->userdata('logged_in'))) {
               //get the posted values
               $username = $this->input->post("txt_username");
               $password = $this->input->post("txt_password");

               //set validations
               $this->form_validation->set_rules("txt_username", "Username", "trim|required");
               $this->form_validation->set_rules("txt_password", "Password", "trim|required");

               if ($this->form_validation->run() == FALSE)
               {
                    //validation fails
                    $this->load->view('templates/header');
                    $this->load->view('login_view');
                    $this->load->view('templates/footer');
               }
               else
               {
                    //validation succeeds
                    if ($this->input->post('btn_login') == "Login")
                    {
                         //check if username and password is correct
                         $usr_result = $this->login_model->get_user($username, $password);
                         if ($usr_result > 0) //active user record is present
                         {
                              //set the session variables
                              $sessiondata = array(
                                   'logged_in' => TRUE,
                                   'username' => $username,
                                   'loginuser' => TRUE
                              );
                              $this->session->set_userdata($sessiondata);
                              redirect(site_url());
                         }
                         else
                         {
                              $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                              redirect('User/welcome');
                         }
                    }
                    else
                    {
                         redirect('User/welcome');
                    }
               }
          } else {
               redirect('User/index');
          }
     }

     public function logout(){
          $this->session->sess_destroy();
          redirect('User/login');
     }
}?>