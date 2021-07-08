<?php
class User extends CI_Model
{
    public function getRows($data)
    {
        if (!empty($data)) {
            $query = $this->db->get_where('users', $data);
            return  $query->result_array();
        } else {
            $query = $this->db->get('users');
            return $query->result_array();
        }
    }
    public function delete($id)
    {

        $delete = $this->db->delete('users', array('id' => $id));
        return $delete ? TRUE : FALSE;
    }
    public function insert($data = array())
    {
        if (!array_key_exists('created_at', $data)) {
            $data['created_at'] = date("Y-m-d H:i:s");
        }

        // if (!array_key_exists('modified', $data)) {
        //     $data['modified'] = date("Y-m-d H:i:s");
        // }
        $insert = $this->db->insert('users', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            if (!array_key_exists('modified', $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }
            $update = $this->db->update('users', $data, array('id' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }
}