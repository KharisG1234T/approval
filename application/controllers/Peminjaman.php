<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // load model
    $this->load->model(array('Barangpeminjaman_model', 'Userpeminjaman_model', 'Peminjaman_model', 'Cabang_model'));
  }

  public function index()
  {
    $data['title'] = 'List Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['peminjaman'] = $this->Peminjaman_model->getAll();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar');
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('peminjaman/sales/index', $data);
    $this->load->view('templates/admin_footer');
  }

  public function index2()
  {
    $data['title'] = 'List Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['peminjaman'] = $this->Peminjaman_model->getAll();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar');
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('peminjaman/index2', $data);
    $this->load->view('templates/admin_footer');
  }

  // page tambah peminjaman
  public function add()
  {
    if (!in_array($this->session->userdata('role_id'), [1, 2])) {
      redirect($_SERVER['HTTP_REFERER'] . '/peminjaman');
    }
    $data['title'] = 'Tambah Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['cabangs'] = $this->Cabang_model->getAll();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar');
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('peminjaman/sales/tambah_peminjaman', $data);
    $this->load->view('templates/admin_footer');
  }

  // insert peminjaman
  public function insert()
  {
    $dataPeminjaman = array(
      'id_cabang' => $this->input->post('direction'),
      'id_user' => $this->input->post('userId'),
      'from' => $this->input->post('from'),
      'date' => $this->input->post('date'),
      'number' => $this->input->post('number'),
      'closingdate' => $this->input->post('closingDate'),
      'note' => $this->input->post('note'),
    );

    $peminjamanId = $this->Peminjaman_model->save($dataPeminjaman);

    $barang = $this->input->post('barang');
    foreach ($barang as $item) {
      $data = array(
        'id_peminjaman' => $peminjamanId,
        'sku' => '',
        'nama' => $item['name'],
        'harga' => $item["price"],
        'qty' => $item["qty"],
        'jumlah' => $item["total"],
        'stok_po' => '',
        'maks_delivery' => $item['maks'],
      );
      $this->Barangpeminjaman_model->save($data);
    }
  }

  public function delete($id_peminjaman)
  {
    if (!in_array($this->session->userdata('role_id'), [1, 2])) {
      redirect($_SERVER['HTTP_REFERER'] . '/peminjaman');
    }
    $this->Peminjaman_model->delete($id_peminjaman);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus!
        </div>');
    redirect(base_url('peminjaman'));
  }

  public function edit($id_peminjaman)
  {
    $data['title'] = 'Edit Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['cabangs'] = $this->Cabang_model->getAll();
    $data['peminjaman'] = $this->Peminjaman_model->getDetail($id_peminjaman);

    // edit sku & po by PM
    if (in_array($this->session->userdata('role_id'), [3, 8])) {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/admin_sidebar');
      $this->load->view('templates/admin_topbar', $data);
      $this->load->view('peminjaman/pm/edit_peminjaman', $data);
      $this->load->view('templates/admin_footer');
    } else {
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/admin_sidebar');
      $this->load->view('templates/admin_topbar', $data);
      $this->load->view('peminjaman/sales/edit_peminjaman', $data);
      $this->load->view('templates/admin_footer');
    }
  }

  public function detail($id_peminjaman)
  {
    $data['title'] = 'Detail Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['peminjaman'] = $this->Peminjaman_model->getDetail($id_peminjaman);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar');
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('peminjaman/detail_peminjaman', $data);
    $this->load->view('templates/admin_footer');
  }

  // insert peminjaman
  public function update()
  {
    $idPeminjaman = $this->input->post('id');
    $dataPeminjaman = array(
      'id_cabang' => $this->input->post('direction'),
      'from' => $this->input->post('from'),
      'date' => $this->input->post('date'),
      'number' => $this->input->post('number'),
      'closingdate' => $this->input->post('closingDate'),
      'note' => $this->input->post('note'),
    );

    $this->Peminjaman_model->update($dataPeminjaman, $idPeminjaman);

    // hapus barang lama
    $barangLama = $this->Barangpeminjaman_model->getAllBy($idPeminjaman);
    foreach ($barangLama as $barang) {
      $this->Barangpeminjaman_model->delete($barang['id']);
    }

    // update / tambah barang baru
    $barang = $this->input->post('barang');
    foreach ($barang as $item) {
      $data = array(
        'id_peminjaman' => $idPeminjaman,
        'sku' => '',
        'nama' => $item['name'],
        'harga' => $item["price"],
        'qty' => $item["qty"],
        'jumlah' => $item["total"],
        'stok_po' => '',
        'maks_delivery' => $item['maks'],
      );
      $this->Barangpeminjaman_model->save($data);
    }
  }

  // set sku, stok/po, status="process"
  public function setstatus()
  {
    $idPeminjaman = $this->input->post('id');
    $barang = $this->input->post('barang');
    foreach ($barang as $item) {
      $id = $item['id'];
      $data = array(
        'id_peminjaman' => $idPeminjaman,
        'sku' => $item['sku'],
        'nama' => $item['name'],
        'harga' => $item["price"],
        'qty' => $item["qty"],
        'jumlah' => $item["total"],
        'stok_po' => $item['stokpo'],
        'maks_delivery' => $item['maks'],
      );
      $this->Barangpeminjaman_model->update($id, $data);
    }
    // update status
    $this->db->where('id_peminjaman', $idPeminjaman)->update('peminjaman', ['status' => 'PROCESS']);
  }

  // 
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
