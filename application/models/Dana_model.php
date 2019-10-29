<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dana_model extends CI_Model
{
    public function getAllDana()
    {
        return $this->db->get('dana')->result_array();
    }

    public function getDanaById($id)
    {
        return $this->db->get_where('dana', ['id' => $id])->row_array();
    }

    public function editDataDana()
    {
        $data = [
            "nama_donatur" => $this->input->post('nama_donatur', true),
            "perusahaan" => $this->input->post('perusahaan', true),
            "alamat" => $this->input->post('alamat', true),
            "dana" => $this->input->post('dana', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dana', $data);
    }

    public function deleteDataDanaById($id)
    {
        $this->db->delete('dana', ['id' => $id]);
    }
}
