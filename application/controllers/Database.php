<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	public function init()
	{
		$this->project();
		$this->forum_group();
		$this->forum_message();
		$this->user();
	}
	private function project()
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

	private function user()
	{
		$this->dbforge->drop_table('users', true);
		$this->dbforge->add_field("id");
		$this->dbforge->add_field([
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255
		],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
		],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255
		],
			'num_group' => [
				'type' => 'INTEGER',	// Référence au champ 'id' de la table role
				'constraint' => 1
		]
		]);
		$this->dbforge->create_table('users');

		$this->dbforge->drop_table('group', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
		]
		]);
		$this->dbforge->create_table('group');
	}

	private function forum_group()
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

	private function forum_message()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('forum_message', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'num_forum_group' => [ #foreign key
				'type' => 'INT'
			],
			'num_user' => [ #foreign key
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
