<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	public function init()
	{
		$this->project();
		$this->forum_group();
		$this->forum_message();
		$this->user();
		$this->populate();
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
		],
			'num_rank' => [
				'type' => 'INTEGER',
				'constraint' => 2
		]
		]);
		$this->dbforge->create_table('users');

		$this->dbforge->drop_table('usersGroups', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
		]
		]);
		$this->dbforge->create_table('usersGroups');

		$this->dbforge->drop_table('ranks', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 40
		]
	]);
	$this->dbforge->create_table('ranks');
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
			'num_forum_group' => [
				'type' => 'INT'
			],
			'num_user' => [
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

	private function populate(){

		// Table 'usersGroups'
		$data = array(
		        'id' => 1,
		        'name' => 'Utitilsateur'
		);

		$this->db->insert('usersGroups', $data);

		$data = array(
		        'id' => 2,
		        'name' => 'Modérateur'
		);

		$this->db->insert('usersGroups', $data);

		$data = array(
		        'id' => 3,
		        'name' => 'Administrateur'
		);

		$this->db->insert('usersGroups', $data);

		// Table 'ranks'
		$data = array(
		        'id' => 1,
		        'name' => 'Débutant'
		);

		$this->db->insert('ranks', $data);

		$data = array(
						'id' => 2,
						'name' => 'Connaisseur'
		);

		$this->db->insert('ranks', $data);

		$data = array(
						'id' => 3,
						'name' => 'Avancé'
		);

		$this->db->insert('ranks', $data);

		$data = array(
						'id' => 4,
						'name' => 'Expert'
		);

		$this->db->insert('ranks', $data);

		$data = array(
						'id' => 5,
						'name' => 'Grand Expert'
		);

		$this->db->insert('ranks', $data);
	}
}
