<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // intinya ada 2 hal. 1 role id nya berapa kemudian tampilkan semua menu                            
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        //cek ketika di ceklis maka akan bertamah. ketika di hilangin maka akan terhapus
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        //query berdasarkan data di atas
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Berubah!</div>');
    }

    //tambah users
    public function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // load submenu yg di bawah
        $this->load->model('User_model', 'user');
        //query submenu
        //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
        $data['users'] = $this->user->getAllUser();
        //untuk topbar jika error
        //$data['users'] = $this->db->get('user_menu')->result_array();

        // $this->form_validation->set_rules('title', 'Title', 'required'); //name nya menu di index
        // $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        // $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/users', $data);
            $this->load->view('templates/footer');
        } else {
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'menu_id' => $this->input->post('menu_id'),
            //     'url' => $this->input->post('url'),
            //     'icon' => $this->input->post('icon'),
            //     'is_active' => $this->input->post('is_active')
            // ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru ditambahkan!</div>');
            redirect('user/users');
        }
    }

    // khusus admin
    public function editusers()
    {
        $data['title'] = 'Edit Data Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('role_id', 'Role Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editusers', $data);
            $this->load->view('templates/footer');
        } else {
            $role_id = $this->input->post('role_id');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan  diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4048'; //ukuran gambar

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //cek gambar lama ngambil dari variabel data
                    $old_image = $data['user']['image'];
                    //cek gambar defaul bukan
                    if ($old_image != 'default.jpg') {
                        //ganti gambar baru
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    // berisi nama file baru yg mau di masukan di baris ke 70. klu ada gambarnya maka bertambah
                    $new_image = $this->upload->data('file_name');
                    //klu ga ada gambar maka perintah ini tdk akan di set
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                };
            }

            $this->db->set('role_id', $role_id);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil User telah diperbarui!</div>');
            redirect('admin/users');
        }
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataUserById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub Menu di hapus!</div>');
        redirect('admin/users');
    }
}
