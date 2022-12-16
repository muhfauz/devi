<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perush extends CI_Controller
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
    $data['x1'] = 'Data Perusahaan';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Perusahaan';
    // $data['x4']='Data Admin Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_perush');
    $this->load->view('admin/temp/v_footer');
  }

  function aksieditperush()
  {


    $where = array('kd_perush' => $this->input->post('kd_perush'));
    $data = array(
      'nama_perush' => $this->input->post('nama_perush'),
      'alamat_perush' => $this->input->post('alamat_perush'),
      'tentang_perush' => $this->input->post('tentang_perush'),
      'telepon_perush' => $this->input->post('telepon_perush'),
      'email_perush' => $this->input->post('email_perush'),
      //  'password_admin'=>md5($this->input->post('password_admin'))
    );
    $this->Mglobal->editdata('tbl_perusahaan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/perush/'));
  }
}
