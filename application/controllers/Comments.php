<?php
defined('BASEPATH') OR exit('no durect script access allowed');

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('comments_model'); // загрузка модели
		$this->perPage = 3;
	}

	public function index(){
		//$this->load->view('form_validation');

		$conditions['returnType'] = 'count';
		$totalRec = $this->comments_model->getComments($conditions);

		$config['base_url'] = site_url().'/comments/index/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $totalRec;
		$config['per_page'] = $this->perPage;


		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = "первая";
		$config['last_link'] = "последняя";
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = $this->uri->segment(3);
		$offset = !$page?0:$page;

		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

		$data['links'] = $this->pagination->create_links();
		$data['comments'] = $this->comments_model->getComments($conditions);
		$this->load->view('templates/header',$data);
		$this->load->view('comments/index',$data);
		$this->load->view('templates/footer');
	}


}
