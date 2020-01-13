<?php
class Brand_model extends CI_Model
{
    public function addBrand($data)
	{
		$this->db->insert('brands', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
    }
    public function getBrands()
	{
		$this->db->select('*');
		$this->db->from('brands');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }
    function update($id, $updateData)
	{
		$this->db->where("id", $id);
		$this->db->update("brands", $updateData);
	}
    function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("brands");
    }
    function getBrandById($id)
	{
		$this->db->where("id", $id);
		return $this->db->get("brands")->row_array();
	}
}
?>