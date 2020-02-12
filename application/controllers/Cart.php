<?php
class Cart extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->library('cart');
	}
	public function index()
	{
		$this->load->view('User/shoping-cart');
	}
	public function addCart($id)
	{
		$product = $this->Product_model->getProductsByUniqueId($id);
		$qty = $this->input->post('num-product');
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $product['price'],
			'name'    => $product['productName'],
			'image' => $product['cover'],
			'shipping' => 0,
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('cartAdded', 'You Product is Added to cart');
		$this->load->view('User/shoping-cart');
	}
	public function updateCart()
	{
		$data = array(
			'rowid'  =>	$this->input->post('item-rowid'),
			'qty'    => $this->input->post('item-qty'),
		);

		$this->cart->update($data);
		redirect(base_url() . 'cart');
	}
	public function checkOut()
	{
		$this->load->view('User/checkOut');
	}
}
