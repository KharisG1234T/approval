<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Cabang_model');
    }

    public function index()
    {
        $data['title'] = 'List Cabang Terdaftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['cabangs'] = $this->Cabang_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('cabang/index', $data);
        $this->load->view('templates/admin_footer');
        
    }

    // add cabang
    public function addcabang()
    {
        $data['title'] = 'Daftar Cabang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_cabang'] = $this->db->get('cabang')->result_array();

        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required', [
            'required' => 'Nama Cabang harus di isi !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('cabang/index', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->db->insert('cabang', ['nama_cabang' => $this->input->post('nama_cabang')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Cabang baru berhasil ditambahkan!</div>');
            redirect('cabang');
        }
    }

    public function editcabang($id_cabang = null)
    {   
        $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required', [
            'required' => 'Nama Cabang tidak boleh kosong !'
        ]);
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Cabang Edit';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['nama_cabang'] = $this->db->get_where('cabang', ['id_cabang' => $id_cabang])->row_array();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('cabang/edit_cabang', $data);
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal merubah cabang!</div>');
        } else {
            $data = [
                'id_cabang' => $this->input->post('id_cabang'),
                'nama_cabang' => $this->input->post('nama_cabang')
            ];

            $this->db->update('cabang', $data, ['id_cabang' => $id_cabang]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Cabang berhasil dirubah !</div>');
            redirect('cabang');
        }
    }

    // delete cabang
    public function deletecabang($id_cabang = null)
    {
        if (!isset($id_cabang)) show_404();

        $cabangs = $this->Cabang_model;
        if ($cabangs->delete($id_cabang)) {
            redirect('cabang');
        }
    }
}