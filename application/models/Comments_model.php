<?php
class Comments_model extends CI_Model {


	public function  __construct()
	{
		$this->load->database('pdo');
	}
public function getComments($params = array()){

		$this->db->select('*');
		$this->db->from('posts');
		if(array_key_exists("id",$params)){
			$this->db->where('id',$params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('id', 'desc');
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}

			if(array_key_exists("returnType", $params) && $params['returnType'] =='count'){
				$result = $this->db->count_all_results();


			}else{

				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array():FALSE;
			}

		}
		return $result;
}
}
