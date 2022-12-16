<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ljasa extends CI_Controller
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
    $data['x1'] = 'Laporan Data Jasa';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Jasa';
    // $data['x4']='Data jasa Sahabat Optik';
    $data['jasa'] = $this->Mglobal->tampilkandata('tbl_jasa');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/jasa/vljasa');
    // $this->load->view('jasa/laporan/jasa/vljasa');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_jasa()
  {
    $this->load->library('pdf');

    $data['jasa'] = $this->Mglobal->tampilkandata('tbl_jasa');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanjasa.pdf";
    $this->pdf->load_view('admin/laporan/jasa/vlaporanpdfjasa', $data);
    // nama file pdf yang di hasilkan
  }
}
