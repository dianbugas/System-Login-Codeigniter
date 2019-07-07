<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array(); //RESULT ARRAY untuk menampilkan semua data
    }

    public function hapusDataMenuById($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }

    public function hapusDataSubMenu($id)
    {
        $this->db->delete('menu/submenu', ['id' => $id]);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }
}
