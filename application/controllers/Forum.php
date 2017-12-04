<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model("forum_message_model");
    }

    public function add()
    {
        $this->load->helper('form');

        $this->load->library('form_validation');
        $forum = (object)[];
        $forum->name = trim($this->input->post('name'));
        $forum->description = trim($this->input->post('description'));

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[50]|unique[forum_group.name]');
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[255]');

        if ($this->form_validation->run()) {
            echo 'OK';
        }

        $this->load->view('templates/header');
        $this->load->view('pages/forum/add', compact('forum'));
        $this->load->view('templates/footer');
    }
}
