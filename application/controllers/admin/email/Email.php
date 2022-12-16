<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
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
    $data['x1'] = 'Data email';
    $data['x2'] = 'Master';
    $data['x3'] = 'email';
    // $data['x4']='Data email Sahabat Optik';
    $data['email'] = $this->db->query('select * from tbl_email E, tbl_admin A where E.kd_admin=A.kd_admin order by E.kd_email desc')->result();
    $data['template'] = 'admin/email/v_email';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahemail()
  {

    $data = array(
      'nama_email' => $this->input->post('nama_email'),
      'password_email' => $this->input->post('password_email'),
      'verifikasi_email' => $this->input->post('verifikasi_email'),
      'hp_email' => $this->input->post('hp_email'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_email' => date("Y-m-d H:i:s"),

      // 'foto_email' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_email');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/email/email/'));
  }

  // else {
  //
  //  $this->load->view('email/temp/v_header');
  // $this->load->view('email/temp/v_atas');
  // $this->load->view('email/temp/v_sidebar');
  // $this->load->view('email/master/email/v_email');
  // $this->load->view('email/temp/v_footer');
  // }
  // }
  function hapusemail()
  {
    $where = array('kd_email' => $this->input->post('kd_email'));
    $this->Mglobal->hapusdata($where, 'tbl_email');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/email/'));
  }

  function aksieditemail()
  {
    $where = array('kd_email' => $this->input->post('kd_email'));
    $data = array(
      'nama_email' => $this->input->post('nama_email'),
      'password_email' => $this->input->post('password_email'),
      'verifikasi_email' => $this->input->post('verifikasi_email'),
      'hp_email' => $this->input->post('hp_email'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_email' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_email', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/email/'));
  }
}
