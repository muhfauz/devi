<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpaket extends CI_Controller
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
    $data['x1'] = 'Laporan Data paket';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'paket';
    // $data['x4']='Data paket Sahabat Optik';
    $data['paket'] = $this->Mglobal->tampilkandata('tbl_paket');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/paket/vlpaket');
    // $this->load->view('paket/laporan/paket/vlpaket');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_paket()
  {
    $this->load->library('pdf');

    $data['paket'] = $this->Mglobal->tampilkandata('tbl_paket');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanpaket.pdf";
    $this->pdf->load_view('admin/laporan/paket/vlaporanpdfpaket', $data);
    // nama file pdf yang di hasilkan
  }
}
