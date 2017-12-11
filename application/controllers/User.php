<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index()
  {
    $this->load->view('welcome_message');
  }

  public function profile()
  {
    if ($this->isConnected()){
      $this->load->view('templates/header');
      $this->load->view('pages/user/profile');
      $this->load->view('templates/footer');
    }else{
      redirect(['user', 'login']);
    }

  }

  public function isConnected()
  {
    $isConnected = false;

    //SI LA VARIABLE DE SESSION EXISTE => UN UTILISATEUR EST CONNECTE
    if ($this->session->has_userdata('user')){
      $isConnected = true;
    }
    return $isConnected;
  }

  function add()
  {
    $userinfo = (object)[];
    $userinfo->username = trim($this->input->post('username'));
		$userinfo->email = trim($this->input->post('email'));

    // set form validation rules
    $this->form_validation->set_rules('username', 'Username','trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
    $this->form_validation->set_rules('cpassword', 'Check password', 'trim|required');

    // submit
    if ($this->form_validation->run() == FALSE)
    {
      // fails
      $this->load->view('templates/header');
      $this->load->view('pages/user/registration',compact('userinfo'));
      $this->load->view('templates/footer');
    }
    else
    {

      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $userInfo = array('username'=>$username, 'email'=>$email,'password'=>password_hash($password, PASSWORD_DEFAULT), 'num_usersGroups'=>1,'num_ranks'=>1);

      $id = $this->user_model->add($userInfo);

      $user = $this->user_model->get_user($id);
      $_SESSION['user'] = $user;

      //Change le status de l'utilisateur en déconnecté
      $this->user_model->update_user_status($id,1);
      redirect(['user', 'profile']);
    }
  }

  public function login() {

    // create the data object
    $data = new stdClass();

    // load form helper and validation library
    $this->load->helper('form');
    $this->load->library('form_validation');

    $userinfo = (object)[];
		$userinfo->email = trim($this->input->post('email'));

    // set validation rules
    $this->form_validation->set_rules("email", "Email-ID", "trim|required|xss_clean");
    $this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

    if ($this->form_validation->run() == false) {

      // validation not ok, send validation errors to the view
      $this->load->view('templates/header');
      $this->load->view('pages/user/login',compact('userinfo'));
      $this->load->view('templates/footer');

    } else {

      // set variables from the form
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      if ($this->user_model->resolve_user_login($email, $password)) {

        $user_id = $this->user_model->get_user_id_from_username($email);
        $user = $this->user_model->get_user($user_id);

        // set session user datas
        $_SESSION['user'] = $user;

        // user login ok
        //Change le status de l'utilisateur en déconnecté
        $this->user_model->update_user_status($user_id,1);
        redirect(['user', 'profile']);
      }
      else
      {
        // login failed
        $data->error = 'Wrong username or password.';

        // send error to the view
        $this->load->view('templates/header');
        $this->load->view('pages/user/login', compact('userinfo'));
        $this->load->view('templates/footer');

      }
    }
  }




  public function disconnect()
  {
    //Change le status de l'utilisateur en déconnecté
    $this->user_model->update_user_status($_SESSION['user']->id,2);
    //DETRUIT LA VARIABLE DE SESSION => PLUS D'UTILISATEUR CONNECTE
    unset($_SESSION['user']);
  }
}
