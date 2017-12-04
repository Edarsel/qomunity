<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	public function init()
	{
		$this->project();
		$this->forum();
	}
	public function project()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('project', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'description' => [
				'type' => 'TEXT'
			]
		]);
		$this->dbforge->create_table('project');
	}

	public function forum_group()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('forum_group', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			]
		]);
		$this->dbforge->create_table('forum_group');
	}

	public function forum_message()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('forum_message', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'num_forum_group' => [
				'type' => 'INT'
			],
			'num_users' => [
				'type' => 'INT'
			],
			'date' => [
				'type' => 'DATE'
			],
			'message' => [
				'type' => 'TEXT'
			]
		]);
		$this->dbforge->create_table('forum_message');
	}



}
