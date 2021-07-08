<?php

class signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('RegisterModel');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'username', 'required|min_length[3]');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('phone', 'Mobile#', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['Password'] = $this->input->post('pass');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['city'] = $this->input->post('city');

            $this->RegisterModel->add_user($formArray);
            $this->session->set_flashdata('message', 'you are signup successfully now you can login.');
            redirect(base_url() . 'index.php/login/index');
        } else {
            // $this->session->set_flashdata('message', 'some error occer please try again.');
            $this->load->view('admin/signup');
        }
    }
}