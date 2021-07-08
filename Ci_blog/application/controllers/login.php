<?php
class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('user'))) {
            redirect(base_url('index.php/adminDashboard/index/'));
        }
    }
    public function index()
    {
        $this->load->model('User_model');
        $this->form_validation->set_rules('email', 'username', 'required|min_length[3]');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $user = $this->User_model->doLogin($email, $password);
            if (!empty($user)) {
                $this->session->set_userdata('user', $user);
                redirect(base_url() . 'index.php/adminDashboard/');
            } else {
                $this->session->set_flashdata('message', 'Email or password is incorrect.');
                $this->load->view('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }
}