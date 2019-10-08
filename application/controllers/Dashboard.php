<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Pic_model');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Informasi';
        $data['beastudi'] = $this->Beastudi_model->getAllBeastudi();
        $data['pic'] = $this->Pic_model->getAllPic();
        $data['total_pic'] = $this->Pic_model->hitungJumlahPic();
        $data['total_beastudi'] = $this->Beastudi_model->hitungJumlahBeastudi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function beastudi()
    { }
}
