<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
                $config['max_size'] = '2048';

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

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');

        }
    }
}