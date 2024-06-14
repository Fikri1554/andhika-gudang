<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index() {
        $data = array(); // Inisialisasi $data sebagai array kosong
        // Jika form login disubmit
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() === TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->user_model->check_login($username, $password);

                if ($user) {
                    $this->session->set_userdata('user_logged', $user);

                    redirect('menu'); 
                } else {
                    $data['error'] = 'Username atau password salah';
                }
            }
        }

        
        $this->load->view('login', $data); 
    }

    public function logout() {
        // Hapus semua data session
        $this->session->sess_destroy();

        // Redirect ke halaman login setelah logout
        redirect('login');
    }

}
?>
