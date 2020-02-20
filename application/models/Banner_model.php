<?php
class Banner_model extends CI_Model
{
    public function addBanner($data)
	{
		$this->db->insert('banners', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
    }
    public function getBanners()
	{
		$this->db->select('*');
		$this->db->from('banners');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }
    function update($id, $updateData)
	{
		$this->db->where("id=", $id);
		$this->db->update("banners", $updateData);
	}
    function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("banners");
    }
    function getBannerById($id)
	{
		$this->db->where("id", $id);
		return $this->db->get("banners")->row_array();
	}
}
?>