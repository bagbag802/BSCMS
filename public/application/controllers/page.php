<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
		$this->load->model('page_model');
	}
	
	/**
	 * 
	 * Page Index
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

	public function create()
	{
		try {
			$this->edit();
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	public function view($page_id){
		$data['page'] = $this->page_model->get_page_by_id($page_id);
			$this->bsc_smarty->display('page.tpl', $data);
	}
	/**
	 * 
	 * Edit Page
	 * @param INT $page_id
	 */
	public function edit($page_id = null)
	{
		try {
			$data['page'] = null;
			if($page_id != null) {
				$data['page'] = $this->page_model->get_page_by_id($page_id);
			}
			$this->bsc_smarty->display('admin/page/page_edit.tpl', $data);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	/**
	 * 
	 * Save Page
	 * @param MIXED $data
	 * @param BOOL $draft
	 */
	public function save()
	{
		try {
			$post_data = $this->input->post(NULL, TRUE);
			$page_id = $this->page_model->save_page($post_data);
			$this->edit($page_id);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	public function delete($page_id)
	{
		try {
			$this->page_model->delete_page($page_id);
			$this->index();
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}