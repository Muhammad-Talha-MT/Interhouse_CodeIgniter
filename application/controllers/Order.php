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
		$this->emailSend($data['email'], $data['status'], $data['orderid']);
		$this->cart->destroy();
		$this->session->set_flashdata('order', 'You Order is placed successfully make sure you recived email. And your order Id is ' . $id);
		$this->load->view("User/successOrder");
	}

	public function showOrders()
	{
		$this->load->model('Order_model');
		$data['Order_list'] = $this->Order_model->getOrders();
		$this->load->view("Admin/orders", $data);
	}

	public function detail($id)
	{
		$this->load->model('Order_model');
		$data["orderdetail_list"] = $this->Order_model->getOrderDetail($id);
		$this->load->view('Admin/orderdetail', $data);
	}

	public function delete($orderId)
	{
		$this->load->model('Order_model');
		$this->Order_model->deleteOrder($orderId);
		redirect(base_url() . "order/showOrders");
	}

	public function emailSend($to_email, $status, $orderid)
	{
		$config = array(
			'protocol' => 'ssmtp',
			'smtp_host' => 'ssl://ssmtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'ali@interhouse.pk',
			'smtp_pass' => 'ali@interhouse',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);


		$this->load->library('email');
		$this->email->initialize($config);

		$from_email = "ali@interhouse.pk";
		$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#FFFFF;padding-left:3%"><img src="http://interhouse.pk/Interhouse/resources/User/images/icons/logo.png" alt="IMG-LOGO" width="200px></td></tr>';
		$emailContent .= '<tr><td style="height:20px"></td></tr>';


		$emailContent .= "<h3>You have palced your order with order id: " . $orderid . '</h3>';

		$emailContent .= '<tr><td style="height:20px"></td></tr>';
		$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
		//Load email library
		$this->load->library('email');
		$this->email->from($from_email, 'Interhouse');
		$this->email->to($to_email);
		$this->email->subject('Order Placement');
		$this->email->message($emailContent);
		//Send mail
		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "You have encountered an error");
		}
	}
}
