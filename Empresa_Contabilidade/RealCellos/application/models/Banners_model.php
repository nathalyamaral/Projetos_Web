<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners_model extends CI_Model {

    public function all()
    {
        $result = $this->db->get('banners');
        return $result;
    }

    public function find($id)
    {
        $row = $this->db->where('id',$id)->limit(1)->get('banners');
        return $row;
    }

    public function create($data)
    {
        try{
            $this->db->insert('banners', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try{
            $this->db->where('id',$id)->limit(1)->update('banners', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('banners');
            return true;
        }

            //catch exception
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}