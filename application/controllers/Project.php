<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function add()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$project = (object)[];
		$project->name = trim($this->input->post('name'));
		$project->description = trim($this->input->post('description'));

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		if($this->form_validation->run())
		{
			$id = $this->project_model->add($project);
			redirect(['project', 'view', $id]);
		}

		$this->load->view('templates/header');
		$this->load->view('pages/project/add', compact('project'));
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$project = $this->project_model->get($id);
		$this->load->view('templates/header');
		$this->load->view('pages/project/view', compact('project'));
		$this->load->view('templates/footer');
	}
}
