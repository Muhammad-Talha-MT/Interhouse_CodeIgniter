<?php
class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Category_model');
	}
	public function index()
	{
		$data['categories'] = $this->Category_model->getCategories();
		$this->load->view('Admin/categories.php', $data);
	}

	public function Add()
	{
		$this->load->view('Admin/addCategory.php');
	}

	public function goToEditCategory($id)
	{
		$data['category'] = $this->Category_model->getCategoryById($id);
		$this->load->view('Admin/editCategory.php', $data);
	}

	function editCategory($id)
	{
		$dataToSend['categoryName'] = $this->input->post('categoryName');
		$dataToSend['categoryDescription'] = $this->input->post('description');
		$dataToSend['metaTitle'] = $this->input->post('metaTitle');
		$dataToSend['metaDescription'] = $this->input->post('metaDescription');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$this->Category_model->update($id, $dataToSend);
		redirect(base_url() . 'Category');
	}

	function deleteCategory($id)
	{
		$this->Category_model->delete($id);
		redirect(base_url() . 'Category');
	}

	public function newCategory()
	{
		$this->load->model('Category_model');
		$dataToSend['categoryName'] = $this->input->post('categoryName');
		$dataToSend['categoryDescription'] = $this->input->post('description');
		$dataToSend['metaTitle'] = $this->input->post('metaTitle');
		$dataToSend['metaDescription'] = $this->input->post('metaDescription');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$this->Category_model->addCategory($dataToSend);
		redirect(base_url() . 'Category');
	}
}
