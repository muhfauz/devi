<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
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
    $data['x1'] = 'Input Service';
    $data['x2'] = 'service';
    $data['x3'] = 'service';
    // $data['x4']='Data gaji Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['gaji'] = $this->db->query("select * from tbl_gaji where status_gaji='aktif'")->result();
    $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/service/v_setgajiservice');
    $this->load->view('admin/temp/v_footer');
  }

  function settingservice()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $kd_admin = $this->session->userdata('kd_admin');
    $data = array(
      'kd_service' => $this->Mglobal->kode_otomatis('kd_service', 'tbl_service', 'SER'),
      'kd_admin' => $kd_admin,
      'kd_gaji' => $kd_gaji,
      'total_service' => $this->input->post('total_service'),
    );

    $this->Mglobal->tambahdata($data, 'tbl_service');
    // $this->Mglobal->tambahdata($data, 'tbl_gaji');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/service/'));
  }
  function unsettingservice()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $kd_admin = $this->session->userdata('kd_admin');

    $this->db->query("DELETE FROM tbl_service WHERE kd_gaji='$kd_gaji'");


    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Unsetting Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/service/'));
  }
  function inputservice()
  {

    $data['x1'] = 'Input service';
    $data['x2'] = 'service';
    $data['x3'] = 'service ';
    $data['x4'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['total_service'] = $this->db->query("select * from tbl_service where kd_gaji='$kd_gaji'")->row()->total_service;
    $data['total_karyawan'] = $this->db->query("select * from tbl_karyawan where kd_bagian='BAG002'")->num_rows() + 1;
    $data['x1'] = 'Input service';
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and GD.kd_gaji='$kd_gaji' and K.kd_bagian='BAG002'")->result();
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/service/v_inputservice');
    $this->load->view('admin/temp/v_footer');
  }
  function inputinsentif()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $session = array('kd_gaji' => $kd_gaji);
    // $this->session->set_flashdata('kd_gaji', $kd_gaji);
    $where = array('kd_gajidetail' => $this->input->post('kd_gajidetail'));

    $data = array(
      'insentif_reguler' => $this->input->post('insentif_reguler'),
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Input service Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/service/inputservice'));
  }
  function inputservicex()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $session = array('kd_gaji' => $kd_gaji);
    $this->session->set_userdata($session);
    redirect(base_url('admin/transaksi/service/inputservice'));
  }
}
