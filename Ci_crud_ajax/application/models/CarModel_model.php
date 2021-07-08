<?php
class CarModel_model extends CI_Model
{
    public function create($formArray)
    {
        $this->db->insert('car_models', $formArray);
        return $id = $this->db->insert_id();
    }

    public function All()
    {
        return $this->db->get('car_models')->result_array();
    }
    public function getRow($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('car_models')->row_array();
    }
    public function update($id, $formArray)
    {
        $this->db->where('id', $id);
        $this->db->update('car_models', $formArray);
        return $id;
    }
}