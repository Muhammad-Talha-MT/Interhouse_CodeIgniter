<?php
class service_model extends CI_Model
{
    public function addservice($data)
	{
		$this->db->insert('services', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
    }
    public function getservices()
	{
		$this->db->select('*');
		$this->db->from('services');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }
    function update($id, $updateData)
	{
		$this->db->where("id=", $id);
		$this->db->update("services", $updateData);
	}
    function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("services");
    }
    function getserviceById($id)
	{
		$this->db->where("id", $id);
		return $this->db->get("services")->row_array();
	}
}
?>