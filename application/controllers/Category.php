<?php
class Category extends CI_Controller
{
	public function Add()
	{
		$this->load->view('Admin/addCategory.php');
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
		$this->load->view('Admin/index.php');
	}
}
