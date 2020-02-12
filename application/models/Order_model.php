<?php
class Order_model extends CI_Model
{
	function placeOrder($data)
	{
		$this->db->insert('orders', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
	}
	function saveOrderDetail($data)
	{
		$this->db->insert('orderdetail', $data);
		$lastId = $this->db->insert_id();
		return  $lastId;
	}

	public function deleteOrder($orderId)
	{
		$this->db->where("orderid", $orderId);
		$this->db->delete("orders");
	}

	function getOrders()
	{
		$this->db->select('*');
		$this->db->from('orders');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function getOrderDetail($id)
	{
		$this->db->where('orderid', $id);
		return $this->db->get("orderdetail")->result_array();
	}
}
