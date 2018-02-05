<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
	const TABLE = 'project';
	const TABLE_MESSAGE='project_message';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($project)
	{
		$this->db->insert(self::TABLE, $project);
		return $this->db->insert_id();
	}

	public function get($id)
	{
		return $this->load_user($this->db->get_where(self::TABLE, ['id' => $id])->row());
	}
	public function getAll()
	{
		$projects = $this->db->get(self::TABLE)->result();
		for ($i = 0; $i < sizeof($projects); $i++)
		{
			$projects[$i] = $this->load_user($projects[$i]);
		}
		return $projects;
	}

	private function load_user($project)
	{
		$this->load->model('user_model');
		$project->user = $this->user_model->get_user($project->num_user);
		return $project;
	}

	public function get_Project_Messages($id){
		$messages = $this->db->get_where(self::TABLE_MESSAGE, ['num_project' => $id])->result();
		for ($i = 0; $i < sizeof($messages); $i++)
		{
			$messages[$i] = $this->load_user($messages[$i]);
		}
		return $messages;
	}

	public function addMessage($message){
		$this->db->insert(self::TABLE_MESSAGE, $message);
		return $this->db->insert_id();
	}
}
