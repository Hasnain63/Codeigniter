<?php
class adminDashboard extends CI_Controller
{
    public function index()
    {
        if (empty($this->session->userdata('user'))) {
            redirect(base_url('index.php/login/index/'));
        } else {
            $this->load->view('admin/dashboard');
        }
    }

    public function singOut()
    {
        $this->session->unset_userdata('user');
        redirect(base_url('index.php/login/index/'));
    }
}