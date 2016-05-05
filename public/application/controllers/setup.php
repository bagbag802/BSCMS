<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setup extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
		$this->load->dbforge();
	}
	public function index()
	{
		try {
			$this->create_db();
			$this->create_tables();
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	public function create_db()
	{
		try {
			if (!$this->dbutil->database_exists('scotchbox'))
			{
				if ($this->dbforge->create_database('scotchbox'))
				{
					echo 'scotchbox created!';
				} else{
					echo 'There was a problem creating database scotchbox<br>';
				}
			}else{
				echo 'db exists<br>';
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	public function create_tables()
	{
		try {
			$this->config->load('db_architecture');
			$tables = $this->config->item('tables');
			foreach($tables as $table) {
				if (!$this->db->table_exists($table['title'])) {
					if($this->insert_table($table)){
						echo $table['title'] . ': table created!<br>';
					} else{
						echo $table['title'] . ': There was a problem<br>';
					}
				}else{
					echo $table['title'] . ': table exists<br>';
				}
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	public function insert_table($table)
	{
		try {
			$this->dbforge->add_field($table['fields']);
			foreach($table['keys'] as $key) {
				$this->dbforge->add_key($key, TRUE);
			}
			$this->dbforge->create_table($table['title']);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}
