<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
    $data['x1'] = 'Profile Kami';
    $data['x2'] = 'Profile Kami';
    $data['x3'] = 'Profile Kami';
    // $data['x4']='Data profile Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['profile'] = $this->Mglobal->tampilkandata('tbl_profile');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_profile');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahprofile()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'profile';
    $data['x3'] = 'Tambah profile Inventaris';
    $data['x4'] = 'Menambahkan Data profile Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/profile/vtambahprofile', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahprofile()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto_profile')) {
      $image = $this->upload->data();
      $data = array(
        'kd_profile' => $this->input->post('kd_profile'),
        'nama_profile' => $this->input->post('nama_profile'),
        'ket_profile' => $this->input->post('ket_profile'),
        'foto_profile' => $image['file_name'],
      );
      $this->Mglobal->tambahdata($data, 'tbl_profile');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/profile'));
    } else {
      $data = array(
        'kd_profile' => $this->input->post('kd_profile'),
        'nama_profile' => $this->input->post('nama_profile'),
        'username_profile' => $this->input->post('username_profile'),
        'alamat_profile' => $this->input->post('alamat_profile'),
        'nohp_profile' => $this->input->post('nohp_profile'),
        'status_profile' => $this->input->post('status_profile'),
        // 'gambar_profile' => $image['file_name'],
        'password_profile' => md5($this->input->post('password_profile'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_profile');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/profile'));
    }
  }

  function hapusprofile()
  {
    $where = array('kd_profile' => $this->input->post('kd_profile'));
    $this->Mglobal->hapusdata($where, 'tbl_profile');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/deskripsi/profile'));
  }
  function editprofile($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'profile';
    $data['x3'] = 'Edit profile Inventaris';
    $data['x4'] = 'Mengedit Data profile Inventaris Sahabat Optik';
    $where = array('kd_profile' => $id);
    $data['profile'] = $this->Mglobal->tampilkandatasingle('tbl_profile', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/profile/veditprofile', $data);
    $this->load->view('adm/footer');
  }
  function aksieditprofile()
  {
    $where = array('kd_profile' => $this->input->post('kd_profile'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto_profile')) {
      $image = $this->upload->data();
      $data = array(
        'foto_profile' => $image['file_name'],
        'nama_profile' => $this->input->post('nama_profile'),
        'ket_profile' => $this->input->post('ket_profile'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        //  'password_profile'=>md5($this->input->post('password_profile'))
      );
      $this->Mglobal->editdata('tbl_profile', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/profile'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/profile/vtambahprofile');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'nama_profile' => $this->input->post('nama_profile'),
        'ket_profile' => $this->input->post('ket_profile'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_profile' => $image['file_name'],
        //  'password_profile'=>md5($this->input->post('password_profile'))
      );
      $this->Mglobal->editdata('tbl_profile', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/profile'));
    }
  }
}
