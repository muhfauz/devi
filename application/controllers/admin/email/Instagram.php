<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instagram extends CI_Controller
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
    $data['x1'] = 'Data instagram';
    $data['x2'] = 'Master';
    $data['x3'] = 'instagram';
    // $data['x4']='Data instagram Sahabat Optik';
    $data['instagram'] = $this->db->query('select * from tbl_instagram E, tbl_admin A where E.kd_admin=A.kd_admin order by E.kd_instagram desc')->result();
    $data['template'] = 'admin/instagram/v_instagram';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahinstagram()
  {

    $data = array(
      'kd_instagram' => $this->input->post('kd_instagram'),
      'nama_instagram' => $this->input->post('nama_instagram'),
      'password_instagram' => $this->input->post('password_instagram'),
      'url_instagram' => $this->input->post('url_instagram'),
      'email_instagram' => $this->input->post('email_instagram'),
      'hp_instagram' => $this->input->post('hp_instagram'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_instagram' => date("Y-m-d H:i:s"),

      // 'foto_instagram' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_instagram');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/email/instagram/'));
  }

  // else {
  //
  //  $this->load->view('instagram/temp/v_header');
  // $this->load->view('instagram/temp/v_atas');
  // $this->load->view('instagram/temp/v_sidebar');
  // $this->load->view('instagram/master/instagram/v_instagram');
  // $this->load->view('instagram/temp/v_footer');
  // }
  // }
  function hapusinstagram()
  {
    $where = array('kd_instagram' => $this->input->post('kd_instagram'));
    $this->Mglobal->hapusdata($where, 'tbl_instagram');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/instagram/'));
  }

  function aksieditinstagram()
  {
    $where = array('kd_instagram' => $this->input->post('kd_instagram'));
    $data = array(
      'nama_instagram' => $this->input->post('nama_instagram'),
      'password_instagram' => $this->input->post('password_instagram'),
      'url_instagram' => $this->input->post('url_instagram'),
      'email_instagram' => $this->input->post('email_instagram'),
      'hp_instagram' => $this->input->post('hp_instagram'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_instagram' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_instagram', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/email/instagram/'));
  }
}
