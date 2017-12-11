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

<<<<<<< HEAD
  public function profile()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->load->view('templates/header');
    $this->load->view('pages/user/profile', compact('user'));
    $this->load->view('templates/footer');
  }

  public function add()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
=======
    function add()
    {
        // set form validation rules
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Check password', 'trim|required');

        // submit
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('pages/user/registration_new');
        }
        else
        {

            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $userInfo = array('username'=>$username, 'email'=>$email,'password'=>password_hash($password, PASSWORD_DEFAULT), 'num_usersGroups'=>1,'num_ranks'=>1);

            {
              $id = $this->user_model->add($userInfo);
              redirect(['user', 'profile', $id]);
            }

            if ($this->user_model->insert_user($data))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
                redirect('pages/user/profile');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('pages/user/registration_2');
            }
        }
    }
>>>>>>> ChevreLo/master

    public function login() {

		// create the data object
		$data = new stdClass();

		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
    $this->form_validation->set_rules("email", "Email-ID", "trim|required|xss_clean");
    $this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

		if ($this->form_validation->run() == false) {

			// validation not ok, send validation errors to the view
			$this->load->view('templates/header');
			$this->load->view('pages/user/login');
			$this->load->view('templates/footer');

<<<<<<< HEAD
    if($this->form_validation->run() == FALSE)
    {
      if(isset($this->session->userdata['logged_in']))
      {
        $this->load->view('pages/user/profile', compact('user'));
      }
      else
      {
        $this->load->view('pages/user/login', compact('user'));
      }
    }
    else
    {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );
    }
=======
		} else {
>>>>>>> ChevreLo/master

			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->user_model->resolve_user_login($email, $password)) {

				$user_id = $this->user_model->get_user_id_from_username($email);
				$user    = $this->user_model->get_user($user_id);

        //var_dump($user);

				// set session user datas
				$_SESSION['user']               = $user;

        echo 'Connexion réussie';

				// user login ok
				$this->load->view('templates/header');
				$this->load->view('pages/user/profile', $data);
				$this->load->view('templates/footer');

			}
      else
      {
<<<<<<< HEAD
        $session_data = array(
          'username' => $result[0]->username,
          'email' => $result[0]->email,
        );

        $this->session->set_userdata('logged_in', $session_data);
        $this->load->view('pages/user/profile', compact('user'));
      }
    }
    else
    {
      $data = array(
        'error_message' => 'Invalid Username or Password'
      );
=======
>>>>>>> ChevreLo/master

				// login failed
				$data->error = 'Wrong username or password.';

				// send error to the view
				$this->load->view('templates/header');
				$this->load->view('pages/user/login', $data);
				$this->load->view('templates/footer');

			}
		}
	}
}
