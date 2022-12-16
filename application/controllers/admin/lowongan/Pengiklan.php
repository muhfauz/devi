<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiklan extends CI_Controller
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
    $data['x1'] = 'Data Pengiklan';
    $data['x2'] = 'Master';
    $data['x3'] = 'pengiklan';
    // $data['x4']='Data pengiklan Sahabat Optik';
    $data['pengiklan'] = $this->db->query('select * from tbl_pengiklan E, tbl_admin A where E.kd_admin=A.kd_admin order by E.kd_pengiklan desc')->result();
    $data['template'] = 'admin/pengiklan/v_pengiklan';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahpengiklan()
  {

    $data = array(
      'kd_pengiklan' => $this->input->post('kd_pengiklan'),
      'nama_pengiklan' => $this->input->post('nama_pengiklan'),
      'tentang_pengiklan' => $this->input->post('tentang_pengiklan'),
      'alamat_pengiklan' => $this->input->post('alamat_pengiklan'),
      'hrd_pengiklan' => $this->input->post('hrd_pengiklan'),
      'email_pengiklan' => $this->input->post('email_pengiklan'),
      'hp_pengiklan' => $this->input->post('hp_pengiklan'),
      'ig_pengiklan' => $this->input->post('ig_pengiklan'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_pengiklan' => date("Y-m-d H:i:s"),

      // 'foto_pengiklan' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_pengiklan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/lowongan/pengiklan/'));
  }

  // else {
  //
  //  $this->load->view('pengiklan/temp/v_header');
  // $this->load->view('pengiklan/temp/v_atas');
  // $this->load->view('pengiklan/temp/v_sidebar');
  // $this->load->view('pengiklan/master/pengiklan/v_pengiklan');
  // $this->load->view('pengiklan/temp/v_footer');
  // }
  // }
  function hapuspengiklan()
  {
    $where = array('kd_pengiklan' => $this->input->post('kd_pengiklan'));
    $this->Mglobal->hapusdata($where, 'tbl_pengiklan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/lowongan/pengiklan/'));
  }

  function aksieditpengiklan()
  {
    $where = array('kd_pengiklan' => $this->input->post('kd_pengiklan'));
    $data = array(
      'nama_pengiklan' => $this->input->post('nama_pengiklan'),
      'tentang_pengiklan' => $this->input->post('tentang_pengiklan'),
      'alamat_pengiklan' => $this->input->post('alamat_pengiklan'),
      'hrd_pengiklan' => $this->input->post('hrd_pengiklan'),
      'email_pengiklan' => $this->input->post('email_pengiklan'),
      'hp_pengiklan' => $this->input->post('hp_pengiklan'),
      'ig_pengiklan' => $this->input->post('ig_pengiklan'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_pengiklan' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_pengiklan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/lowongan/pengiklan/'));
  }
}
