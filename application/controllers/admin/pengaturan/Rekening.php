<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
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
    $data['x1'] = 'Pengaturan rekening';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Pengaturan rekening';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    // $data['x4']='Data Admin Sahabat Optik';

    $data['rekening'] = $this->Mglobal->tampilkandata('tbl_rekening');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_rekening');
    $this->load->view('admin/temp/v_footer');
  }
  function aksitambahrekening()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
    // $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
    // if($this->form_validation->run()!=false)
    // {
    $data = array(
      'kd_rekening' => $this->input->post('kd_rekening'),
      'nama_bank' => $this->input->post('nama_bank'),
      'nama_rekening' => $this->input->post('nama_rekening'),
      'nomor_rekening' => $this->input->post('nomor_rekening'),

    );
    $this->Mglobal->tambahdata($data, 'tbl_rekening');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/rekening/'));
  }

  function aksieditrekening()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
    //   $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $where = array('kd_rekening' => $this->input->post('kd_rekening'));
    $data = array(

      'nama_bank' => $this->input->post('nama_bank'),
      'nama_rekening' => $this->input->post('nama_rekening'),
      'nomor_rekening' => $this->input->post('nomor_rekening'),

      //  'password_admin'=>md5($this->input->post('password_admin'))
    );
    $this->Mglobal->editdata('tbl_rekening', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/rekening/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/admin/vtambahadmin');
    //    $this->load->view('adm/footer');
    //  }
  }
  function hapusrekening()
  {
    $where = array('kd_rekening' => $this->input->post('kd_rekening'));
    $this->Mglobal->hapusdata($where, 'tbl_rekening');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/rekening/'));
  }
}
