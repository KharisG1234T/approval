<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userapproval_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('userapproval')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('userapproval', ['id' => $id])->row_array();
    }

    public function save($data)
    {
        return $this->db->insert('userapproval', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('userapproval', ['id' => $id]);
    }
}
