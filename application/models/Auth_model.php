<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function retrieve($id = "", $email = "")
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        if (!empty($email)) {
            $this->db->where('email', $email);
        }

        $result = $this->db->get('user');
        return $result->row_array();
    }

    public function create(
        $name = "",
        $email = "",
        $image = "",
        $password = "",
        $role_id = "",
        $is_active = "",
        $date_created = ""
    ) {
        $this->db->insert('user', array(
            'name' => $name,
            'email' => $email,
            'image' => $image,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'date_created' => $date_created
        ));

        return $this->db->insert_id();
    }
}