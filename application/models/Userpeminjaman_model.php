<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userpeminjaman_model extends CI_Model
{
	
    public function getAll()
    {
        return $this->db->get('userpeminjaman')->result_array();
    }

    public function getById($id_up)
    {
        return $this->db->get_where('userpeminjaman', ['id_up' => $id_up])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_up    		= uniqid();
        $this->id_user          = $post['id_user'];
		$this->nama				= $post['nama'];
		$this->approvedate		= $post['approvedate'];
		$this->$id_peminjaman	= $post['id_peminjaman'];


        return $this->db->insert('userpeminjaman', $this);
    }

    public function delete($id_up)
    {
        return $this->db->delete('userpeminjaman', ['id_up' => $id_up]);
    }

}
