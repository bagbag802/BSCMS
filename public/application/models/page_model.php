<?php
class page_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database('scotchbox');
    }
	public function get_pages(){
		$pages = array();
		$query = $this->db->get('pages');
		foreach ($query->result() as $row)
		{
			$pages[] = array(
				'id' => $row->id,
				'title' => $row->title,
				'content' =>  $row->content
			);
		}
		return $pages;
	}
	public function get_page_by_id($page_id){
		$page = array();
		$query = $this->db->get_where('pages', array('id' => $page_id));
		foreach ($query->result() as $row)
		{
			$page = array(
				'id' => $row->id,
				'title' => $row->title,
				'content' =>  $row->content
			);
		}
		return $page;
	}
	public function save_page($data){
		if($data['id'] != null){
			$this->db->replace('pages', $data);
			$page_id = $data['id'];
		} else {
			$this->db->insert('pages', $data);
			$page_id = $this->db->insert_id();
		}
		return $page_id;
	}
	public function delete_page($page_id){
		$this->db->delete('pages', array('id' => $page_id));
		return $page_id;
	}

}