<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpenyewa extends CI_Controller
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
    $data['x1'] = 'Data penyewa';
    $data['x2'] = 'Master';
    $data['x3'] = 'penyewa';
    $data['x4'] = 'Data penyewa ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['penyewa'] = $this->db->query("select * from tbl_penyewa")->result();

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penyewa/v_lpenyewa');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_penyewa()
  {
    $this->load->library('pdf');

    $data['penyewa'] = $this->Mglobal->tampilkandata('tbl_penyewa');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanpenyewa.pdf";
    $this->pdf->load_view('admin/laporan/penyewa/vlaporanpdfpenyewa', $data);
    // nama file pdf yang di hasilkan
  }
  function detailpenyewa($id)
  {

    $this->load->library('pdf');
    $data['kd_penyewa'] = $id;
    $data['nama_penyewa'] = $this->db->query("select nama_penyewa from tbl_penyewa where kd_penyewa='$id'")->row()->nama_penyewa;
    $data['penyewa'] = $this->db->query("select * from tbl_detailpembelian D, tbl_penyewa B, tbl_pembelian P where D.kd_penyewa=B.kd_penyewa and D.kd_pembelian=P.kd_pembelian and D.kd_penyewa='$id' order by D.ED asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanpenyewa.pdf";
    $this->pdf->load_view('admin/laporan/penyewa/vlaporanpdfpenyewadetail', $data);
    // nama file pdf yang di hasilkan
  }
}
