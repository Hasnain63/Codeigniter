<?php

require APPPATH . '/libraries/REST_Controller.php';
class Example extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }
    public function indec()
    {
        print_r($_POST);
        die;
    }
    public function user_get()
    {
        $data = $_GET;
        $users = $this->User->getRows($data);
        if (!empty($users)) {
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            $this->response(
                [
                    'status' => FALSE,
                    'message' => 'No user were found'
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }
    public function user_delete($id)
    {

        if ($id) {
            $delete = $this->User->delete($id);
            if ($delete) {
                $this->response(
                    [
                        'status' => TRUE,
                        'message' => ' user deleted '
                    ],
                    REST_Controller::HTTP_NOT_FOUND
                );
            } else {
                $this->response(
                    "some problem occored please try again",
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        } else {
            $this->response(
                [
                    'status' => FALSE,
                    'message' => 'No user were found'
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }
    public function user_post()
    {
        $userData = array();
        $userData['first_name'] = $this->post('first_name');
        $userData['last_name'] = $this->post('last_name');
        $userData['email'] = $this->post('email');
        $userData['phone'] = $this->post('phone');
        if (!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone']));
        $insert = $this->User->insert($userData);
        if ($insert) {
            $this->response(
                [
                    'status' => TRUE,
                    'message' => 'user has been addded successfully'
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                "some problem occored please try again",
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }
    public function user_put()
    {
        $userData = array();
        $id = $this->put('id');
        $userData['first_name'] = $this->put('first_name');
        $userData['last_name'] = $this->put('last_name');
        $userData['email'] = $this->put('email');
        $userData['phone'] = $this->put('phone');
        if (!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone']));
        $update = $this->User->update($userData, $id);
        if ($update) {

            $this->response(
                [
                    'status' => TRUE,
                    'message' => 'user has been updated successfully'
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                "some problem occored please try again",
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }
}