<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lbarang extends CI_Controller
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
    $data['x1'] = 'Laporan Data barang';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'barang';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/barang/vlbarang');
    // $this->load->view('barang/laporan/barang/vlbarang');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_barang()
  {
    $this->load->library('pdf');

    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanbarang.pdf";
    $this->pdf->load_view('admin/laporan/barang/vlaporanpdfbarang', $data);
    // nama file pdf yang di hasilkan
  }
  function detailbarang($id)
  {

    $this->load->library('pdf');
    $data['kd_barang'] = $id;
    $data['nama_barang'] = $this->db->query("select nama_barang from tbl_barang where kd_barang='$id'")->row()->nama_barang;
    $data['barang'] = $this->db->query("select * from tbl_detailpembelian D, tbl_barang B, tbl_pembelian P where D.kd_barang=B.kd_barang and D.kd_pembelian=P.kd_pembelian and D.kd_barang='$id' order by D.ED asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanbarang.pdf";
    $this->pdf->load_view('admin/laporan/barang/vlaporanpdfbarangdetail', $data);
    // nama file pdf yang di hasilkan
  }
}
