<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lkaryawan extends CI_Controller
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
    $data['x1'] = 'Laporan Data karyawan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'karyawan';
    // $data['x4']='Data karyawan Sahabat Optik';
    $data['karyawan'] = $this->db->query("select * from tbl_karyawan K, tbl_bagian B where K.kd_bagian=B.kd_bagian")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/karyawan/vlkaryawan');
    // $this->load->view('karyawan/laporan/karyawan/vlkaryawan');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_karyawan()
  {
    $this->load->library('pdf');

    $data['karyawan'] = $this->db->query("select * from tbl_karyawan K, tbl_bagian B where K.kd_bagian=B.kd_bagian")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporankaryawan.pdf";
    $this->pdf->load_view('admin/laporan/karyawan/vlaporanpdfkaryawan', $data);
    // nama file pdf yang di hasilkan
  }
}
