<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// déclaration de la clasee message
class Forum_message_model extends CI_Model
{
    const TABLE = 'forum_message';

    // constructeur de base
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // ajout des messages dans la base de donnée
    public function add($forum_message)
    {
        $this->db->insert(self::TABLE, $forum_message);
		return $this->db->insert_id();
    }

    // récupération des messages dans la base de donnnée
    public function get($id)
    {
        return $this->db->get_where(self::TABLE, ['id' => $id])->row();
    }

    public function get_all($id)
    {
        return $this->db->get(self::TABLE, ['num_forum_group' => $id])->result();
    }
}
