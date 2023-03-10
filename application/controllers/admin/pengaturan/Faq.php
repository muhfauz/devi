<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['x1'] = 'Data FAQ';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Faq';
    // $data['x4']='Data Admin Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['faq'] = $this->Mglobal->tampilkandata('tbl_faq');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_faq');
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
  function aksitambahfaq()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
    // $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
    // if($this->form_validation->run()!=false)
    // {
    $data = array(
      'tanya_faq' => $this->input->post('tanya_faq'),
      'jawab_faq' => $this->input->post('jawab_faq'),
    );
    $this->Mglobal->tambahdata($data, 'tbl_faq');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/faq/'));
  }
  // else {
  //
  //  $this->load->view('admin/temp/v_header');
  // $this->load->view('admin/temp/v_atas');
  // $this->load->view('admin/temp/v_sidebar');
  // $this->load->view('admin/master/admin/v_admin');
  // $this->load->view('admin/temp/v_footer');
  // }
  // }
  function hapusfaq()
  {
    $where = array('kd_faq' => $this->input->post('kd_faq'));
    $this->Mglobal->hapusdata($where, 'tbl_faq');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/faq/'));
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
  function aksieditfaq()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
    //   $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $where = array('kd_faq' => $this->input->post('kd_faq'));
    $data = array(
      'tanya_faq' => $this->input->post('tanya_faq'),
      'jawab_faq' => $this->input->post('jawab_faq'),
      //  'password_admin'=>md5($this->input->post('password_admin'))
    );
    $this->Mglobal->editdata('tbl_faq', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/faq/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/admin/vtambahadmin');
    //    $this->load->view('adm/footer');
    //  }
  }
}
