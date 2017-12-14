<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Paginas_model extends CI_Model

{

  public function all_noticias()
    {
        $result = $this->db->get('noticias');
        return $result;
    }
	
	  public function all_servicos()
    {
        $result = $this->db->get('servicos');
        return $result;
    }
	
		  public function all_banners()
    {
        $result = $this->db->get('banners');
        return $result;
    }
	
	  public function all_images()
    {
        $result = $this->db->get('images');
        return $result;
    }

    public function find($id)
    {
        $row = $this->db->where('id',$id)->limit(1)->get('noticias');
        return $row;
    }

    public function create($data)
    {
        try{
            $this->db->insert('noticias', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try{
            $this->db->where('id',$id)->limit(1)->update('noticias', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('noticias');
            return true;
        }

            //catch exception
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}