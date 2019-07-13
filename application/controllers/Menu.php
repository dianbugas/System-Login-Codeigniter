<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        // di tendang supaya user tdk masuk sembarangan lewat url
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Query data menu
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // roles untuk menu
        $this->form_validation->set_rules('menu', 'Menu', 'required'); //name nya menu di index
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            //insert ke tabel menu(tambah) dan di ambil dari inputan
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan!</div>');
            //$this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('menu');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getMenuById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editDataMenuById($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah diperbarui!</div>');
            redirect('menu');

        }
    }

    public function delete($id)
    {
        $this->Menu_model->deleteDataMenuById($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu');
    }





    // tambah data submenu
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // load submenu yg di bawah
        $this->load->model('Menu_model', 'menu');
        //query submenu
        //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required'); //name nya menu di index
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function lengkap($id)
    {
        $data['title'] = 'Detail Data Menu';
        $data['menu'] = $this->Menu_model->getSubMenuById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('submenu/lengkap', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id)
    {
        $this->Menu_model->hapusDataSubMenuById($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('submenu');
    }
}
