<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi_model extends CI_Model
{

    public function getData($table)
    {
        return $this->db->get($table)->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
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

    public function input_data($menu_id, $nama, $jk, $semester, $angkatan, $programstudi, $kontribusi)
    {
        $query = "INSERT INTO beastudi (nama_mh,jk,semester,angkatan,programstudi,kontribusi,pic_id) VALUES ('$nama','$jk','$semester','$angkatan','$programstudi','$kontribusi','$menu_id')";
        $this->db->query($query);
    }



    public function editDataBeastudi()
    {
        $data = [
            "nama_mh" => $this->input->post('nama_mh', true),
            "jk" => $this->input->post('jk', true),
            "semester" => $this->input->post('semester', true),
            "angkatan" => $this->input->post('angkatan', true),
            "programstudi" => $this->input->post('programstudi', true),
            "kontribusi" => $this->input->post('kontribusi', true),
            "menu_id" => $this->input->post('menu_id', true)
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

    public function editdata($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
