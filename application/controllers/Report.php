<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pic_model');
        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pic';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pic'] = $this->Pic_model->getAllPic();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pic/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'divisi' => $this->input->post('divisi')
            ];
            $this->db->insert('pic', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan!</div>');
            //$this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pic');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail PIC';
        $data['pic'] = $this->Menu_model->getPicById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pic/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pic';
        $data['pic'] = $this->Pic_model->getPicById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pic/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pic_model->editDataPic($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil di Edit!</div>');
            redirect('pic');
        }
    }

    public function delete($id)
    {
        $this->Pic_model->deleteDataPicById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pic di hapus!</div>');
        redirect('pic');
    }
}
