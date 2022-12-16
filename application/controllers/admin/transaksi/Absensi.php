<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
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
    $data['x1'] = 'Input Absensi';
    $data['x2'] = 'Absensi';
    $data['x3'] = 'Absensi';
    // $data['x4']='Data gaji Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['gaji'] = $this->db->query("select * from tbl_gaji where status_gaji='aktif'")->result();
    $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/absensi/v_setgaji');
    $this->load->view('admin/temp/v_footer');
  }

  function settingabsensi()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $kd_admin = $this->session->userdata('kd_admin');

    $this->db->query("INSERT INTO tbl_gajidetail (kd_gaji, kd_karyawan, kd_admin)
    SELECT '$kd_gaji',tbl_karyawan.kd_karyawan, '$kd_admin' from tbl_karyawan");
    // $this->Mglobal->tambahdata($data, 'tbl_gaji');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/absensi/'));
  }
  function unsettingabsensi()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $kd_admin = $this->session->userdata('kd_admin');

    $this->db->query("DELETE FROM tbl_gajidetail WHERE kd_gaji='$kd_gaji'");


    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/absensi/'));
  }
  function inputabsensi()
  {

    $data['x1'] = 'Input Absensi';
    $data['x2'] = 'Absensi';
    $data['x3'] = 'Absensi ';
    $data['x4'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['x1'] = 'Input Absensi';
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and GD.kd_gaji='$kd_gaji'")->result();
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/absensi/v_inputabsensi');
    $this->load->view('admin/temp/v_footer');
  }
  function inputkehadiran()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    // $session = array('kd_gaji' => $kd_gaji);
    // $this->session->set_flashdata('kd_gaji', $kd_gaji);
    $where = array('kd_gajidetail' => $this->input->post('kd_gajidetail'));

    $data = array(
      'jumlah_masuk' => $this->input->post('jumlah_masuk'),
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Input Absensi Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/absensi/inputabsensi'));
  }
  function inputabsensix()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $session = array('kd_gaji' => $kd_gaji);
    $this->session->set_userdata($session);
    redirect(base_url('admin/transaksi/absensi/inputabsensi'));
  }
}
