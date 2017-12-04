<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    const TABLE = 'users';

    public function __construct()
  	{
  		parent::__construct();
  		$this->load->database();
  	}

    public function add($user){
      $this->db->insert(self::TABLE, $user);
    }
}
