<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

	public function all()
	{
		$result = $this->db->get('config');
		return $result;
	}

	public function find($id)
	{
		$row = $this->db->where('id',$id)->limit(1)->get('config');
		return $row;
	}


	public function update($id, $data)
	{
		try{
			$this->db->where('id',$id)->limit(1)->update('config', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

}