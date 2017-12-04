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

    $user = (object)[];
    $user->email = trim($this->input->post('email'));
    $user->username = trim($this->input->post('username'));
    $user->password = trim($this->input->post('password'));

    $this->form_validation->set_rules('email', 'Adresse email', 'trim|required');
    $this->form_validation->set_rules('username', 'Utilisateur', 'trim|required');
    $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

    if($this->form_validation->run())
    {
      $id = $this->user_model->add($user);
      redirect(['user', 'view', $id]);
    }

    $this->load->view('templates/header');
    $this->load->view('pages/user/registration', compact('user'));
    $this->load->view('templates/footer');
  }
}
