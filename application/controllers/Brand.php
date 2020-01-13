<?php
class Brand extends CI_Controller
{

    public function index()
	{
        $this->load->model('Brand_model');
		$data['brands'] = $this->Brand_model->getBrands();
        $this->load->view('Admin/brands.php', $data);
    }
    public function Add()
	{
		$this->load->view('Admin/addBrand.php');
    }
    public function goToEditBrand($id)
	{
        $this->load->model('Brand_model');
        $data['brand'] = $this->Brand_model->getBrandById($id);
		$this->load->view('Admin/editBrand.php', $data);
    }
    function editBrand($id)
	{
        $this->load->model('Brand_model');
		$dataToSend['brandName'] = $this->input->post('brandName');
		$dataToSend['brandDescription'] = $this->input->post('description');
		$dataToSend['metaTitle'] = $this->input->post('metaTitle');
		$dataToSend['metaDescription'] = $this->input->post('metaDescription');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$this->Brand_model->update($id, $dataToSend);
		redirect(base_url() . 'Brand');
	}
    function deleteBrand($id)
	{
        $this->load->model('Brand_model');
		$this->Brand_model->delete($id);
		redirect(base_url() . 'Brand');
	}
    public function newBrand()
	{
		$this->load->model('Brand_model');
		$dataToSend['brandName'] = $this->input->post('brandName');
		$dataToSend['brandDescription'] = $this->input->post('description');
		$dataToSend['metaTitle'] = $this->input->post('metaTitle');
		$dataToSend['metaDescription'] = $this->input->post('metaDescription');
		$dataToSend['createdDate'] = Date('Y-m-d');
		$this->Brand_model->addBrand($dataToSend);
		redirect(base_url() . 'Brand');
	}
}
?>