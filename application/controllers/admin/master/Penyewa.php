<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewa extends CI_Controller
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
    $data['x1'] = 'Data penyewa';
    $data['x2'] = 'Master';
    $data['x3'] = 'penyewa';
    $data['x4'] = 'Data penyewa ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['penyewa'] = $this->db->query("select * from tbl_penyewa")->result();

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_penyewa');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahpenyewa()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'penyewa';
    $data['x3'] = 'Tambah penyewa Inventaris';
    $data['x4'] = 'Menambahkan Data penyewa Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/penyewa/vtambahpenyewa', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahpenyewa()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_penyewa', 'Nama penyewa', 'required');
    //  $this->form_validation->set_rules('username_penyewa', 'Username penyewa', 'required');
    // $this->form_validation->set_rules('password_penyewa', 'Password penyewa', 'required');
    // if($this->form_validation->run()!=false)
    // {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar_penyewa_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_penyewa')) {
      $image = $this->upload->data();
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'kd_penyewa' => $this->input->post('kd_penyewa'),
        'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
        'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'jk_penyewa' => $this->input->post('jk_penyewa'),
        'gambar_penyewa' => $image['file_name'],
        'password_penyewa' => md5('123456'),





        // 'ket_penyewa' => $this->input->post('ket_penyewa'),

      );
      $this->Mglobal->tambahdata($data, 'tbl_penyewa');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/master/penyewa/'));
    } else {
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'kd_penyewa' => $this->input->post('kd_penyewa'),
        'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
        'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'jk_penyewa' => $this->input->post('jk_penyewa'),
        'gambar_penyewa' => 'foto_penyewa.png',
        'password_penyewa' => md5('123456'),

      );
      $this->Mglobal->tambahdata($data, 'tbl_penyewa');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/master/penyewa/'));
    }
  }

  // else {
  //
  //  $this->load->view('penyewa/temp/v_header');
  // $this->load->view('penyewa/temp/v_atas');
  // $this->load->view('penyewa/temp/v_sidebar');
  // $this->load->view('penyewa/master/penyewa/v_penyewa');
  // $this->load->view('penyewa/temp/v_footer');
  // }
  // }
  function hapuspenyewa()
  {
    $where = array('kd_penyewa' => $this->input->post('kd_penyewa'));
    $this->Mglobal->hapusdata($where, 'tbl_penyewa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/penyewa/'));
  }
  function editpenyewa($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'penyewa';
    $data['x3'] = 'Edit penyewa Inventaris';
    $data['x4'] = 'Mengedit Data penyewa Inventaris Sahabat Optik';
    $where = array('kd_penyewa' => $id);
    $data['penyewa'] = $this->Mglobal->tampilkandatasingle('tbl_penyewa', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/penyewa/veditpenyewa', $data);
    $this->load->view('adm/footer');
  }
  function aksieditpenyewa()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_penyewa', 'Nama penyewa', 'required');
    //  $this->form_validation->set_rules('username_penyewa', 'Username penyewa', 'required');
    //   $this->form_validation->set_rules('password_penyewa', 'Password penyewa', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar_penyewa_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto_penyewa')) {
      $image = $this->upload->data();
      $where = array('kd_penyewa' => $this->input->post('kd_penyewa'));
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'kd_penyewa' => $this->input->post('kd_penyewa'),
        'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
        'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'jk_penyewa' => $this->input->post('jk_penyewa'),
        'gambar_penyewa' => $image['file_name'],
        'password_penyewa' => md5('123456'),

      );
      $this->Mglobal->editdata('tbl_penyewa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/penyewa/'));
    } else {
      $where = array('kd_penyewa' => $this->input->post('kd_penyewa'));
      $data = array(
        'nama_penyewa' => $this->input->post('nama_penyewa'),
        'kd_penyewa' => $this->input->post('kd_penyewa'),
        'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
        'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
        'alamat_penyewa' => $this->input->post('alamat_penyewa'),
        'nohp_penyewa' => $this->input->post('nohp_penyewa'),
        'jk_penyewa' => $this->input->post('jk_penyewa'),
        'password_penyewa' => md5('123456'),

      );
      $this->Mglobal->editdata('tbl_penyewa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/penyewa/'));
    }
  }
}
