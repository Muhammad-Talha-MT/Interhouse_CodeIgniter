<?php
class Order extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model');
		$this->load->library('cart');
	}
	public function placeOrder()
	{
		$data['orderid'] = time();
		$data['userId'] = 1;
		$data['grandTotal'] = $this->input->post('grandTotal');
		$data['address'] = $this->input->post('address');
		$data['contact'] = $this->input->post('phoneNo');
		$data['email'] = $this->input->post('email');
		$data['orderDate'] = date('Y-m-d');
		$data['status'] = "Pending";
		$id = $this->Order_model->placeOrder($data);
		foreach ($this->cart->contents() as $cart) {
			$orderDetail['orderid'] = $id;
			$orderDetail['productid'] = $cart['id'];
			$orderDetail['qty'] = $cart['qty'];
			$orderDetail['price'] = $cart['price'];
			$this->Order_model->saveOrderDetail($orderDetail);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('order', 'You Order is placed successfully make sure you recived email. And your order Id is' . $id);
		$this->load->view("user/checkOut");
	}

	public function showOrders()
	{
		$this->load->model('Order_model');
		$data['Order_list'] = $this->Order_model->getOrders();
		$this->load->view("admin/orders", $data);
	}

	public function detail($id)
	{
		$this->load->model('Order_model');
		$data["orderdetail_list"] = $this->Order_model->getOrderDetail($id);
		$this->load->view('admin/orderdetail', $data);
	}

	public function delete($orderId)
	{
		$this->load->model('Order_model');
		$this->Order_model->deleteOrder($orderId);
		redirect(base_url() . "order/showOrders");
	}
}
