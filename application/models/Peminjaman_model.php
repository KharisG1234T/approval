<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
	
    public function getAll()
    {
        return $this->db->get('peminjaman')->result_array();
    }

    public function getById($id_peminjaman)
    {
        return $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();
    }

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$this->db->select("peminjaman.from, peminjaman.date, peminjaman.closingdate, peminjaman.note, user.name, cabang.nama_cabang");
		$this->db->join("user",'user.id = peminjaman.id_user', 'inner');
		$this->db->join("cabang", "cabang.id_cabang = peminjaman.id_cabang", "inner");
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from('peminjaman');
		return $this->db->count_all_results();
	}

    public function save()
    {
        $post = $this->input->post();
        $this->id_peminjaman    = uniqid();
        $this->id_user          = $post['id_user'];
		$this->id_cabang		= $post['id_cabang'];
		$this->from				= $post['from'];
		$this->date				= $post['date'];
		$this->number			= $post['number'];
		$this->closingdate		= $post['closingdate'];
		$this->note				= $post[''];


        return $this->db->insert('peminjaman', $this);
    }

    public function delete($id_peminjaman)
    {
        return $this->db->delete('peminjaman', ['id_peminjaman' => $id_peminjaman]);
    }

}
