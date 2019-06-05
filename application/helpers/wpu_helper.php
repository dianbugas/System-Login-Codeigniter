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