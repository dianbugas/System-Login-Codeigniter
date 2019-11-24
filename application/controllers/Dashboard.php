<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Pic_model');
        $this->load->model('Beastudi_model', 'pic');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Informasi';
        $data['pic'] = $this->Pic_model->getAllPic();
        $data['total_pic'] = $this->Pic_model->hitungJumlahPic();
        $data['total_beastudi'] = $this->Beastudi_model->hitungJumlahBeastudi();
        $data['semester'] = $this->pic->getData('semester');
        $data['programstudi'] = $this->pic->getData('programstudi');
        $data['kontribusi'] = $this->pic->getData('kontribusi');
        $data['beastudi'] = $this->pic->getBeastudi();
        $data['pic'] = $this->db->get('pic')->result_array();

        // //beastudi
        // $this->load->model('Beastudi_model', 'nama');
        // //query submenu
        // //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
        // $data['subBeastudi'] = $this->nama->getBeastudi();
        // $data['beastudi'] = $this->db->get('beastudi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
