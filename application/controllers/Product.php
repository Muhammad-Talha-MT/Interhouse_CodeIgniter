<?php
class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form'); //loading form helper
		$this->load->library('cart');
	}
	public function index()
	{
		$this->load->model('Brand_model');
		$this->load->model('Category_model');
		$this->load->model('Product_model');
		$products = $this->Product_model->getProducts();
		$list = array();
		$i = 0;
		foreach ($products as $p) {
			$products[$i]['brandName'] = $this->Brand_model->getBrandById($p['brandId'])['brandName'];
			$products[$i]['catagoryName'] = $this->Category_model->getCategoryById($p['catagoryId'])['categoryName'];
			$products[$i]['picture'] = $p['detail1'];
			$i = $i + 1;
		}
		$data['productList'] = $products;
		$this->load->view("Admin/products.php", $data);
	}
	public function goToEditProduct($id)
	{
		$this->load->model('Brand_model');
		$data['brands'] = $this->Brand_model->getBrands();
		$this->load->model('Category_model');
		$data['catagories'] = $this->Category_model->getCategories();
		$this->load->model('Product_model');
		$data['product'] = $this->Product_model->getProductsById($id);
		$this->load->view('Admin/editProduct.php', $data);
	}
	function deleteProduct($id)
	{
		$this->load->model('Product_model');
		$this->Product_model->delete($id);
		redirect(base_url() . 'Product');
	}
	function editProduct($id)
	{
		$this->load->helper('form'); //loading form helper
		$this->load->model('Product_model');
		$name = $this->input->post('productName');
		$dataToSend['productName'] = $name;
		$dataToSend['productDescription'] = $this->input->post('description');
		$dataToSend['price'] = $this->input->post('price');
		$dataToSend['brandId'] = $this->input->post('brand');
		$dataToSend['catagoryId'] = $this->input->post('catagory');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$imagestamp = time();
		$dataToSend['uniqueId'] = $imagestamp;
		$dataToSend['cover'] = $this->cover_upload($imagestamp, $name, 'coverImage');
		$dataToSend['detail1'] = $this->detail_upload($imagestamp, $name . '1', 'detailImage1');
		$dataToSend['detail2'] = $this->detail_upload($imagestamp, $name . '2', 'detailImage2');
		$dataToSend['detail3'] = $this->detail_upload($imagestamp, $name . '3', 'detailImage3');
		$this->Product_model->update($id, $dataToSend);
		redirect(base_url() . 'Product');
	}
	public function add()
	{
		$this->load->model('Brand_model');
		$data['brands'] = $this->Brand_model->getBrands();
		$this->load->model('Category_model');
		$data['catagories'] = $this->Category_model->getCategories();
		$this->load->view("Admin/addProduct.php", $data);
	}
	public function us()
	{
		$this->load->view("User/index.php");
	}
	public function cover_upload($imagestamp, $name, $image)
	{
		$config['upload_path'] = './upload/covers';
		$config['allowed_types'] = 'png|jpg|jpeg';
		//$config['max_size'] = '10000';
		$config['file_name'] = $name . $imagestamp;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->overwrite = true;
		if (!$this->upload->do_upload($image)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}
	public function detail_upload($imagestamp, $name, $image)
	{
		$config['upload_path'] = './upload/details';
		$config['allowed_types'] = 'png|jpg|jpeg';
		//$config['max_size'] = '10000';
		$config['file_name'] = $name . $imagestamp;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->overwrite = true;
		if (!$this->upload->do_upload($image)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}
	function findData()
	{
		$this->load->model('Product_model');
		$name = $this->input->post('productName');
		$dataToSend['productName'] = $name;
		$dataToSend['productDescription'] = $this->input->post('description');
		$dataToSend['price'] = $this->input->post('price');
		$dataToSend['brandId'] = $this->input->post('brand');
		$dataToSend['catagoryId'] = $this->input->post('catagory');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$imagestamp = time();
		$dataToSend['uniqueId'] = $imagestamp;
		$dataToSend['cover'] = $this->cover_upload($imagestamp, $name, 'coverImage');
		$dataToSend['detail1'] = $this->detail_upload($imagestamp, $name . '1', 'detailImage1');
		$dataToSend['detail2'] = $this->detail_upload($imagestamp, $name . '2', 'detailImage2');
		$dataToSend['detail3'] = $this->detail_upload($imagestamp, $name . '3', 'detailImage3');
		$this->Product_model->addProduct($dataToSend);
		redirect(base_url() . 'Product');
	}
	function productDetail($id)
	{
		$this->load->model('Product_model');
		$data['product'] = $this->Product_model->getProductsByUniqueId($id);
		$this->load->view('User/productDetail', $data);
	}

	function allproducts()
	{
		$this->load->model('Product_model');
		$data['products'] = $this->Product_model->getProducts();
		$this->load->library('cart');
		$this->load->view('User/allproducts', $data);
	}
}
