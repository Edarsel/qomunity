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

  public function add(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->form_validation->set_rules('email', 'Adresse email', 'trim|required');
    $this->form_validation->set_rules('username', 'Utilisateur', 'trim|required');
    $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

    $userInfo = array('email'=>$email, 'username'=>$username,'password'=>password_hash($password, PASSWORD_DEFAULT), 'num_usersGroups'=>1,'num_ranks'=>1);

    if($this->form_validation->run())
    {
      $id = $this->user_model->add($userInfo);
      redirect(['user', 'view', $id]);
    }

    $this->load->view('templates/header');
    $this->load->view('pages/user/registration', compact('user'));
    $this->load->view('templates/footer');
  }
}
