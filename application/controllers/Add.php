<?php
defined('BASEPATH') OR exit('no durect script access allowed');

class Add extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('add_model'); // загрузка модели

	}

	public 	function validation()
	{
		$this->load->library('form_validation');
		$this->config->set_item('language', 'rus');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('text', 'комментарии', 'required');
        $this->form_validation->set_rules('text', 'комментарии', 'max_length[1000]');
		$this->form_validation->set_rules('fio', 'ФИО/НИК', 'max_length[70]');
		if($this->form_validation->run())
		{
			$array = array(
				'success' => '<div class="alert alert-success">комментарий добавлен</div>'
			);

			$this->create();
		}
		else
		{
			$array = array(
				'error'   => true,
				'email_error' => form_error('email'),
				'text_error' => form_error('text'),
				'fio_error' => form_error('fio')
			);
		}

		echo json_encode($array);
	}

public function create(){
		$this->add_model->createData();
		//redirect('comments');
}
}
