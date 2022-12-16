<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
    $data['x1'] = 'Berita';
    $data['x2'] = 'Berita';
    $data['x3'] = 'Berita';
    // $data['x4']='Data berita Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['berita'] = $this->db->query("select * from tbl_berita B, tbl_kategori K where B.kd_kategori=K.kd_kategori")->result();
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/berita/v_berita');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahberita()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'berita';
    $data['x3'] = 'Tambah berita Inventaris';
    $data['x4'] = 'Menambahkan Data berita Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/berita/vtambahberita', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahberita()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_berita')) {
      $image = $this->upload->data();
      $data = array(
        'kd_berita' => $this->input->post('kd_berita'),
        'isi_berita' => $this->input->post('isi_berita'),
        'kd_kategori' => $this->input->post('kd_kategori'),
        'judul_berita' => $this->input->post('judul_berita'),
        'gambar_berita' => $image['file_name'],
        'kd_admin' => $this->session->userdata('kd_admin'),
        'tgl_berita' => date('Y-m-d'),
        'kd_beritaen' => md5($this->input->post('kd_berita')),
      );
      $this->Mglobal->tambahdata($data, 'tbl_berita');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/berita/berita/'));
    } else {
      $data = array(
        'kd_berita' => $this->input->post('kd_berita'),
        'kd_kategori' => $this->input->post('kd_kategori'),
        'isi_berita' => $this->input->post('isi_berita'),
        'judul_berita' => $this->input->post('judul_berita'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        'tgl_berita' => date('Y-m-d'),
        'kd_beritaen' => md5($this->input->post('kd_berita')),
      );
      $this->Mglobal->tambahdata($data, 'tbl_berita');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/berita/berita/'));
    }
  }

  function hapusberita()
  {
    $where = array('kd_berita' => $this->input->post('kd_berita'));
    $this->Mglobal->hapusdata($where, 'tbl_berita');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/berita/berita/'));
  }
  function editberita($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'berita';
    $data['x3'] = 'Edit berita Inventaris';
    $data['x4'] = 'Mengedit Data berita Inventaris Sahabat Optik';
    $where = array('kd_berita' => $id);
    $data['berita'] = $this->Mglobal->tampilkandatasingle('tbl_berita', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/berita/veditberita', $data);
    $this->load->view('adm/footer');
  }
  function aksieditberita()
  {
    $where = array('kd_berita' => $this->input->post('kd_berita'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_berita')) {
      $image = $this->upload->data();
      $data = array(
        'isi_berita' => $this->input->post('isi_berita'),
        'kd_kategori' => $this->input->post('kd_kategori'),
        'judul_berita' => $this->input->post('judul_berita'),
        'gambar_berita' => $image['file_name'],
        'kd_admin' => $this->session->userdata('kd_admin'),
        'tgl_berita' => date('Y-m-d'),
        'kd_beritaen' => md5($this->input->post('kd_berita')),
        //  'password_berita'=>md5($this->input->post('password_berita'))
      );
      $this->Mglobal->editdata('tbl_berita', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/berita/berita/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/berita/vtambahberita');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'isi_berita' => $this->input->post('isi_berita'),
        'kd_kategori' => $this->input->post('kd_kategori'),
        'judul_berita' => $this->input->post('judul_berita'),
        // 'gambar_berita' => $image['file_name'],
        'kd_admin' => $this->session->userdata('kd_admin'),
        'tgl_berita' => date('Y-m-d'),
        'kd_beritaen' => md5($this->input->post('kd_berita')),
        // 'gambar_berita' => $image['file_name'],
        //  'password_berita'=>md5($this->input->post('password_berita'))
      );
      $this->Mglobal->editdata('tbl_berita', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/berita/berita/'));
    }
  }
}
