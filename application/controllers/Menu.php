<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
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
                                                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
                                                            redirect('menu');
                                        }
                    }

                    public function submenu()
                    {
                                        $data['title'] = 'Submenu Management';
                                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                                        // load submenu yg di bawah
                                        $this->load->model('Menu_model', 'menu');
                                        //query submenu
                                        //model menunya di aliaskan yg diatas Menjadi Menu_model dan method getSubModel
                                        $data['subMenu'] = $this->menu->getSubMenu;

                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/sidebar', $data);
                                        $this->load->view('templates/topbar', $data);
                                        $this->load->view('menu/submenu', $data);
                                        $this->load->view('templates/footer');
                    }
}