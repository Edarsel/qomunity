<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
	const TABLE = 'project';

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
		return $this->db->get_where(self::TABLE, ['id' => $id])->row();
	}
}