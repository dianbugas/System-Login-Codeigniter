<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beastudi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beastudi_model');
        $this->load->model('Pic_model');

        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beastudi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Beastudi_model', 'pic');
        //query submenu 
        //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
        $data['semester'] = $this->pic->getData('semester');
        $data['beastudi'] = $this->pic->getBeastudi();
        $data['pic'] = $this->db->get('pic')->result_array();

        $this->form_validation->set_rules('nama_mh', 'Nama', 'required'); //name nya menu di index
        $this->form_validation->set_rules('jk', 'Jenis Kelamin');
        $this->form_validation->set_rules('semester', 'Semester');
        $this->form_validation->set_rules('angkatan', 'Angkatan');
        $this->form_validation->set_rules('programstudi', 'Program Studi');
        $this->form_validation->set_rules('kontribusi', 'Kontribusi');
        $this->form_validation->set_rules('pic_id', 'PIC');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('beastudi/index', $data);
            $this->load->view('templates/footer');
        } else {
            //insert ke tabel menu(tambah) dan di ambil dari inputan
            $data = [
                'nama_mh' => $this->input->post('nama_mh'),
                'jk' => $this->input->post('jk'),
                'semester' => $this->input->post('semester'),
                'angkatan' => $this->input->post('angkatan'),
                'programstudi' => $this->input->post('programstudi'),
                'kontribusi' => $this->input->post('kontribusi'),
                'pic_id' => $this->input->post('pic_id')
            ];

            $this->db->insert('beastudi ', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Beastudi baru ditambahkan!</div>');
            //$this->session->set_flashdata('flash', 'Ditambahkan');
            // redirect('beastudi');
        }
    }

    public function insert()
    {
        $this->load->model('Beastudi_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'nama_mh' => $this->input->post('nama'),
            'pic_id' => $this->input->post('pic_id'),
            'jk' => $this->input->post('jk'),
            'semester_id' => $this->input->post('semester'),
            'angkatan' => $this->input->post('angkatan'),
            'programstudi' => $this->input->post('programstudi'),
            'kontribusi' => $this->input->post('kontribusi'),
            'programstudi' => $this->input->post('programstudi'),

        ];
        $this->Beastudi_model->insertData('beastudi', $data);
        // $this->Beastudi_model->input_data($nama, $jk, $semester, $angkatan, $programstudi, $kontribusi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Beastudi baru ditambahkan!</div>');
        redirect('beastudi');
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
        $data['title'] = 'Edit Data Beastudi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['beastudi'] = $this->Beastudi_model->editdata($where, 'beastudi')->result();
        //$data['picc'] = $this->Pic_model->getAllPic();

        $data['jk'] = ['Laki-Laki', 'Perempuan'];
        $data['jurusan'] = ['Teknik Informatika', 'Sistem Informasi'];
        $data['kontribusi'] = ['Content', 'Upload Content', 'Website Developer', 'Design Graphic', 'Video Content', 'LPPM', 'Inkubator', 'LPMI'];
        // $data['semester'] = ['Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan'];
        $data['semester'] = $this->Beastudi_model->getData('semester');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beastudi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'nama_mh' => $this->input->post('nama_mh'),
            'pic_id' => $this->input->post('pic_id'),
            'jk' => $this->input->post('jk'),
            'semester_id' => $this->input->post('semester'),
            'angkatan' => $this->input->post('angkatan'),
            'programstudi' => $this->input->post('programstudi'),
            'kontribusi' => $this->input->post('kontribusi'),
            'programstudi' => $this->input->post('programstudi'),

        ];

        $id = ['id' => $this->input->post('id')];
        $this->Beastudi_model->update_data($id, $data, 'beastudi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa Beastudi Berhasil di Edit!</div>');
        redirect('beastudi');
    }

    public function delete($id)
    {
        $this->Beastudi_model->deleteDataBeastudiById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Beastudi di hapus!</div>');
        redirect('beastudi');
    }
}
