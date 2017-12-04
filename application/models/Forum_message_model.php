<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_message_model extends CI_Model
{
    const TABLE = 'forum_message';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($forum_message)
    {
        $this->db->insert(self::TABLE, $forum_message);
		return $this->db->insert_id();
    }

    public function get($id)
    {
        return $this->db->get_where(self::TABLE, ['id' => $id])->row();
    }
}
