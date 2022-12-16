<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loutlet extends CI_Controller
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
    $data['x1'] = 'Laporan Data Outlet';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Outlet';
    // $data['x4']='Data outlet Sahabat Optik';
    $data['outlet'] = $this->db->query("select * from tbl_outlet ")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/outlet/vloutlet');
    // $this->load->view('outlet/laporan/outlet/vloutlet');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_outlet()
  {
    $this->load->library('pdf');

    $data['outlet'] = $this->db->query("select * from tbl_outlet ")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanoutlet.pdf";
    $this->pdf->load_view('admin/laporan/outlet/vlaporanpdfoutlet', $data);
    // nama file pdf yang di hasilkan
  }
}
