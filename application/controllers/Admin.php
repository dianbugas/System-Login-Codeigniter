<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
                    public function __construct()
                    {
                                        parent::__construct();
                                        // di tendang supaya user sembarangan tdk masuk sembarangan lewat url
                                        is_logged_in();
                    }

                    public function index()
                    {
                                        $data['title'] = 'Dashboard';
                                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/sidebar', $data);
                                        $this->load->view('templates/topbar', $data);
                                        $this->load->view('admin/index', $data);
                                        $this->load->view('templates/footer');
                    }

                    public function role()
                    {
                                        $data['title'] = 'Role';
                                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                                        $data['role'] = $this->db->get('user_role')->result_array();
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/sidebar', $data);
                                        $this->load->view('templates/topbar', $data);
                                        $this->load->view('admin/role', $data);
                                        $this->load->view('templates/footer');
                    }

                    public function roleAccess($role_id)
                    {
                                        $data['title'] = 'Role Access';
                                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                                        $data['role'] = $this->db->get_where('user_role', ['role_id => $role_id'])->row_array();
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/sidebar', $data);
                                        $this->load->view('templates/topbar', $data);
                                        $this->load->view('admin/role-access', $data);
                                        $this->load->view('templates/footer');
                    }
}