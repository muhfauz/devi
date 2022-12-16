<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lkategori extends CI_Controller
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
    $data['x1'] = 'Laporan Data kategori';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'kategori';
    // $data['x4']='Data kategori Sahabat Optik';
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/kategori/vlkategori');
    // $this->load->view('kategori/laporan/kategori/vlkategori');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_kategori()
  {
    $this->load->library('pdf');

    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporankategori.pdf";
    $this->pdf->load_view('admin/laporan/kategori/vlaporanpdfkategori', $data);
    // nama file pdf yang di hasilkan
  }
}
