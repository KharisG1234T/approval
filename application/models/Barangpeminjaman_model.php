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

    public function save()
    {
        $post = $this->input->post();
        $this->id_bp    		= uniqid();
        $this->sku          	= $post['sku'];
		$this->nama				= $post['nama'];
		$this->qty				= $post['qty'];
		$this->harga			= $post['harga'];
		$this->jumlah			= $post['jumlah'];
		$this->stok_po			= $post['stok_po'];
		$this->maks_delivery	= $post['maks_delivery'];
		$this->id_peminjaman	= $post['id_peminjaman'];


        return $this->db->insert('barangpeminjaman', $this);
    }

    public function delete($id_bp)
    {
        return $this->db->delete('barangpeminjaman', ['id_bp' => $id_bp]);
    }

}
