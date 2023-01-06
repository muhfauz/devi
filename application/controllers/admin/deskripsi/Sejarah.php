<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah extends CI_Controller
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
    $data['x1'] = 'Sejarah Kami';
    $data['x2'] = 'Sejarah Kami';
    $data['x3'] = 'Sejarah Kami';
    // $data['x4']='Data sejarah Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['sejarah'] = $this->Mglobal->tampilkandata('tbl_sejarah');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_sejarah2');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahsejarah()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'sejarah';
    $data['x3'] = 'Tambah sejarah Inventaris';
    $data['x4'] = 'Menambahkan Data sejarah Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/sejarah/vtambahsejarah', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahsejarah()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_sejarah')) {
      $image = $this->upload->data();
      $data = array(
        'kd_sejarah' => $this->input->post('kd_sejarah'),
        'nama_sejarah' => $this->input->post('nama_sejarah'),
        'username_sejarah' => $this->input->post('username_sejarah'),
        'alamat_sejarah' => $this->input->post('alamat_sejarah'),
        'nohp_sejarah' => $this->input->post('nohp_sejarah'),
        'status_sejarah' => $this->input->post('status_sejarah'),
        'gambar_sejarah' => $image['file_name'],
        'password_sejarah' => md5($this->input->post('password_sejarah'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_sejarah');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('sejarah/master/sejarah/'));
    } else {
      $data = array(
        'kd_sejarah' => $this->input->post('kd_sejarah'),
        'nama_sejarah' => $this->input->post('nama_sejarah'),
        'username_sejarah' => $this->input->post('username_sejarah'),
        'alamat_sejarah' => $this->input->post('alamat_sejarah'),
        'nohp_sejarah' => $this->input->post('nohp_sejarah'),
        'status_sejarah' => $this->input->post('status_sejarah'),
        // 'gambar_sejarah' => $image['file_name'],
        'password_sejarah' => md5($this->input->post('password_sejarah'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_sejarah');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('sejarah/master/sejarah/'));
    }
  }

  function hapussejarah()
  {
    $where = array('kd_sejarah' => $this->input->post('kd_sejarah'));
    $this->Mglobal->hapusdata($where, 'tbl_sejarah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('sejarah/master/sejarah/'));
  }
  function editsejarah($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'sejarah';
    $data['x3'] = 'Edit sejarah Inventaris';
    $data['x4'] = 'Mengedit Data sejarah Inventaris Sahabat Optik';
    $where = array('kd_sejarah' => $id);
    $data['sejarah'] = $this->Mglobal->tampilkandatasingle('tbl_sejarah', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/sejarah/veditsejarah', $data);
    $this->load->view('adm/footer');
  }
  function aksieditsejarah()
  {
    $where = array('kd_sejarah' => $this->input->post('kd_sejarah'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'sejarah_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_sejarah')) {
      $image = $this->upload->data();
      $data = array(
        'judul_sejarah' => $this->input->post('judul_sejarah'),
        'isi_sejarah' => $this->input->post('isi_sejarah'),
        'judul_gambar' => $this->input->post('judul_gambar'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        'gambar_sejarah' => $image['file_name'],
        //  'password_sejarah'=>md5($this->input->post('password_sejarah'))
      );
      $this->Mglobal->editdata('tbl_sejarah', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/sejarah/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/sejarah/vtambahsejarah');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'judul_sejarah' => $this->input->post('judul_sejarah'),
        'isi_sejarah' => $this->input->post('isi_sejarah'),
        'judul_gambar' => $this->input->post('judul_gambar'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_sejarah' => $image['file_name'],
        //  'password_sejarah'=>md5($this->input->post('password_sejarah'))
      );
      $this->Mglobal->editdata('tbl_sejarah', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/sejarah/'));
    }
  }
}
