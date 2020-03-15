<?php
class service extends CI_Controller
{

	public function index()
	{
		$this->load->library('cart');
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
		$dataToSend['image'] = $this->uploadImage();
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
		$dataToSend['id'] = time();
		$dataToSend['name'] = $this->input->post('serviceName');
		$dataToSend['description'] = $this->input->post('servicedescription');
		$dataToSend['maxprice'] = $this->input->post('maxprice');
		$dataToSend['minprice'] = $this->input->post('minprice');
		$dataToSend['image'] = $this->uploadImage();
		$this->service_model->addservice($dataToSend);
		redirect(base_url() . 'service');
	}
	public function uploadImage()
	{
		$imagestamp = time();
		$name = $this->input->post('serviceName');;
		$config['upload_path'] = './upload/services';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size'] = '10000';
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

	function allservices()
	{
		$this->load->model('Service_model');
		$data['services'] = $this->Service_model->getServices();
		$this->load->library('cart');
		$this->load->view('User/allservices', $data);
	}

	function serviceRequest($id)
	{
		$this->load->model('Service_model');
		$this->load->library('cart');
		$data['service'] = $this->Service_model->getserviceById($id);
		$this->load->view('User/applyservice', $data);
	}

	function applyService($id)
	{
		$data['requestid'] = time();
		$data['userId'] = 1;
		$data['serviceid'] = $id;
		$data['address'] = $this->input->post('address');
		$data['contact'] = $this->input->post('phoneNo');
		$data['email'] = $this->input->post('email');
		$data['orderDate'] = date('Y-m-d');
		$data['status'] = "Pending";
		$this->emailSend($data['email'], $data['status'], $data['requestid']);
		$this->session->set_flashdata('order', 'You request id is placed successfully make sure you recived email. And your service request Id is ' . $id);
		$this->load->view("User/successOrder");
	}

	public function emailSend($to_email, $status, $requestid)
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


		$emailContent .= "<h3>You have palced your request with request id: " . $requestid . '</h3>';

		$emailContent .= '<tr><td style="height:20px"></td></tr>';
		$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
		//Load email library
		$this->load->library('email');
		$this->email->from($from_email, 'Interhouse');
		$this->email->to($to_email);
		$this->email->subject('Request Placement');
		$this->email->message($emailContent);
		//Send mail
		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "You have encountered an error");
		}
	}
}
