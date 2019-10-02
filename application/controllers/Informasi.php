<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Informasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('informasi/index', $data);
        $this->load->view('templates/footer');
    }
}
