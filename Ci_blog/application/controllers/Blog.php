<?php 
class Blog extends CI_Controller{
    public function add(){
        $this->load->view('admin/blog/add');
    }
}