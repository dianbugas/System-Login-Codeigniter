<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    //menu
    public function editDataMenu()
    {
        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function deleteDataMenuById($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }



    //submenu
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function hapusDataSubMenuById($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
