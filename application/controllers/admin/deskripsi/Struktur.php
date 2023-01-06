<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
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
    $data['x1'] = 'Struktur Organisasi';
    $data['x2'] = 'Struktur Organisasi';
    $data['x3'] = 'Struktur Organisasi';
    // $data['x4']='Data struktur Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['struktur'] = $this->Mglobal->tampilkandata('tbl_struktur');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_struktur2');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahstruktur()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'struktur';
    $data['x3'] = 'Tambah struktur Inventaris';
    $data['x4'] = 'Menambahkan Data struktur Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/struktur/vtambahstruktur', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahstruktur()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_struktur')) {
      $image = $this->upload->data();
      $data = array(
        'kd_struktur' => $this->input->post('kd_struktur'),
        'nama_struktur' => $this->input->post('nama_struktur'),
        'username_struktur' => $this->input->post('username_struktur'),
        'alamat_struktur' => $this->input->post('alamat_struktur'),
        'nohp_struktur' => $this->input->post('nohp_struktur'),
        'status_struktur' => $this->input->post('status_struktur'),
        'gambar_struktur' => $image['file_name'],
        'password_struktur' => md5($this->input->post('password_struktur'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_struktur');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('struktur/master/struktur/'));
    } else {
      $data = array(
        'kd_struktur' => $this->input->post('kd_struktur'),
        'nama_struktur' => $this->input->post('nama_struktur'),
        'username_struktur' => $this->input->post('username_struktur'),
        'alamat_struktur' => $this->input->post('alamat_struktur'),
        'nohp_struktur' => $this->input->post('nohp_struktur'),
        'status_struktur' => $this->input->post('status_struktur'),
        // 'gambar_struktur' => $image['file_name'],
        'password_struktur' => md5($this->input->post('password_struktur'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_struktur');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('struktur/master/struktur/'));
    }
  }

  function hapusstruktur()
  {
    $where = array('kd_struktur' => $this->input->post('kd_struktur'));
    $this->Mglobal->hapusdata($where, 'tbl_struktur');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('struktur/master/struktur/'));
  }
  function editstruktur($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'struktur';
    $data['x3'] = 'Edit struktur Inventaris';
    $data['x4'] = 'Mengedit Data struktur Inventaris Sahabat Optik';
    $where = array('kd_struktur' => $id);
    $data['struktur'] = $this->Mglobal->tampilkandatasingle('tbl_struktur', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/struktur/veditstruktur', $data);
    $this->load->view('adm/footer');
  }
  function aksieditstruktur()
  {
    $where = array('kd_struktur' => $this->input->post('kd_struktur'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_struktur')) {
      $image = $this->upload->data();
      $data = array(
        'judul_struktur' => $this->input->post('judul_struktur'),
        'ket_struktur' => $this->input->post('ket_struktur'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        'gambar_struktur' => $image['file_name'],
        //  'password_struktur'=>md5($this->input->post('password_struktur'))
      );
      $this->Mglobal->editdata('tbl_struktur', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/struktur/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/struktur/vtambahstruktur');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'judul_struktur' => $this->input->post('judul_struktur'),
        'ket_struktur' => $this->input->post('ket_struktur'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_struktur' => $image['file_name'],
        //  'password_struktur'=>md5($this->input->post('password_struktur'))
      );
      $this->Mglobal->editdata('tbl_struktur', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/struktur/'));
    }
  }
}
