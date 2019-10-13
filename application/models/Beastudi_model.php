<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi_model extends CI_Model
{
    public function getAllBeastudi()
    {
        return $this->db->get('beastudi')->result_array();
    }

    public function getBeastudiById($id)
    {
        return $this->db->get_where('beastudi', ['id' => $id])->row_array();
    }

    public function getBeastudi()
    {
        $query = "SELECT `beastudi`.*, `pic`.`nama`
                  FROM `beastudi` JOIN `pic`
                  ON `beastudi`.`pic_id` = `pic`.`id`
                ";
        return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
    }

    //error
    public function tambahDataBeastudi()
    {
        $data = [
            "nama_mh" => $this->input->post('nama_mh', true),
            "jk" => $this->input->post('jk', true),
            "semester" => $this->input->post('semester', true),
            "angkatan" => $this->input->post('angkatan', true),
            "programstudi" => $this->input->post('programstudi', true),
            "kontribusi" => $this->input->post('kontribusi', true)
        ];
        $this->db->insert('beastudi ', $data);
    }

    public function editDataBeastudi()
    {
        $data = [
            "pic_id" => $this->input->post('pic_id', true),
            "nama_mh" => $this->input->post('nama_mh', true),
            "jk" => $this->input->post('jk', true),
            "semester" => $this->input->post('semester', true),
            "angkatan" => $this->input->post('angkatan', true),
            "programstudi" => $this->input->post('programstudi', true),
            "kontribusi" => $this->input->post('kontribusi', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('beastudi', $data);
    }

    public function deleteDataBeastudiById($id)
    {
        $this->db->delete('beastudi', ['id' => $id]);
    }

    public function hitungJumlahBeastudi()
    {
        $query = $this->db->get('beastudi'); //beastudi /tabel
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
