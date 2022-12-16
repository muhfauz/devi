<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
    $data['x1'] = 'Data bank';
    $data['x2'] = 'Master';
    $data['x3'] = 'bank';
    // $data['x4']='Data bank Sahabat Optik';
    $data['bank'] = $this->db->query('select * from tbl_bank B, tbl_admin A where B.kd_admin=A.kd_admin order by B.kd_bank desc')->result();
    $data['template'] = 'admin/bank/v_bank';
    $this->load->view('admin/temp/v_temp', $data);
  }

  function aksitambahbank()
  {

    $data = array(
      'kd_bank' => $this->input->post('kd_bank'),
      'nama_bank' => $this->input->post('nama_bank'),
      'no_bank' => $this->input->post('no_bank'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'c_bank' => date("Y-m-d H:i:s"),

      // 'foto_bank' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_bank');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/lowongan/bank/'));
  }

  // else {
  //
  //  $this->load->view('bank/temp/v_header');
  // $this->load->view('bank/temp/v_atas');
  // $this->load->view('bank/temp/v_sidebar');
  // $this->load->view('bank/master/bank/v_bank');
  // $this->load->view('bank/temp/v_footer');
  // }
  // }
  function hapusbank()
  {
    $where = array('kd_bank' => $this->input->post('kd_bank'));
    $this->Mglobal->hapusdata($where, 'tbl_bank');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/lowongan/bank/'));
  }

  function aksieditbank()
  {
    $where = array('kd_bank' => $this->input->post('kd_bank'));
    $data = array(
      'nama_bank' => $this->input->post('nama_bank'),
      'no_bank' => $this->input->post('no_bank'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'e_bank' => date("Y-m-d H:i:s"),
    );
    $this->Mglobal->editdata('tbl_bank', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/lowongan/bank/'));
  }
}
