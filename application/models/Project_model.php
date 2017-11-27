<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
	
	public function __constructor()
	{
		parent::__constructor();
		$this->load->database();
	}
}