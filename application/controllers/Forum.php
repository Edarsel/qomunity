<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Déclaration de la classe 'Forum'
class Forum extends CI_Controller
{
    // instantiation du constructeur de base
    public function __construct(){
        parent::__construct();
        $this->load->model("forum_group_model");
        //$this->load->model("forum_message_model");
    }
    // Charge la view qui permet d'ajoute les groupes dans la base de donnée
    public function add(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $forum = (object)[];
        $forum->name = trim($this->input->post('name'));
        $forum->description = trim($this->input->post('description'));

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[50]|unique[forum_group.name]');
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[255]');
        if ($this->form_validation->run()) {
            $id = $this->forum_group_model->add($forum_group);
			redirect(['forum', 'view', $id]);
        }

        $this->load->view('templates/header');
        $this->load->view('pages/forum/add', compact('forum'));
        $this->load->view('templates/footer');
    }
    //  
    public function view($id){
        $groups = $this->forum_group_model->get_all();
        $list = $this->load->view('pages/forum/_list', compact('groups'), true);
        $group = $this->forum_group_model->get($id);
        $this->load->view('templates/header');
        $this->load->view('pages/forum/view', compact('group', 'list'));
        $this->load->view('templates/footer');
    }

    //
    public function send_message(){
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $this->load->library('form_validation');

        $forum = (object)[];
        $forum->message = trim($this->input->post('message'));

        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run()) {
            $id = $this->forum_message_model->add($forum_message);
			echo json_encode($forum);
        }
    }


}
