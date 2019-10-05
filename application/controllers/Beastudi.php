<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beastudi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['beastudi'] = $this->db->get('beastudi')->result_array();
        $this->form_validation->set_rules('beastudi', 'Beastudi', 'required'); //name nya menu di index
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('beastudi/index', $data);
            $this->load->view('templates/footer');
        } else {
            //insert ke tabel menu(tambah) dan di ambil dari inputan
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'semester' => $this->input->post('semester'),
                'angkatan' => $this->input->post('angkatan'),
                'programstudi' => $this->input->post('programstudi'),
                'kontribusi' => $this->input->post('kontribusi')
            ];
            $this->db->insert('beastudi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan!</div>');
            //$this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('beastudi');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Beastudi';
        $data['beastudi'] = $this->Beastudi_model->getBeastudiById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beastudi/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Menu Management';
        $data['beastudi'] = $this->Beastudi_model->getBeastudiById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('beastudi', 'beastudi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('beastudi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editDataBeastudi($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil di Edit!</div>');
            redirect('beastudi');
        }
    }

    public function delete($id)
    {
        $this->Beastudi_model->deleteDataBeastudiById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Beastudi di hapus!</div>');
        redirect('beastudi');
    }
}
