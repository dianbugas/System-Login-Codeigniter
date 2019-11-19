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

        $menu_id = $this->input->post('menu_id');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $programstudi = $this->input->post('programstudi');
        $kontribusi = $this->input->post('kontribusi');

        $this->Beastudi_model->input_data($menu_id, $nama, $jk, $semester, $angkatan, $programstudi, $kontribusi);
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

    // public function edit($id)
    // {
    //     $data['title'] = 'Edit Data Beastudi';
    //     $data['beastudi'] = $this->Beastudi_model->getBeastudiById($id);
    //     $data['picc'] = $this->Pic_model->getAllPic();
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['jurusan'] = ['Teknik Informatika', 'Sistem Informasi'];
    //     $data['kontribusi'] = ['Content', 'Upload Content', 'Website Developer', 'Design Graphic', 'Video Content', 'LPPM', 'Inkubator', 'LPMI'];
    //     $data['semester'] = ['Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan'];
    //     // $this->load->model('Beastudi_model', 'pic');
    //     // //query submenu
    //     // //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
    //     // $data['bbeastudi'] = $this->pic->getBeastudi();
    //     // $data['pic'] = $this->db->get('pic')->result_array();

    //     $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
    //     $this->form_validation->set_rules('nama_mh', 'nama_mh', 'required');
    //     $this->form_validation->set_rules('jk', 'jk', 'required');
    //     $this->form_validation->set_rules('semester', 'semester', 'required');
    //     $this->form_validation->set_rules('angkatan', 'angkatan', 'required|numeric');
    //     $this->form_validation->set_rules('programstudi', 'programstudi', 'required');
    //     $this->form_validation->set_rules('kontribusi', 'kontribusi', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('beastudi/edit', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Beastudi_model->editDataBeastudi();
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa Beastudi Berhasil di Edit!</div>');
    //         redirect('beastudi');
    //     }
    // }

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
        $data['semester'] = ['Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan'];
        // $this->load->model('Beastudi_model', 'pic');
        // //query submenu
        // //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
        // $data['bbeastudi'] = $this->pic->getBeastudi();
        // $data['pic'] = $this->db->get('pic')->result_array();

        // $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
        // $this->form_validation->set_rules('nama_mh', 'nama_mh', 'required');
        // $this->form_validation->set_rules('jk', 'jk', 'required');
        // $this->form_validation->set_rules('semester', 'semester', 'required');
        // $this->form_validation->set_rules('angkatan', 'angkatan', 'required|numeric');
        // $this->form_validation->set_rules('programstudi', 'programstudi', 'required');
        // $this->form_validation->set_rules('kontribusi', 'kontribusi', 'required');

        // if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beastudi/edit', $data);
        $this->load->view('templates/footer');
        // } else {
        // $this->Beastudi_model->editDataBeastudi();
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa Beastudi Berhasil di Edit!</div>');
        // redirect('beastudi');
        //}
    }

    public function update()
    {
        $id = $this->input->post('id');
        $pic_id = $this->input->post('pic_id');
        $nama_mh = $this->input->post('nama_mh');
        $jk = $this->input->post('jk');
        $semester = $this->input->post('semester');
        $angkatan = $this->input->post('angkatan');
        $programstudi = $this->input->post('programstudi');
        $kontribusi = $this->input->post('kontribusi');

        $data = array(
            'pic_id' => $pic_id,
            'nama_mh' => $nama_mh,
            'jk' => $jk,
            'semester' => $semester,
            'angkatan' => $angkatan,
            'programstudi' => $programstudi,
            'kontribusi' => $kontribusi
        );

        $where = array(
            'id' => $id
        );
        $this->Beastudi_model->update_data($where, $data, 'beastudi');
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
