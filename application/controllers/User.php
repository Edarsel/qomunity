<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // Load database
    $this->load->model('project_model');
  }

  // Show login page
  public function login() {
    $this->user_login_process();

    $this->load->view('templates/header');
    $this->load->view('pages/user/login');
    $this->load->view('templates/footer');
  }

  // Show registration page
  public function registration() {
    $this->new_user_registration();
    
    $this->load->view('templates/header');
    $this->load->view('pages/user/registration');
    $this->load->view('templates/footer');
  }

  // Validate and store registration data in database
  public function new_user_registration() {
    $dataRegistration = (object)[];

    // Check validation for user input in SignUp form
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      //Si l'inscription n'est pas valide on affiche la même page
      //$this->load->view('pages/user/registration');
    } else {
  		$dataRegistration->user_name = trim($this->input->post('username'));
      $dataRegistration->user_email = trim($this->input->post('email'));
      $dataRegistration->user_password = trim($this->input->post('password'));

      //fonction du modèle pour enregistrer un user
      $result = $this->project_model->register_new_user($dataRegistration);
      if ($result == TRUE) {
        $dataRegistration->message_display = 'Registration Successfully !';
        //$data['message_display'] = 'Registration Successfully !';
        //$this->load->view('pages/user/login', $dataRegistration);
      } else {
        $dataRegistration->message_display = 'Username already exist!';
        //$data['message_display'] = 'Username already exist!';
        //$this->load->view('pages/user/registration', $dataRegistration);
      }
    }
  }

  // Check for user login process
  public function user_login_process() {

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        //$this->load->view('pages/user/login');
    } else {
      $dataLogin = (object)[];
  		$dataLogin->user_name = trim($this->input->post('username'));
      $dataLogin->user_password = trim($this->input->post('password'));

      /*$dataLogin = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );*/

      $result = $this->project_model->login($dataLogin);
      if ($result == TRUE) {

        $username = $this->input->post('username');
        $result = $this->project_model->read_user_information($username);
        if ($result != false) {
          $session_data = array(
            'username' => $result[0]->name,
            'email' => $result[0]->email,
          );
          // Add user data in session
          $this->session->set_userdata('logged_in', $session_data);
          $this->load->view('nom de la page à afficher'); //Définir la page à afficher après la connexion
        }
      } else {
        $dataLogin->message_display = 'Invalid Username or Password';
        /*$data = array(
          'error_message' => 'Invalid Username or Password'
        );*/
        $this->load->view('pages/user/login', $dataLogin);
      }
    }
  }

  // Logout from admin page
  public function logout() {

    // Removing session data
    $sess_array = array(
      'username' => ''
    );
    $this->session->unset_userdata('logged_in');
    $data['message_display'] = 'Successfully Logout';
    $this->load->view('pages/user/login', $data);
  }
}
