<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll()
	{
		$this->db->select("peminjaman.*, user.name, cabang.nama_cabang");
		$this->db->from('peminjaman');
		$this->db->join("user", 'user.id = peminjaman.id_user', 'inner');
		$this->db->join("cabang", "cabang.id_cabang = peminjaman.id_cabang", "inner");
		$query = $this->db->get();
		return $query->result_array();
	}

	function getDetail($id_peminjaman)
	{
		$this->db->select("*");
		$this->db->from('peminjaman');
		$this->db->join("cabang", "cabang.id_cabang = peminjaman.id_cabang", "inner");
		// $this->db->join('barangpeminjaman', 'barangpeminjaman.id_peminjaman = peminjaman.id_peminjaman', 'inner');
		$this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
		$query = $this->db->get()->row_array();

		// relation one to many
		$barangpeminjaman = $this->db->from('barangpeminjaman')->where('id_peminjaman', $id_peminjaman)->get()->result_array();

		$query['barangpeminjaman'] = $barangpeminjaman;
		return $query;
	}

	public function getById($id_peminjaman)
	{
		return $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();
	}


	public function save($data)
	{
		$this->db->insert('peminjaman', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function update($data, $id)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->update('peminjaman', $data);
	}

	public function delete($id_peminjaman)
	{
		$this->db->delete('userapproval', ['id_peminjaman' => $id_peminjaman]);
		$this->db->delete('barangpeminjaman', ['id_peminjaman' => $id_peminjaman]);
		$this->db->delete('peminjaman', ['id_peminjaman' => $id_peminjaman]);
	}
}
