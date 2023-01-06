<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
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
    $data['x1'] = 'Tentang Kami';
    $data['x2'] = 'Tentang Kami';
    $data['x3'] = 'Tentang Kami';
    // $data['x4']='Data tentang Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tentang'] = $this->Mglobal->tampilkandata('tbl_tentang');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_tentang2');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtentang()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tentang';
    $data['x3'] = 'Tambah tentang Inventaris';
    $data['x4'] = 'Menambahkan Data tentang Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tentang/vtambahtentang', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahtentang()
  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_tentang')) {
      $image = $this->upload->data();
      $data = array(
        'kd_tentang' => $this->input->post('kd_tentang'),
        'nama_tentang' => $this->input->post('nama_tentang'),
        'username_tentang' => $this->input->post('username_tentang'),
        'alamat_tentang' => $this->input->post('alamat_tentang'),
        'nohp_tentang' => $this->input->post('nohp_tentang'),
        'status_tentang' => $this->input->post('status_tentang'),
        'gambar_tentang' => $image['file_name'],
        'password_tentang' => md5($this->input->post('password_tentang'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_tentang');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('tentang/master/tentang/'));
    } else {
      $data = array(
        'kd_tentang' => $this->input->post('kd_tentang'),
        'nama_tentang' => $this->input->post('nama_tentang'),
        'username_tentang' => $this->input->post('username_tentang'),
        'alamat_tentang' => $this->input->post('alamat_tentang'),
        'nohp_tentang' => $this->input->post('nohp_tentang'),
        'status_tentang' => $this->input->post('status_tentang'),
        // 'gambar_tentang' => $image['file_name'],
        'password_tentang' => md5($this->input->post('password_tentang'))
      );
      $this->Mglobal->tambahdata($data, 'tbl_tentang');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('tentang/master/tentang/'));
    }
  }

  function hapustentang()
  {
    $where = array('kd_tentang' => $this->input->post('kd_tentang'));
    $this->Mglobal->hapusdata($where, 'tbl_tentang');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('tentang/master/tentang/'));
  }
  function edittentang($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tentang';
    $data['x3'] = 'Edit tentang Inventaris';
    $data['x4'] = 'Mengedit Data tentang Inventaris Sahabat Optik';
    $where = array('kd_tentang' => $id);
    $data['tentang'] = $this->Mglobal->tampilkandatasingle('tbl_tentang', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tentang/vedittentang', $data);
    $this->load->view('adm/footer');
  }
  function aksiedittentang()
  {
    $where = array('kd_tentang' => $this->input->post('kd_tentang'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '2048000000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_tentang')) {
      $image = $this->upload->data();
      $data = array(
        'judul_tentang' => $this->input->post('judul_tentang'),
        'isi_tentang' => $this->input->post('isi_tentang'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        'gambar_tentang' => $image['file_name'],
        //  'password_tentang'=>md5($this->input->post('password_tentang'))
      );
      $this->Mglobal->editdata('tbl_tentang', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/tentang/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/tentang/vtambahtentang');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'judul_tentang' => $this->input->post('judul_tentang'),
        'isi_tentang' => $this->input->post('isi_tentang'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        // 'gambar_tentang' => $image['file_name'],
        //  'password_tentang'=>md5($this->input->post('password_tentang'))
      );
      $this->Mglobal->editdata('tbl_tentang', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/deskripsi/tentang/'));
    }
  }
}
