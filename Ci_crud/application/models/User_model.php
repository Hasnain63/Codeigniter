<?php
class User_model extends CI_Model
{
    public function create($formArray)
    {
        $this->db->insert('users', $formArray);
    }
    public function list()
    {
        return $this->db->get('users')->result_array();
    }
    public function get_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }
    public function update($id, $formArray)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $formArray);
    }
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}