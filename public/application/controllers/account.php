<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
		$this->load->model('account_model');
	}
	
	/**
	 * 
	 * Account Index
	 */
	public function index()
	{
		try {
			$data['pages'] = null;
			$data['pages'] = $this->page_model->get_pages();
			$this->bsc_smarty->display('admin/page/pages.tpl', $data);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}