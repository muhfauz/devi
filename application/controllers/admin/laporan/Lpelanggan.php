<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpelanggan extends CI_Controller
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
    $data['x1'] = 'Laporan Data pelanggan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Pelanggan';
    // $data['x4']='Data pelanggan Sahabat Optik';
    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/pelanggan/vlpelanggan');
    // $this->load->view('pelanggan/laporan/pelanggan/vlpelanggan');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_pelanggan()
  {
    $this->load->library('pdf');

    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanpelanggan.pdf";
    $this->pdf->load_view('admin/laporan/pelanggan/vlaporanpdfpelanggan', $data);
    // nama file pdf yang di hasilkan
  }
}
