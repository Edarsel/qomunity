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
}