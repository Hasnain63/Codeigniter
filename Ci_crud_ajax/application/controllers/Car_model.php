<?php
class Car_model extends CI_Controller
{
    public function index()
    {

        $this->load->model('CarModel_model');
        $rows = $this->CarModel_model->All();
        $data['rows'] = $rows;
        $this->load->view('car_model/list', $data);
    }
    public function showCreateForm()
    {
        $html = $this->load->view('car_model/create', '', true);
        $response['html'] = $html;
        echo json_encode($response);
    }
    public function save_model()
    {
        $this->load->model('CarModel_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['color'] = $this->input->post('color');
            $formArray['transmition'] = $this->input->post('transmition');
            $formArray['price'] = $this->input->post('price');
            $formArray['created_at'] = Date('Y;m;d:H:i:s');
            $id =   $this->CarModel_model->create($formArray);
            $row =  $this->CarModel_model->getRow($id);
            $data['row'] = $row;
            $rowhtml =  $this->load->view('car_model/car_row', $data, true);
            $response['row'] = $rowhtml;
            $response['status'] = 1;
            $response['msg'] = "<div class=\"alert alert-success\">Record has been added successfully.</div>";
            // $response['msg'] = "Record has been added successfully.";
        } else {
            $response['status'] = 0;
            $response['name'] = strip_tags(form_error('name'));
            $response['color'] = strip_tags(form_error('color'));
            $response['price'] = strip_tags(form_error('price'));
        }
        echo json_encode($response);
    }


    // ********this method return edit form like create form*******

    public function getCar_model($id)
    {
        $this->load->model('CarModel_model');
        $row =  $this->CarModel_model->getRow($id);
        $data['row'] = $row;
        $html = $this->load->view('car_model/edit',  $data, true);
        $response['html'] = $html;
        echo json_encode($response);
    }
    public function updateModel()
    {
        $this->load->model('CarModel_model');
        $id = $this->input->post('id');
        $row =  $this->CarModel_model->getRow($id);
        // if (empty($row)) {
        //     $response['msg'] = "Record Not Found!";
        //     $response['status'] = 100;
        //     json_encode($response);
        //     exit;
        // }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $formArray = array();

            $formArray['name'] = $this->input->post('name');
            $formArray['color'] = $this->input->post('color');
            $formArray['transmition'] = $this->input->post('transmition');
            $formArray['price'] = $this->input->post('price');
            $formArray['updated_at'] = Date('Y;m;d:H:i:s');
            $id = $this->CarModel_model->update($id, $formArray);
            $row =  $this->CarModel_model->getRow($id);
            $data['row'] = $row;
            $rowhtml =  $this->load->view('car_model/car_row', $data, true);
            $response['row'] = $rowhtml;
            $response['status'] = 1;
            $response['msg'] = "<div class=\"alert alert-success\">Record has been updated successfully.</div>";
            // $response['msg'] = "Record has been added successfully.";
        } else {
            $response['status'] = 0;
            $response['name'] = strip_tags(form_error('name'));
            $response['color'] = strip_tags(form_error('color'));
            $response['price'] = strip_tags(form_error('price'));
        }
        echo json_encode($response);
    }
}