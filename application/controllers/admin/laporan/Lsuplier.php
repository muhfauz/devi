<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lsuplier extends CI_Controller
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
    $data['x1'] = 'Laporan Data suplier';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Suplier';
    // $data['x4']='Data suplier Sahabat Optik';
    $data['suplier'] = $this->db->query("select * from tbl_suplier ")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/suplier/vlsuplier');
    // $this->load->view('suplier/laporan/suplier/vlsuplier');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_suplier()
  {
    $this->load->library('pdf');

    $data['suplier'] = $this->db->query("select * from tbl_suplier ")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporansuplier.pdf";
    $this->pdf->load_view('admin/laporan/suplier/vlaporanpdfsuplier', $data);
    // nama file pdf yang di hasilkan
  }
}
