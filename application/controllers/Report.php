<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Pic_model');
        $this->load->model('Beastudi_model', 'pic');
        $this->load->helper('url');

        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['semester'] = $this->pic->getData('semester');
        $data['beastudi'] = $this->pic->getBeastudi();
        $data['pic'] = $this->db->get('pic')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_pdf()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->library('pdfgenerator');
        $data['report'] = $this->Report_model->getAllReport()->result();
        //menampilkan data dalam bentuk pdf yang akan dicetak
        $html = $this->load->view('cetak_pdf', $data, true);
        $this->pdfgenerator->generate($html);
    }

    // function pdf()
    // {
    //     $this->load->library('cfpdf');
    //     $pdf = new FPDF('L', 'mm', 'A4');
    //     $pdf->output();
    // }
}
