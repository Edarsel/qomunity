<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

	public function init()
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
}
