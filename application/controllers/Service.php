<?php
class service extends CI_Controller
{

    public function index()
	{
        $this->load->model('service_model');
		$data['services'] = $this->service_model->getservices();
        $this->load->view('Admin/services.php', $data);
    }
    public function Add()
	{
		$this->load->view('Admin/addService.php');
    }
    public function goToEditservice($id)
	{
        $this->load->model('service_model');
        $data['service'] = $this->service_model->getserviceById($id);
		$this->load->view('Admin/editService.php', $data);
    }
    function editservice($id)
	{
        $this->load->model('service_model');
		$dataToSend['name'] = $this->input->post('serviceName');
		$dataToSend['description'] = $this->input->post('servicedescription');
        $dataToSend['image']= $this->uploadImage();
		$this->service_model->update($id, $dataToSend);
		redirect(base_url() . 'service');
	}
    function deleteservice($id)
	{
        $this->load->model('service_model');
		$this->service_model->delete($id);
		redirect(base_url() . 'service');
	}
    public function newservice()
	{
		$this->load->model('service_model');
		$dataToSend['name'] = $this->input->post('serviceName');
		$dataToSend['description'] = $this->input->post('servicedescription');
        $dataToSend['image']= $this->uploadImage();
		$this->service_model->addservice($dataToSend);
		redirect(base_url() . 'service');
    }
    public function uploadImage()
	{
        $imagestamp=time();
        $name=$this->input->post('serviceName');;
		$config['upload_path'] = './upload/services';
		$config['allowed_types'] = 'png';
		$config['max_size'] = '10000';
        $config['file_name']=$name.$imagestamp;
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
?>