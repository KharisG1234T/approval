<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll($status)
	{
		$this->db->select("peminjaman.*, user.name, cabang.nama_cabang");
		$this->db->from('peminjaman');
		$this->db->join("user", 'user.id = peminjaman.id_user', 'inner');
		$this->db->join("cabang", "cabang.id_cabang = peminjaman.id_cabang", "inner");
		if ($this->session->userdata('role_id') == 2) {
			$this->db->where('user.id', $this->session->userdata('id'));
		}
		if ($status !== 'ALL') {
			$this->db->where('peminjaman.status', $status);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function getDetail($id_peminjaman)
	{
		$this->db->select("*");
		$this->db->from('peminjaman');
		$this->db->join("cabang", "cabang.id_cabang = peminjaman.id_cabang", "inner");
		$this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
		$query = $this->db->get()->row_array();

		// relation one to many
		$barangpeminjaman = $this->db->from('barangpeminjaman')->where('id_peminjaman', $id_peminjaman)->get()->result_array();
		$userapproval = $this->db->select('createdat, id_user, status')->from('userapproval')->where('id_peminjaman', $id_peminjaman)->get()->result_array();
		$users = [];

		foreach ($userapproval as $key => $user) {
			$data = $this->db->select('ttd, role_id')->from('user')->where('id', $user['id_user'])->get()->row_array();
			if ($user['status'] == "REJECT") {
				$data['ttd'] = 'rejected.png';
			} else if ($data['ttd'] == null) {
				$data['ttd'] = '';
			}
			$data['createdat'] = $user['createdat'];
			array_push($users, $data);
			unset($userapproval[$key]);
		}

		$userapproval['users'] = $users;
		$query['barangpeminjaman'] = $barangpeminjaman;
		$query['userapproval'] = $userapproval;
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
