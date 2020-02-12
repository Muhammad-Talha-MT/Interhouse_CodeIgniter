<?php
class Product_model extends CI_Model
{
    public function addProduct($data)
	{
		$this->db->insert('products', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
    }
    public function getProducts()
	{
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }
    function update($id, $updateData)
	{
		$this->db->where("id", $id);
		$this->db->update("products", $updateData);
	}
    function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("products");
    }
    function getProductsById($id)
	{
		$this->db->where("id", $id);
		return $this->db->get("products")->row_array();
	}
	
	function getProductsByUniqueId($id)
	{
		$this->db->where('uniqueId',$id);
		return $this->db->get("products")->row_array();
	}
}
?>