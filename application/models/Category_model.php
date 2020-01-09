<?php
class Category_model extends CI_Model
{
	public function addCategory($data)
	{
		$this->db->insert('categories', $data);
		$lastId = $this->db->insert_id();


		return  $lastId;
	}
}
