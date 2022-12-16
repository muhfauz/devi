<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') <> 'login') {
      redirect(base_url('login'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['x1'] = 'Data Mobil';
    $data['x2'] = 'Master';
    $data['x3'] = 'Mobil';
    $data['x4'] = 'Data Mobil ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['mobil'] = $this->db->query("select * from tbl_mobil M, tbl_jenismobil J where M.kd_jenismobil=J.kd_jenismobil")->result();
    $data['jenismobil'] = $this->Mglobal->tampilkandata('tbl_jenismobil');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_mobil');
    $this->load->view('admin/temp/v_footer');
  }

  function aksitambahmobil()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_mobil', 'Nama mobil', 'required');
    //  $this->form_validation->set_rules('username_mobil', 'Username mobil', 'required');
    // $this->form_validation->set_rules('password_mobil', 'Password mobil', 'required');
    // if($this->form_validation->run()!=false)
    // {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar_mobil_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_mobil')) {
      $image = $this->upload->data();
      $data = array(
        'nama_mobil' => $this->input->post('nama_mobil'),
        'kd_mobil' => $this->input->post('kd_mobil'),
        'kd_jenismobil' => $this->input->post('kd_jenismobil'),
        'ket_mobil' => $this->input->post('ket_mobil'),
        'harga_mobil' => $this->input->post('harga_mobil'),
        'gambar_mobil' => $image['file_name'],

      );
      $this->Mglobal->tambahdata($data, 'tbl_mobil');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/master/mobil/'));
    } else {
      $data = array(
        'nama_mobil' => $this->input->post('nama_mobil'),
        'kd_mobil' => $this->input->post('kd_mobil'),
        'kd_jenismobil' => $this->input->post('kd_jenismobil'),
        'ket_mobil' => $this->input->post('ket_mobil'),
        'harga_mobil' => $this->input->post('harga_mobil'),
        'gambar_mobil' => 'foto_mobil.png',
      );
      $this->Mglobal->tambahdata($data, 'tbl_mobil');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/master/mobil/'));
    }
  }

  // else {
  //
  //  $this->load->view('mobil/temp/v_header');
  // $this->load->view('mobil/temp/v_atas');
  // $this->load->view('mobil/temp/v_sidebar');
  // $this->load->view('mobil/master/mobil/v_mobil');
  // $this->load->view('mobil/temp/v_footer');
  // }
  // }
  function hapusmobil()
  {
    $where = array('kd_mobil' => $this->input->post('kd_mobil'));
    $this->Mglobal->hapusdata($where, 'tbl_mobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/mobil/'));
  }

  function aksieditmobil()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_mobil', 'Nama mobil', 'required');
    //  $this->form_validation->set_rules('username_mobil', 'Username mobil', 'required');
    //   $this->form_validation->set_rules('password_mobil', 'Password mobil', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar_mobil_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto_mobil')) {
      $image = $this->upload->data();
      $where = array('kd_mobil' => $this->input->post('kd_mobil'));
      $data = array(
        'nama_mobil' => $this->input->post('nama_mobil'),
        'kd_mobil' => $this->input->post('kd_mobil'),
        'kd_jenismobil' => $this->input->post('kd_jenismobil'),
        'ket_mobil' => $this->input->post('ket_mobil'),
        'harga_mobil' => $this->input->post('harga_mobil'),
        'gambar_mobil' => $image['file_name'],
      );
      $this->Mglobal->editdata('tbl_mobil', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/mobil/'));
    } else {
      $where = array('kd_mobil' => $this->input->post('kd_mobil'));
      $data = array(
        'nama_mobil' => $this->input->post('nama_mobil'),
        'kd_mobil' => $this->input->post('kd_mobil'),
        'kd_jenismobil' => $this->input->post('kd_jenismobil'),
        'ket_mobil' => $this->input->post('ket_mobil'),
        'harga_mobil' => $this->input->post('harga_mobil'),

      );
      $this->Mglobal->editdata('tbl_mobil', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/mobil/'));
    }
  }
}
