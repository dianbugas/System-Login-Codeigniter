<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //ambil data user dari data base
        $user = $this->db->get_where('user', ['email' => $email])->row_array(); //row_array(untuk mendapatkan 1 baris);
        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data); //disimpan ke dalam ssession data
                    //cek apakah login user atau admin (cek role_id admin atau user)
                    if ($user['role_id'] == 1) { // mengambild ata dari baris 32
                        redirect('admin');
                    } else {
                        redirect('user'); //arahkan ke controller user   
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            //pop untuk pesan user belum register
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registred!'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password_dont_match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            // siapkan token 
            $token = base64_encode(random_bytes(32));
            //mengambil data dari 91        
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! your accunt has been created. Please actived your acoount</div>');
            redirect('auth');
        }
    }
    // fungsi type nya ada dua... apakah untuk aktivasi atau forgot password
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ardiansyahbugas@gmail.com',
            'smtp_pass' => '200616yhosi',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        //$this->load->library('email', $config);
        $this->email->initialize($config);  //tambahkan baris ini

        $this->email->from('ardiansyahbugas@gmail.com', 'Matla');
        $this->email->to($this->input->post('email'));
        // untuk cek apakah $type == 'verify' untuk verifikasi akun
        // untuk cek apakah $type == 'verify' untuk verifikasi akun
        if ($type == 'verify') {
            $this->email->subject('Aktivasi Akun');
            $this->email->message('
            <h1>Selamat anda telah berhasil mendaftar!</h1><br><br>
            <p>Tinggal selangkah lagi akun anda akan aktif.<br>
            Klik link aktivasi ini untuk mengaktifkan akun anda: <strong><a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a></strong>
            <br><br>
            Masa aktif link 1x24, lebih dari itu anda harus mendaftar ulang.</p>
            ');
        }

        // if ($type == 'verify') {
        //     $this->email->subject('Account Verification');
        //     //cara baca nya : base_url(). di gabung ke controller auth and method verify ... setiap = berarti di gabung
        //     $this->email->message('Klik tautan ini untuk memverifikasi akun Anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        // }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        //ambil sebaris saja
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //cek email
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            //cek token
            if ($user_token) {
                //cek batas waktu sampai 24 jam
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    //klu bener. maka di update dgn menggunakan query builder
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    // ketika perintah di atas success maka di hapus tokennya
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been actived! Please login.</div>');
                    redirect('auth');

                } else {
                    //kita hapus dulu data di dalam databse karena habis waktu untuk aktivasi
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been loggod out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}


//coding versi indonesia https://drive.google.com/file/d/1O_DASPd5sz4K0ZUToT20NneCXKexCYeU/view