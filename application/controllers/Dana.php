<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dana_model');
        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dana Beasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dana'] = $this->Dana_model->getAllDana();

        $this->form_validation->set_rules('nama_donatur', 'Nama', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('dana', 'Dana');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dana/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_donatur' => $this->input->post('nama_donatur'),
                'perusahaan' => $this->input->post('perusahaan'),
                'alamat' => $this->input->post('alamat'),
                'dana' => $this->input->post('dana')
            ];
            $this->db->insert('dana', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Donatur baru ditambahkan!</div>');
            //$this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('dana');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Dana';
        $data['dana'] = $this->Dana_model->getDanaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dana/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Dana';
        $data['dana'] = $this->Dana_model->getDanaById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_donatur', 'Nama', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('dana', 'Dana');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dana/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Dana_model->editDataDana($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dana Berhasil di Edit!</div>');
            redirect('dana');
        }
    }

    public function delete($id)
    {
        $this->Dana_model->deleteDataDanaById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Dana di hapus!</div>');
        redirect('dana');
    }
}
