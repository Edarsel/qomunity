<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
		not_connected_redirect();

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
		$project->link = trim($this->input->post('link'));
		$project->num_user = $this->session->userdata('user')->id;

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
	private function AddMessageForm($id){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$message = (object)[];
		$message->message = trim($this->input->post('message'));
		$message->date = date("Y-m-d H:i:s");
		$message->num_user = $this->session->userdata('user')->id;
		$message->num_project = $id;

		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if($this->form_validation->run())
		{
			$id = $this->project_model->addMessage($message);
		}
	}
	public function view($id = -1)
	{
		if($id !== -1&&$project = $this->project_model->get($id)) {
			$project->Userlink=(xss_clean($project->user->id)==$this->session->userdata('user')->id)?site_url('user/profile/'):site_url('user/view_profile_user/'.$project->num_user);
			$this->AddMessageForm($id);
			$project->messages=$this->project_model->get_Project_Messages($id);
			$this->load->view('templates/header');
			$this->load->view('pages/project/view', compact('project'));
			$this->load->view('templates/footer');
		} else
		{
			show_404();
		}

	}
	public function listProject()
	{
		$projects = $this->project_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('pages/project/list',compact('projects'));
		$this->load->view('templates/footer');

	}
}
