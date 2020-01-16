<?php
class Product extends CI_Controller
{
    public function index()
	{
        $this->load->model('Brand_model');
		$this->load->model('Category_model');
		$this->load->model('Product_model');
		$products=$this->Product_model->getProducts();
		$list=array();
		$i=0;
		foreach ($products as $p)
		{
			$products[$i]['brandName']=$this->Brand_model->getBrandById($p['brandId'])['brandName'];
			$products[$i]['catagoryName']=$this->Category_model->getCategoryById($p['catagoryId'])['categoryName'];
			$products[$i]['picture']=$p['detail1'];
			$i=$i+1;
		}
		$data['productList']=$products;
		$this->load->view("Admin/products.php",$data);  
	}
	function deleteProduct($id)
	{
        $this->load->model('Product_model');
		$this->Product_model->delete($id);
		redirect(base_url() . 'Product');
	}
	public function addProduct()
	{
		$this->load->model('Brand_model');
		$data['brands'] = $this->Brand_model->getBrands();
		$this->load->model('Category_model');
		$data['catagories'] = $this->Category_model->getCategories();
        $this->load->view("Admin/addProduct.php",$data);
	}
	public function us()
	{
        $this->load->view("User/product.php");
	}
	public function cover_upload($imagestamp,$name,$image)
	{
		$config['upload_path'] = './upload/covers';
		$config['allowed_types'] = 'png';
		$config['max_size'] = '10000';
		$config['min_width']  = '200';
        $config['min_height']  = '300';
        $config['file_name']=$name.$imagestamp;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($image)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $data['full_path']; //get original image
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 200;
			$config['height'] = 300;
			$this->load->library('image_lib', $config);
			if (!$this->image_lib->resize()) {
				$this->handle_error($this->image_lib->display_errors());
			}
			return $data['file_name'];
		}
	}
    public function detail_upload($imagestamp,$name,$image)
	{
		$config['upload_path'] = './upload/details';
		$config['allowed_types'] = 'png';
		$config['max_size'] = '10000';
		$config['min_width']  = '200';
        $config['min_height']  = '300';
        $config['file_name']=$name.$imagestamp;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($image)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $data['full_path']; //get original image
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 200;
			$config['height'] = 300;
			$this->load->library('image_lib', $config);
			if (!$this->image_lib->resize()) {
				$this->handle_error($this->image_lib->display_errors());
			}
			return $data['file_name'];
		}
	}
    public function newProduct()
    {
		$this->load->model('Product_model');
		$name= $this->input->post('productName');
		$dataToSend['productName'] =$name;
		$dataToSend['productDescription'] = $this->input->post('description');
		$dataToSend['price'] = $this->input->post('price');
		$dataToSend['brandId'] = $this->input->post('brand');
		$dataToSend['catagoryId'] = $this->input->post('catagory');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$imagestamp=time();
		$dataToSend['uniqueId']=$imagestamp;
		$dataToSend['cover']= $this->cover_upload($imagestamp,$name,'coverImage');
		$dataToSend['detail1']= $this->detail_upload($imagestamp,$name.'1','detailImage1');
		$dataToSend['detail2']= $this->detail_upload($imagestamp,$name.'2','detailImage2');
		$dataToSend['detail3']= $this->detail_upload($imagestamp,$name.'3','detailImage3');
		$this->Product_model->addProduct($dataToSend);
		redirect(base_url() . 'Product');
	}
	
}

?>