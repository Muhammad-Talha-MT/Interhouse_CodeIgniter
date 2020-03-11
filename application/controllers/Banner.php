<?php
class Banner extends CI_Controller
{

	public function index()
	{
		$this->load->model('Banner_model');
		$data['banners'] = $this->Banner_model->getBanners();
		$this->load->view('Admin/banners.php', $data);
	}
	public function Add()
	{
		$this->load->view('Admin/addBanner.php');
	}
	public function goToEditbanner($id)
	{
		$this->load->model('Banner_model');
		$data['Banner'] = $this->Banner_model->getBannerById($id);
		$this->load->view('Admin/editBanner.php', $data);
	}
	function editBanner($id)
	{
		$this->load->model('Banner_model');
		$dataToSend['name'] = $this->input->post('bannerName');
		$dataToSend['title'] = $this->input->post('bannerTitle');
		$dataToSend['image'] = $this->uploadImage();
		$this->Banner_model->update($id, $dataToSend);
		redirect(base_url() . 'Banner');
	}
	function deletebanner($id)
	{
		$this->load->model('Banner_model');
		$this->Banner_model->delete($id);
		redirect(base_url() . 'Banner');
	}
	public function newBanner()
	{
		$this->load->model('Banner_model');
		$dataToSend['name'] = $this->input->post('bannerName');
		$dataToSend['title'] = $this->input->post('bannerTitle');
		$dataToSend['image'] = $this->uploadImage();
		print_r($dataToSend);
		die();
		$this->Banner_model->addBanner($dataToSend);
		redirect(base_url() . 'Banner');
	}
	public function uploadImage()
	{
		$imagestamp = time();
		$name = $this->input->post('bannerName');;
		$config['upload_path'] = './upload/banners';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size'] = '100000000';
		$config['file_name'] = $name . $imagestamp;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}
}
