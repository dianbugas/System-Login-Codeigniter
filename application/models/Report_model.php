<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function getBeastudi()
    {
        $query = "SELECT `beastudi`.*, `pic`.`nama`
                  FROM `beastudi` JOIN `pic`
                  ON `beastudi`.`pic_id` = `pic`.`id`
                ";
        return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
    }

    public function getAllReport()
    {
        return $this->db->get('beastudi');
    }

    function tampil_data()
    {
        return $this->db->get('Mahasiswa');
    }
}
