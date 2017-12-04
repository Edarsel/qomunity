<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_group_model extends CI_Model
{
    const TABLE = 'forum_group';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($forum_group)
    {
        $this->db->insert(self::TABLE, $forum_group);
		return $this->db->insert_id();
    }

    public function get($id)
    {
        return $this->db->get_where(self::TABLE, ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get(self::TABLE)->result();
    }
}
