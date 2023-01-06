<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
    $data['x1'] = 'Data Kegiatan';
    $data['x2'] = 'Deskripsi';
    $data['x3'] = 'Kegiatan';
    // $data['x4']='Data kegiatan Sahabat Optik';
    $data['kegiatan'] = $this->Mglobal->tampilkandata('tbl_kegiatan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/deskripsi/v_kegiatan');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahkegiatan()
  {
    $data['x1'] = 'Deskripsi';
    $data['x2'] = 'Kegiatan';
    $data['x3'] = 'Tambah kegiatan Inventaris';
    $data['x4'] = 'Menambahkan Data kegiatan Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/deskripsi/kegiatan/vtambahkegiatan', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahkegiatan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
    //  $this->form_validation->set_rules('username_kegiatan', 'Username kegiatan', 'required');
    // $this->form_validation->set_rules('password_kegiatan', 'Password kegiatan', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/kegiatan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kegiatan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kegiatan')) {
    //   $image = $this->upload->data();
    $data = array(
      'kd_kegiatan' => $this->input->post('kd_kegiatan'),
      'hari_kegiatan' => $this->input->post('hari_kegiatan'),
      'jam_kegiatan' => $this->input->post('jam_kegiatan'),
      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
      'keterangan_kegiatan' => $this->input->post('keterangan_kegiatan'),
      // 'foto_kegiatan' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_kegiatan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/deskripsi/kegiatan/'));
  }

  // else {
  //
  //  $this->load->view('kegiatan/temp/v_header');
  // $this->load->view('kegiatan/temp/v_atas');
  // $this->load->view('kegiatan/temp/v_sidebar');
  // $this->load->view('kegiatan/deskripsi/kegiatan/v_kegiatan');
  // $this->load->view('kegiatan/temp/v_footer');
  // }
  // }
  function hapuskegiatan()
  {
    $where = array('kd_kegiatan' => $this->input->post('kd_kegiatan'));
    $this->Mglobal->hapusdata($where, 'tbl_kegiatan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/deskripsi/kegiatan/'));
  }
  function editkegiatan($id)
  {
    $data['x1'] = 'deskripsi';
    $data['x2'] = 'kegiatan';
    $data['x3'] = 'Edit kegiatan Inventaris';
    $data['x4'] = 'Mengedit Data kegiatan Inventaris Sahabat Optik';
    $where = array('kd_kegiatan' => $id);
    $data['kegiatan'] = $this->Mglobal->tampilkandatasingle('tbl_kegiatan', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/deskripsi/kegiatan/veditkegiatan', $data);
    $this->load->view('adm/footer');
  }
  function aksieditkegiatan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
    //  $this->form_validation->set_rules('username_kegiatan', 'Username kegiatan', 'required');
    //   $this->form_validation->set_rules('password_kegiatan', 'Password kegiatan', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/kegiatan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kegiatan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kegiatan')) {
    // $image = $this->upload->data();
    $where = array('kd_kegiatan' => $this->input->post('kd_kegiatan'));
    $data = array(
      'hari_kegiatan' => $this->input->post('hari_kegiatan'),
      'jam_kegiatan' => $this->input->post('jam_kegiatan'),
      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
      'keterangan_kegiatan' => $this->input->post('keterangan_kegiatan'),
      // 'foto_kegiatan' => $image['file_name'],
      //  'password_kegiatan'=>md5($this->input->post('password_kegiatan'))
    );
    $this->Mglobal->editdata('tbl_kegiatan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/deskripsi/kegiatan/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/deskripsi/kegiatan/vtambahkegiatan');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_kegiatan' => $this->input->post('kd_kegiatan'));
    //   $data = array(
    //     'nama_kegiatan' => $this->input->post('nama_kegiatan'),
    //     //'foto_kegiatan' => $image['file_name'],
    //     //  'password_kegiatan'=>md5($this->input->post('password_kegiatan'))
    //   );
    //   $this->Mglobal->editdata('tbl_kegiatan', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/deskripsi/kegiatan/'));
    // }
  }
}
