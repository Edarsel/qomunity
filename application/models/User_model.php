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
    return $this->db->insert_id();
  }

  public function resolve_user_login($emailUsername, $password) {

    $this->db->select('password');
    $this->db->from('users');

    if (valid_email($emailUsername))
    {
      $this->db->where('email', $emailUsername);
    }else {
      $this->db->where('username', $emailUsername);
    }

    $hash = $this->db->get()->row('password');
    return $this->verify_password_hash($password, $hash);

  }

  public function get_user_id_from_username($emailUsername) {

    $this->db->select('id');
    $this->db->from('users');

    if (valid_email($emailUsername))
    {
      $this->db->where('email', $emailUsername);
    }else {
      $this->db->where('username', $emailUsername);
    }

    return $this->db->get()->row('id');
  }

  public function get_user($user_id) {
    $this->db->select('users.id, email, username, biography, profilepict, num_usersGroups, num_ranks, num_status, status.name AS status_name, ranks.name AS rank_name, usersgroups.name AS usergroup_name');
    $this->db->from('users');
    //$this->db->from('status');
    $this->db->join('status', 'users.num_status = status.id');
    $this->db->join('ranks', 'users.num_ranks = ranks.id');
    $this->db->join('usersgroups', 'users.num_usersGroups = usersgroups.id');
    $this->db->where('users.id', $user_id);
    return $this->db->get()->row();

  }

  public function update_user_status($user_id,$id_status) {

    $data = array('num_status' => $id_status);

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);

  }

  public function update_user_profile($user_id,$profilepict, $biography) {

    $data = array('profilepict' => $profilepict, 'biography' => $biography);

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);

  }

  public function reset_password($user_id,$password) {

    $data = array('password' => $password);

    $this->db->where('id', $user_id);
    return $this->db->update('users', $data);

  }

  private function hash_password($password) {

    return password_hash($password, PASSWORD_BCRYPT);

  }

  private function verify_password_hash($password, $hash) {

    return password_verify($password, $hash);

  }
}
