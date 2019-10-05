<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic_model extends CI_Model
{
    public function getAllPic()
    {
        return $this->db->get('pic')->result_array();
    }

    //menu
    public function getPicById($id)
    {
        return $this->db->get_where('pic', ['id' => $id])->row_array();
    }

    public function deleteDataPicById($id)
    {
        $this->db->delete('pic', ['id' => $id]);
    }
}
