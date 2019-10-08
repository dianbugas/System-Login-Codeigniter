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

    public function editDataBeastudi()
    {
        $data = [
            "nama" => $this->input->post('nama', true)
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
