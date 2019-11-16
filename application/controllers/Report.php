<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['report'] = $this->Report_model->getBeastudi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function export_pdf()
    {
        // $data['title'] = 'Pdf';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $pdf = new FPDF('l', 'mm', 'A5');
        // // membuat halaman baru
        // $pdf->AddPage();
        // // setting jenis font yang akan digunakan
        // $pdf->SetFont('Arial', 'B', 16);
        // // mencetak string 
        // $pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA', 0, 1, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->Cell(10, 7, '', 0, 1);
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(20, 6, 'NIM', 1, 0);
        // $pdf->Cell(85, 6, 'NAMA MAHASISWA', 1, 0);
        // $pdf->Cell(27, 6, 'NO HP', 1, 0);
        // $pdf->Cell(25, 6, 'TANGGAL LHR', 1, 1);
        // $pdf->SetFont('Arial', '', 10);
        // $mahasiswa = $this->db->get('mahasiswa')->result();
        // foreach ($mahasiswa as $row) {
        //     $pdf->Cell(20, 6, $row->nim, 1, 0);
        //     $pdf->Cell(85, 6, $row->nama_lengkap, 1, 0);
        //     $pdf->Cell(27, 6, $row->no_hp, 1, 0);
        //     $pdf->Cell(25, 6, $row->tanggal_lahir, 1, 1);
        // }
        // $this->load->view('report/cetak_pdf', $data);
        // $pdf->Output();
    }
}
