<?php
class RegisterModel extends CI_Model
{

    public function add_user($formArray)
    {
        return $this->db->insert('users', $formArray);
    }
}