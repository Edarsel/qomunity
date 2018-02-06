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
    if (is_connected()){
      redirect(['user', 'profile']);
    }else{
      redirect(['user', 'login']);
    }
  }

  public function profile()
  {
    if (is_connected()){
      $this->load->view('templates/header');
      $this->load->view('pages/user/profile');
      $this->load->view('templates/footer');
    }else{
      redirect(['user', 'login']);
    }

  }

  function register()
  {
    if (!(is_connected())){
      $userinfo = (object)[];
      $userinfo->username = trim($this->input->post('username'));
  		$userinfo->email = trim($this->input->post('email'));

      // set form validation rules
      $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[users.username]');
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
        //Change le status de l'utilisateur en connecté
        $this->user_model->update_user_status($id,1);
        $user = $this->user_model->get_user($id);
        //$_SESSION['user'] = $user;
        $this->session->set_userdata('user',$user);

        redirect(['user', 'profile']);
      }
    }
    else {
      //Redirige vers la page précédente si l'utilisateur est connecté.
      redirect($this->session->userdata('previous_page'), 'refresh');
    }
  }

  public function login() {
    if (!(is_connected())){
      // create the data object
      $data = new stdClass();
      //$isEmail = false;

      // load form helper and validation library
      $this->load->helper('form');
      $this->load->library('form_validation');

      $userinfo = (object)[];

      $tempEmailField = trim($this->input->post('email'));

      // to validate the email
      if (valid_email($tempEmailField))
      {
        //echo 'email is valid';
        $userinfo->email = $tempEmailField;
      }else{
        // if the email isn't valid, we will then check the username
        //echo 'email is not valid';
        $userinfo->username = $tempEmailField;
      }

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
        $emailUsername = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->user_model->resolve_user_login($emailUsername, $password)) {

          $user_id = $this->user_model->get_user_id_from_username($emailUsername);
          //Change le status de l'utilisateur en connecté
          $this->user_model->update_user_status($user_id,1);
          //Récupération des info utilisateur
          $user = $this->user_model->get_user($user_id);

          // set session user datas
          //$_SESSION['user'] = $user;
          $this->session->set_userdata('user',$user);

          redirect(['user', 'profile']);
        }
        else
        {
          // login failed
          $data->error = 'Wrong username or password.';
          $data->userinfo = $userinfo;
          $this->session->set_flashdata('error', 'Erreur lors de la connexion.');
          // send error to the view
          $this->load->view('templates/header');
          $this->load->view('pages/user/login', compact('userinfo', 'data'));
          // $this->load->view('pages/user/login', compact('data'));
          $this->load->view('templates/footer');

        }
      }
    }else {
      redirect(['user', 'profile']);
    }
  }




  public function disconnect()
  {
    //Change le status de l'utilisateur en déconnecté
    $id_user = $this->session->userdata('user')->id;
    if ($this->user_model->update_user_status($id_user,2)){
    //DETRUIT LA VARIABLE DE SESSION => PLUS D'UTILISATEUR CONNECTE
    unset($_SESSION['user']);
    redirect(['user', 'login']);
    }
  }


  public function edit_profile()
  {
    $this->load->view('templates/header');
    $this->load->view('pages/user/edit_profile',compact('userinfo'));
    $this->load->view('templates/footer');

  }

  public function save_profile()
  {

    if (is_connected()){
      $userinfo = (object)[];
      $userinfo->profilePict = trim($this->input->post('profilepict'));
      $userinfo->biography = trim($this->input->post('biography'));

      // set form validation rules
      //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('profilepict', 'ProfilePicture', 'trim');
      $this->form_validation->set_rules('biography', 'Biography', 'trim');


      // submit
      if ($this->form_validation->run() == FALSE)
      {
        // fails
        $this->load->view('templates/header');
        $this->load->view('pages/user/edit_profile',compact('userinfo'));
        $this->load->view('templates/footer');
      }
      else
      {

        //$userinfo->email = trim($this->input->post('email'));


        $this->user_model->update_user_profile($this->session->userdata('user')->id, $userinfo->profilePict, $userinfo->biography);

        $user = $this->user_model->get_user($this->session->userdata('user')->id);

        $this->session->set_userdata('user',$user);
        redirect(['user', 'profile']);
      }
    }
    else {
      redirect(['user', 'login']);
    }
  }

  public function view_profile_user($id_user){
    $userinfo = $this->user_model->get_user($id_user);
    if ($userinfo){
    $this->load->view('templates/header');
    $this->load->view('pages/user/view_profile_user',compact('userinfo'));
    $this->load->view('templates/footer');
    }else {
      //Retour page précédente car user n'existe pas
      redirect($this->session->userdata('previous_page'), 'refresh');
    }
  }

  function reset_password()
  {
    if (is_connected()){
      $userinfo = (object)[];

      $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
      $this->form_validation->set_rules('cpassword', 'Check password', 'trim|required');

      // submit
      if ($this->form_validation->run() == FALSE)
      {
        // fails
        $this->load->view('templates/header');
        $this->load->view('pages/user/reset_pwd',compact('userinfo'));
        $this->load->view('templates/footer');
      }
      else
      {

        $password = $this->input->post('password');

        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->user_model->reset_password($this->session->userdata('user')->id,$password);

        $user = $this->user_model->get_user($this->session->userdata('user')->id);
        $this->session->set_userdata('user',$user);

        redirect(['user', 'profile']);
      }
    }
    else {
      //Redirige vers la page login si user n'est pas connecté
      redirect(['user', 'login']);
    }
  }

}
