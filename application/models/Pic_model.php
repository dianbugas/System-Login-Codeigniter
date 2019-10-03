<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic_model extends CI_Model
{
    public function getAllPic()
    {
        return $this->db->get('pic')->result_array();
    }
}
