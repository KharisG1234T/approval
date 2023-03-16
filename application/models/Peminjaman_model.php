<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_peminjaman extends CI_Model
{
	var $table = 'peminjaman';
	var $column_search = array('id_cabang', 'id_user', 'from', 'date', 'number', 'closingdate', 'note');
	var $column_order = array('id_cabang', 'id_user', 'from', 'date', 'number', 'closingdate', 'note');
	var $order = array('id_peminjaman' => 'desc');
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{

		$this->db->from('peminjaman');
		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$this->db->select("peminjaman.from, peminjaman.date, peminjaman.closingdate, peminjaman.note, tbl_user.full_name, cabang.nama_cabang");
		// $this->db->select("peminjaman.from, peminjaman.date, peminjaman.number")->from('peminjaman','tbl_user')->join('tbl_user', 'tbl_user.id_user = peminjaman.id_user');
		$this->db->join("tbl_user",'tbl_user.id_user = peminjaman.id_user', 'inner');
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

	function insert_peminjaman($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update_peminjaman($id_peminjaman, $data)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('peminjaman', $data);
	}

	function get_peminjaman($id_peminjaman)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		return $this->db->get('peminjaman')->row();
	}

	function delete_peminjaman($id_peminjaman, $table)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->delete($table);
	}
}
