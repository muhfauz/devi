<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hosting extends CI_Controller
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
    $data['x1'] = 'Data hosting & domain';
    $data['x2'] = 'Master';
    $data['x3'] = 'Hosting';
    // $data['x4']='Data hosting Sahabat Optik';
    $data['hosting'] = $this->db->query('select * from tbl_hosting E, tbl_admin A where E.kd_admin=A.kd_admin order by E.kd_hosting desc')->result();
    $data['template'] = 'admin/hosting/v_hosting';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahhosting()
  {

    $data = array(
      'kd_hosting' => $this->input->post('kd_hosting'),
      'nama_hosting' => $this->input->post('nama_hosting'),
      'username_hosting' => $this->input->post('username_hosting'),
      'password_hosting' => $this->input->post('password_hosting'),
      'url_hosting' => $this->input->post('url_hosting'),
      'email_hosting' => $this->input->post('email_hosting'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_hosting' => date("Y-m-d H:i:s"),

      // 'foto_hosting' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_hosting');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/email/hosting/'));
  }

  // else {
  //
  //  $this->load->view('hosting/temp/v_header');
  // $this->load->view('hosting/temp/v_atas');
  // $this->load->view('hosting/temp/v_sidebar');
  // $this->load->view('hosting/master/hosting/v_hosting');
  // $this->load->view('hosting/temp/v_footer');
  // }
  // }
  function hapushosting()
  {
    $where = array('kd_hosting' => $this->input->post('kd_hosting'));
    $this->Mglobal->hapusdata($where, 'tbl_hosting');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/hosting/'));
  }

  function aksiedithosting()
  {
    $where = array('kd_hosting' => $this->input->post('kd_hosting'));
    $data = array(
      'nama_hosting' => $this->input->post('nama_hosting'),
      'password_hosting' => $this->input->post('password_hosting'),
      'username_hosting' => $this->input->post('username_hosting'),
      'url_hosting' => $this->input->post('url_hosting'),
      'email_hosting' => $this->input->post('email_hosting'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_hosting' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_hosting', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/hosting/'));
  }
}
