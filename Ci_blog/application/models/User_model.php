<?php
class User_model extends CI_Model
{
    public function doLogin($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query =  $this->db->get('users');
        return  $query->row_array();
    }
}