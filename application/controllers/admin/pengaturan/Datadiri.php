<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadiri extends CI_Controller
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
    $data['x1'] = 'Data Diri';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Data Diri';
    // $data['x4']='Data Admin Sahabat Optik';
    $kd_penyewa = $this->session->userdata('kd_penyewa');
    // $where = array('kd_santri' => $kd_santri);
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['penyewa'] = $this->db->query("select * from tbl_penyewa where kd_penyewa='$kd_penyewa'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_datadiri');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahadmin()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'Admin';
    $data['x3'] = 'Tambah Admin Inventaris';
    $data['x4'] = 'Menambahkan Data Admin Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/admin/vtambahadmin', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahadmin()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_admin')) {
      $image = $this->upload->data();
      $data = array(
        'kd_admin' => $this->input->post('kd_admin'),
        'nama_admin' => $this->input->post('nama_admin'),
        'username_admin' => $this->input->post('username_admin'),
        'alamat_admin' => $this->input->post('alamat_admin'),
        'nohp_admin' => $this->input->post('nohp_admin'),
        'status_admin' => $this->input->post('status_admin'),
        'gambar_admin' => $image['file_name'],
        'password_admin' => md5($this->input->post('password_admin'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_admin');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/admin/'));
    } else {
      $data = array(
        'kd_admin' => $this->input->post('kd_admin'),
        'nama_admin' => $this->input->post('nama_admin'),
        'username_admin' => $this->input->post('username_admin'),
        'alamat_admin' => $this->input->post('alamat_admin'),
        'nohp_admin' => $this->input->post('nohp_admin'),
        'status_admin' => $this->input->post('status_admin'),
        // 'gambar_admin' => $image['file_name'],
        'password_admin' => md5($this->input->post('password_admin'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_admin');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/admin/'));
    }
  }

  function hapusadmin()
  {
    $where = array('kd_admin' => $this->input->post('kd_admin'));
    $this->Mglobal->hapusdata($where, 'tbl_admin');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/admin/'));
  }
  function editadmin($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'Admin';
    $data['x3'] = 'Edit Admin Inventaris';
    $data['x4'] = 'Mengedit Data Admin Inventaris Sahabat Optik';
    $where = array('kd_admin' => $id);
    $data['admin'] = $this->Mglobal->tampilkandatasingle('tbl_admin', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/admin/veditadmin', $data);
    $this->load->view('adm/footer');
  }
  function aksieditdatadiri()
  {
    $where = array('kd_penyewa' => $this->session->userdata('kd_penyewa'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_penyewa')) {
      $image = $this->upload->data();
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        'gambar_penyewa' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_penyewa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/datadiri'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/admin/vtambahadmin');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        // 'gambar_admin' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_penyewa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/datadiri/'));
    }
  }
}
