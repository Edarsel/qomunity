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
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'biography' => [
				'type' => 'TEXT',
				'constraint' => 255
			],
			'profilePict' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'num_usersGroups' => [
				'type' => 'INTEGER',	// Référence au champ 'id' de la table role
				'constraint' => 1
			],
			'num_ranks' => [
				'type' => 'INTEGER',
				'constraint' => 2
			],
			'num_status' => [
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

		$this->dbforge->drop_table('status', true);
		$this->dbforge->add_field('id');
		$this->dbforge->add_field([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 40
			]
		]);
		$this->dbforge->create_table('status');
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
			'name' => 'Utitilsateur'
		);

		$this->db->insert('usersGroups', $data);

		$data = array(
			'name' => 'Modérateur'
		);

		$this->db->insert('usersGroups', $data);

		$data = array(
			'name' => 'Administrateur'
		);

		$this->db->insert('usersGroups', $data);

		// Table 'ranks'
		$data = array(
			'name' => 'Débutant'
		);

		$this->db->insert('ranks', $data);

		$data = array(
			'name' => 'Connaisseur'
		);

		$this->db->insert('ranks', $data);

		$data = array(
			'name' => 'Avancé'
		);

		$this->db->insert('ranks', $data);

		$data = array(
			'name' => 'Expert'
		);

		$this->db->insert('ranks', $data);

		$data = array(
			'name' => 'Grand Expert'
		);

		$this->db->insert('ranks', $data);

		//INSERT pour la table status
		$data = array(
			'name' => 'Connecté'
		);

		$this->db->insert('status', $data);

		$data = array(
			'name' => 'Déconnecté'
		);

		$this->db->insert('status', $data);

		$data = array(
			'name' => 'Ne pas déranger'
		);

		$this->db->insert('status', $data);

		$data = array(
			'name' => 'Absent'
		);

		$this->db->insert('status', $data);
	}
}
