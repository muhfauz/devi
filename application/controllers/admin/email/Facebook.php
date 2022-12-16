<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facebook extends CI_Controller
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
    $data['x1'] = 'Data Facebook';
    $data['x2'] = 'Master';
    $data['x3'] = 'Facebook';
    // $data['x4']='Data facebook Sahabat Optik';
    $data['facebook'] = $this->db->query('select * from tbl_facebook E, tbl_admin A where E.kd_admin=A.kd_admin order by E.kd_facebook desc')->result();
    $data['template'] = 'admin/facebook/v_facebook';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahfacebook()
  {

    $data = array(
      'kd_facebook' => $this->input->post('kd_facebook'),
      'nama_facebook' => $this->input->post('nama_facebook'),
      'password_facebook' => $this->input->post('password_facebook'),
      'url_facebook' => $this->input->post('url_facebook'),
      'email_facebook' => $this->input->post('email_facebook'),
      'hp_facebook' => $this->input->post('hp_facebook'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_facebook' => date("Y-m-d H:i:s"),

      // 'foto_facebook' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_facebook');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/email/facebook/'));
  }

  // else {
  //
  //  $this->load->view('facebook/temp/v_header');
  // $this->load->view('facebook/temp/v_atas');
  // $this->load->view('facebook/temp/v_sidebar');
  // $this->load->view('facebook/master/facebook/v_facebook');
  // $this->load->view('facebook/temp/v_footer');
  // }
  // }
  function hapusfacebook()
  {
    $where = array('kd_facebook' => $this->input->post('kd_facebook'));
    $this->Mglobal->hapusdata($where, 'tbl_facebook');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/facebook/'));
  }

  function aksieditfacebook()
  {
    $where = array('kd_facebook' => $this->input->post('kd_facebook'));
    $data = array(
      'nama_facebook' => $this->input->post('nama_facebook'),
      'password_facebook' => $this->input->post('password_facebook'),
      'url_facebook' => $this->input->post('url_facebook'),
      'email_facebook' => $this->input->post('email_facebook'),
      'hp_facebook' => $this->input->post('hp_facebook'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_facebook' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_facebook', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/facebook/'));
  }
}
