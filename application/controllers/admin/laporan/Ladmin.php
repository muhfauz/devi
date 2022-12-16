<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ladmin extends CI_Controller
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
    $data['x1'] = 'Laporan Data Admin';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Admin';
    // $data['x4']='Data Admin Sahabat Optik';
    $data['admin'] = $this->Mglobal->tampilkandata('tbl_admin');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/admin/vladmin2');
    // $this->load->view('admin/laporan/admin/vladmin');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_admin()
  {
    $this->load->library('pdf');

    $data['admin'] = $this->Mglobal->tampilkandata('tbl_admin');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanadmin.pdf";
    $this->pdf->load_view('admin/laporan/admin/vlaporanpdfadmin', $data);
    // nama file pdf yang di hasilkan
  }
}
