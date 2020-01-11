<?php
class Category_model extends CI_Model
{
	public function addCategory($data)
	{
		$this->db->insert('categories', $data);
		$lastId = $this->db->insert_id();


		return  $lastId;
	}

	public function getCategories()
	{
		$this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("categories");
	}

	function update($id, $updateData)
	{
		$this->db->where("id", $id);
		$this->db->update("categories", $updateData);
	}

	function getCategoryById($id)
	{
		$this->db->where("id", $id);
		return $this->db->get("categories")->row_array();
	}
}
