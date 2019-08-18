<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        // di tendang supaya user sembarangan tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
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

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah diperbarui!</div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            //ambil data inputan password lama
            $current_password = $this->input->post('current_password');
            //ambil data yg di baru di input
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                //cek password apakah sama yg dinput dgn data di dlam data base.  klu tdk tampilkan berikut
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah saat ini!</div>');
                redirect('user/changepassword');
            } else {
                //cek apakah password lama sama dgn inputan password baru
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi saat ini!</div>');
                    redirect('user/changepassword');
                } else {
                    //jika beda maka bener /sudah oke
                    // password sudah ok dan dan lebih dari 3 digit
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
