<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {

        $rows =  $this->User_model->list();
        $data['rows'] = $rows;
        $this->load->view('list', $data);
    }
    public function create()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $formArray = array();
            $formArray['name'] = $this->input->post('email');
            $formArray['email'] = $this->input->post('email');
            $formArray['created_at'] = Date('Y;m;d');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('message', 'data submitted sucessfully.');
            redirect(base_url('index.php/User/index'));
        } else {
            $this->load->view('create');
        }
    }
    public function edit($id)
    {
        $rows = $this->User_model->get_user($id);
        $data = array();
        $data['rows'] = $rows;
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $data = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['updated_at'] = Date('Y;m;d');
            $this->User_model->update($id, $formArray);
            $this->session->set_flashdata('message', 'data Updated sucessfully.');
            redirect(base_url('index.php/User/index'));
        } else {
            $this->load->view('edit', $data);
        }
    }
    public function delete($id)
    {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('message', 'data deleted sucessfully.');
        redirect(base_url('index.php/User/index'));
    }
}