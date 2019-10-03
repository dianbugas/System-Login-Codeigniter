<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi_model extends CI_Model
{
    public function getAllBeastudi()
    {
        return $this->db->get('beastudi')->result_array();
    }
}
