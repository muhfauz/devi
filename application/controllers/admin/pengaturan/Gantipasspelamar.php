<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gantipasspelamar extends CI_Controller
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
    $data['x1'] = 'Ganti Password';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Ganti Password Pelamar';
    // $data['x4']='Data Admin Sahabat Optik';
    $kd_pelamar = $this->session->userdata('kd_pelamar');
    $where = array('kd_pelamar' => $kd_pelamar);
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['pelamar'] = $this->Mglobal->tampilkandatasingle('tbl_pelamar', $where);
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_gantipasspelamar');
    $this->load->view('admin/temp/v_footer');
  }

  function aksigantipassword()
  {
    $password_pelamar = $this->session->userdata('password_pelamar');
    $password_lama = md5($this->input->post('password_lama'));
    $password_baru = md5($this->input->post('password_baru'));
    $konfirmasipassword_baru = md5($this->input->post('konfirmasipassword_baru'));
    if ($password_pelamar == $password_lama) {
      if ($password_baru == $konfirmasipassword_baru) {
        // edit datanya
        $where = array('kd_pelamar' => $this->input->post('kd_pelamar'));
        $data = array('password_pelamar' => $password_baru);
        $this->Mglobal->editdata('tbl_pelamar', $where, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ganti Password Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/pengaturan/gantipasspelamar/'));
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ganti Password Gagal!</strong> Password baru yang Anda masukkan tidak sama!!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/pengaturan/gantipasspelamar/'));
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ganti Password Gagal!</strong> Password lama yang Anda masukkan salah!!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/gantipasspelamar/'));
    }
  }
}
