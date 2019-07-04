<?php
//HELPER SENDIRI 
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //lihat di dokumentasi ci

            //untuk query 
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id']; //untuk menampilakan id nya saja

            // select * from user_access_menu where role_id = baris 9, menu_id = baris 14 
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
        // cek masing menu id dan role id
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
         //baris nya > 0 lebih besar dari 0 / ada berarti ceklis
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}