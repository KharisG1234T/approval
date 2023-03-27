<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangpeminjaman_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('barangpeminjaman')->result_array();
    }

    public function getById($id_bp)
    {
        return $this->db->get_where('barangpeminjaman', ['id_bp' => $id_bp])->row_array();
    }

    public function save($data)
    {
        return $this->db->insert('barangpeminjaman', $data);
    }

    public function delete($id_bp)
    {
        return $this->db->delete('barangpeminjaman', ['id_bp' => $id_bp]);
    }
}
