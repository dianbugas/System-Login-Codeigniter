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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pic/index', $data);
        $this->load->view('templates/footer');
    }
}
