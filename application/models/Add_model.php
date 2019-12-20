<?php
class Add_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database('pdo');
	}

	public function createData(){
		$data = array (
		'fio' => $this->input->post('fio'),
			'email' => $this->input->post('email'),
			'text' => $this->input->post('text'),
			'begin_date' => time(),
		);

			$this->db->insert('posts', $data);

	}
}
