<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {

        $example = (object)[];
        $example->firstname = trim($this->input->post('firstname'));
        $example->password = trim($this->input->post('password'));
        $this->form_validation->set_rules('firstname', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]');
	    $this->form_validation->set_rules('password',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]');
        if($this->form_validation->run())
        {
            echo "<h1>OK</h1>";
        }
        else {

            $this->load->view('templates/example',compact('example'));
            echo "<h1>Erreur</h1>";
            echo $this->input->post('pseudo');
        }

    }

}
