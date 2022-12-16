<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tatacara extends CI_Controller
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
    $data['x1'] = 'Tata Cara Pendaftaran';
    $data['x2'] = 'Tata Cara Pendaftaran';
    $data['x3'] = 'Tata Cara Pendaftaran';
    // $data['x4']='Data tatacara Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tatacara'] = $this->Mglobal->tampilkandata('tbl_tatacara');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_tatacara');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtatacara()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tatacara';
    $data['x3'] = 'Tambah tatacara Inventaris';
    $data['x4'] = 'Menambahkan Data tatacara Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tatacara/vtambahtatacara', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahtatacara()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_tatacara')) {
      $image = $this->upload->data();
      $data = array(
        'kd_tatacara' => $this->input->post('kd_tatacara'),
        'nama_tatacara' => $this->input->post('nama_tatacara'),
        'username_tatacara' => $this->input->post('username_tatacara'),
        'alamat_tatacara' => $this->input->post('alamat_tatacara'),
        'nohp_tatacara' => $this->input->post('nohp_tatacara'),
        'status_tatacara' => $this->input->post('status_tatacara'),
        'gambar_tatacara' => $image['file_name'],
        'password_tatacara' => md5($this->input->post('password_tatacara'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_tatacara');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('tatacara/master/tatacara/'));
    } else {
      $data = array(
        'kd_tatacara' => $this->input->post('kd_tatacara'),
        'nama_tatacara' => $this->input->post('nama_tatacara'),
        'username_tatacara' => $this->input->post('username_tatacara'),
        'alamat_tatacara' => $this->input->post('alamat_tatacara'),
        'nohp_tatacara' => $this->input->post('nohp_tatacara'),
        'status_tatacara' => $this->input->post('status_tatacara'),
        // 'gambar_tatacara' => $image['file_name'],
        'password_tatacara' => md5($this->input->post('password_tatacara'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_tatacara');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('tatacara/master/tatacara/'));
    }
  }

  function hapustatacara()
  {
    $where = array('kd_tatacara' => $this->input->post('kd_tatacara'));
    $this->Mglobal->hapusdata($where, 'tbl_tatacara');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('tatacara/master/tatacara/'));
  }
  function edittatacara($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tatacara';
    $data['x3'] = 'Edit tatacara Inventaris';
    $data['x4'] = 'Mengedit Data tatacara Inventaris Sahabat Optik';
    $where = array('kd_tatacara' => $id);
    $data['tatacara'] = $this->Mglobal->tampilkandatasingle('tbl_tatacara', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tatacara/vedittatacara', $data);
    $this->load->view('adm/footer');
  }
  function aksiedittatacara()
  {
    $where = array('kd_tatacara' => $this->input->post('kd_tatacara'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_tatacara')) {
      $image = $this->upload->data();
      $data = array(
        'judul_tatacara' => $this->input->post('judul_tatacara'),
        'isi_tatacara' => $this->input->post('isi_tatacara'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        'gambar_tatacara' => $image['file_name'],
        //  'password_tatacara'=>md5($this->input->post('password_tatacara'))
      );
      $this->Mglobal->editdata('tbl_tatacara', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pendaftaran/tatacara/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/tatacara/vtambahtatacara');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'judul_tatacara' => $this->input->post('judul_tatacara'),
        'isi_tatacara' => $this->input->post('isi_tatacara'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_tatacara' => $image['file_name'],
        //  'password_tatacara'=>md5($this->input->post('password_tatacara'))
      );
      $this->Mglobal->editdata('tbl_tatacara', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pendaftaran/tatacara/'));
    }
  }
}
