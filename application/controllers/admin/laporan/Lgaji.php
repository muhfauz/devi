<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lgaji extends CI_Controller
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
    $data['x1'] = 'Laporan Gaji';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Laporan';
    // $data['x4']='Data gaji Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['gaji'] = $this->db->query("select * from tbl_gaji")->result();
    $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/gaji/vl_gaji');
    $this->load->view('admin/temp/v_footer');
  }



  function lihatgaji()
  {
    $data['judul1'] = 'Laporan Gaji Karyawan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Laporan';
    $data['x4'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['x1'] = 'Input Absensi';
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J, tbl_bagian B where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and K.kd_bagian=B.kd_bagian and GD.kd_gaji='$kd_gaji' order by K.kd_karyawan")->result();
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/gaji/vl_lihatgaji');
    $this->load->view('admin/temp/v_footer');
  }
  function cetakgaji()
  {
    $this->load->library('pdf');

    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['alamat_perush'] = $this->db->query("select alamat_perush from tbl_perusahaan")->row()->alamat_perush;
    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J, tbl_bagian B where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and K.kd_bagian=B.kd_bagian and GD.kd_gaji='$kd_gaji' order by K.kd_karyawan")->result();


    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporankaryawan.pdf";
    $this->pdf->load_view('admin/laporan/gaji/v_cetakgaji', $data);
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');

  }
  function cetakgajidetail()
  {
    $this->load->library('pdf');

    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['alamat_perush'] = $this->db->query("select alamat_perush from tbl_perusahaan")->row()->alamat_perush;
    $kd_gaji = $this->session->userdata('kd_gaji');
    $kd_karyawan = $this->input->post('kd_karyawan');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J, tbl_bagian B where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and K.kd_bagian=B.kd_bagian and GD.kd_gaji='$kd_gaji' and GD.kd_karyawan='$kd_karyawan' order by K.kd_karyawan")->result();





    $this->pdf->setPaper('A4', 'portrait');
    $this->pdf->filename = "laporankaryawan.pdf";
    $this->pdf->load_view('admin/laporan/gaji/v_cetakgajidetail', $data);
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');

  }

  function lihatgajix()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $session = array('kd_gaji' => $kd_gaji);
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lgaji/lihatgaji'));
  }
}
