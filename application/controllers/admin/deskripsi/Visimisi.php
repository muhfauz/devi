<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visimisi extends CI_Controller
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
    $data['x1'] = 'Visi Misi Kami';
    $data['x2'] = 'Visi MisiKami';
    $data['x3'] = 'Visi MisiKami';
    // $data['x4']='Data visimisi Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['visimisi'] = $this->Mglobal->tampilkandata('tbl_visimisi');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_visimisi2');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahvisimisi()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'Visi dan Misiimisi';
    $data['x3'] = 'Tambah visimisi Inventaris';
    $data['x4'] = 'Menambahkan Data visimisi Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/visimisi/vtambahvisimisi', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahvisimisi()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_visimisi')) {
      $image = $this->upload->data();
      $data = array(
        'kd_visimisi' => $this->input->post('kd_visimisi'),
        'nama_visimisi' => $this->input->post('nama_visimisi'),
        'username_visimisi' => $this->input->post('username_visimisi'),
        'alamat_visimisi' => $this->input->post('alamat_visimisi'),
        'nohp_visimisi' => $this->input->post('nohp_visimisi'),
        'status_visimisi' => $this->input->post('status_visimisi'),
        'gambar_visimisi' => $image['file_name'],
        'password_visimisi' => md5($this->input->post('password_visimisi'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_visimisi');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('visimisi/master/visimisi/'));
    } else {
      $data = array(
        'kd_visimisi' => $this->input->post('kd_visimisi'),
        'nama_visimisi' => $this->input->post('nama_visimisi'),
        'username_visimisi' => $this->input->post('username_visimisi'),
        'alamat_visimisi' => $this->input->post('alamat_visimisi'),
        'nohp_visimisi' => $this->input->post('nohp_visimisi'),
        'status_visimisi' => $this->input->post('status_visimisi'),
        // 'gambar_visimisi' => $image['file_name'],
        'password_visimisi' => md5($this->input->post('password_visimisi'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_visimisi');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('visimisi/master/visimisi/'));
    }
  }

  function hapusvisimisi()
  {
    $where = array('kd_visimisi' => $this->input->post('kd_visimisi'));
    $this->Mglobal->hapusdata($where, 'tbl_visimisi');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('visimisi/master/visimisi/'));
  }
  function editvisimisi($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'visimisi';
    $data['x3'] = 'Edit visimisi Inventaris';
    $data['x4'] = 'Mengedit Data visimisi Inventaris Sahabat Optik';
    $where = array('kd_visimisi' => $id);
    $data['visimisi'] = $this->Mglobal->tampilkandatasingle('tbl_visimisi', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/visimisi/veditvisimisi', $data);
    $this->load->view('adm/footer');
  }
  function aksieditvisimisi()
  {
    $where = array('kd_visimisi' => $this->input->post('kd_visimisi'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_visimisi')) {
      $image = $this->upload->data();
      $data = array(
        'judul_visimisi' => $this->input->post('judul_visimisi'),
        'isi_visimisi' => $this->input->post('isi_visimisi'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_visimisi' => $image['file_name'],
        //  'password_visimisi'=>md5($this->input->post('password_visimisi'))
      );
      $this->Mglobal->editdata('tbl_visimisi', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/visimisi/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/visimisi/vtambahvisimisi');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'judul_visimisi' => $this->input->post('judul_visimisi'),
        'isi_visimisi' => $this->input->post('isi_visimisi'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_visimisi' => $image['file_name'],
        //  'password_visimisi'=>md5($this->input->post('password_visimisi'))
      );
      $this->Mglobal->editdata('tbl_visimisi', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/visimisi/'));
    }
  }
}
