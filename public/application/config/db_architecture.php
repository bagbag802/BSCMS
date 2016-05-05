<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['tables'] = array (
	'pages' => array(
		'title' => 'pages',
		'keys' => array('id', 'page_title'),
		'fields' => array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE
			),
			'content' => array(
				'type' => 'TEXT',
				'null' => TRUE
			)
		)
	),
	'users' => array(
		'title' => 'users',
		'keys' => array('id'),
		'fields' => array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'account_level' => array(
				'type' => 'INT',
				'constraint' => 5,
				'null' => FALSE
			),
		)
	)
);