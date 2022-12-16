<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpenjualan extends CI_Controller
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
    $data['x1'] = 'Laporan Data Penjualan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Penjualan';
    // $data['x4']='Data penjualan Sahabat Optik';
    // $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_penjualan asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penjualan/vlpenjualanbaru');
    // $this->load->view('penjualan/laporan/penjualan/vlpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function tanggal()
  {
    $session = array('tgl_awal' => $this->input->post('tgl_awal'), 'tgl_akhir' => $this->input->post('tgl_akhir'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lpenjualan/lihattanggal'));
  }
  function lihattanggal()
  {
    $tgl_awal = $this->session->userdata('tgl_awal');
    $tgl_akhir = $this->session->userdata('tgl_akhir');
    $data['x1'] = 'Laporan Data Penjualan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'penjualan';
    $data['x1'] = 'Laporan Data penjualan Tanggal ' . $this->Mglobal->tanggalindo($tgl_awal) . '-' . $this->Mglobal->tanggalindo($tgl_akhir);

    // $data['x4']='Data penjualan Sahabat Optik';
    // $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier and P.tgl_penjualan between '$tgl_awal' and '$tgl_akhir' order by D.kd_penjualan asc")->result();
    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet and P.tgl_penjualan between '$tgl_awal' and '$tgl_akhir' order by D.kd_penjualan asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penjualan/vlpenjualanperiode');
    // $this->load->view('penjualan/laporan/penjualan/vlpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function lihat()
  {
    $data['x1'] = 'Laporan Data Penjualan';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Penjualan';
    // $data['x4']='Data penjualan Sahabat Optik';
    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet order by D.kd_penjualan asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penjualan/vlpenjualan');
    // $this->load->view('penjualan/laporan/penjualan/vlpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_penjualan()
  {

    $data['judul'] = 'Laporan Data Penjualan';
    $data['periode'] = '';
    $data['item'] = $this->db->query("select sum(jumlah_penjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar;
    $data['totalpenjualan'] = number_format($this->db->query("select sum(total_bayarpenjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar);

    $this->load->library('pdf');

    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet order by D.kd_penjualan asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporanpenjualan.pdf";
    $this->pdf->load_view('admin/laporan/penjualan/vlaporanpdfpenjualan', $data);
    // nama file pdf yang di hasilkan
  }
  function laporan_pdf_penjualanperiode()
  {
    $tgl_awal = $this->session->userdata('tgl_awal');
    $tgl_akhir = $this->session->userdata('tgl_akhir');
    $data['judul'] = 'Laporan Data penjualan';
    $data['periode'] = 'Tanggal ' . $this->Mglobal->tanggalindo($tgl_awal) . '-' . $this->Mglobal->tanggalindo($tgl_akhir);
    $sql = "select sum(d.jumlah_penjualan) as jumlah_penjualan
from tbl_detailpenjualan d
left join tbl_penjualan p on d.kd_penjualan = p.kd_penjualan
where p.tgl_penjualan between '$tgl_awal' and '$tgl_akhir'";
    $sql2 = "select sum(d.total_bayarpenjualan) as total_bayar
from tbl_detailpenjualan d
left join tbl_penjualan p on d.kd_penjualan = p.kd_penjualan
where p.tgl_penjualan between '$tgl_awal' and '$tgl_akhir'";

    $data['item'] = $this->db->query($sql)->row()->jumlah_penjualan;
    $data['totalpenjualan'] = number_format($this->db->query($sql2)->row()->total_bayar);
    $this->load->library('pdf');

    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet and P.tgl_penjualan between '$tgl_awal' and '$tgl_akhir' order by D.kd_penjualan asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporanpenjualan.pdf";
    $this->pdf->load_view('admin/laporan/penjualan/vlaporanpdfpenjualan', $data);
    // nama file pdf yang di hasilkan
  }
}
