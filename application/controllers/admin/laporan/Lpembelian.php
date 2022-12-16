<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpembelian extends CI_Controller
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
    $data['x1'] = 'Laporan Data pembelian';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'pembelian';
    // $data['x4']='Data pembelian Sahabat Optik';
    $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_pembelian asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/pembelian/vlpembelianbaru');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function tanggal()
  {
    $session = array('tgl_awal' => $this->input->post('tgl_awal'), 'tgl_akhir' => $this->input->post('tgl_akhir'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lpembelian/lihattanggal'));
  }
  function lihattanggal()
  {
    $tgl_awal = $this->session->userdata('tgl_awal');
    $tgl_akhir = $this->session->userdata('tgl_akhir');
    $data['x1'] = 'Laporan Data Pembelian';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Pembelian';
    $data['x1'] = 'Laporan Data Pembelian Tanggal ' . $this->Mglobal->tanggalindo($tgl_awal) . '-' . $this->Mglobal->tanggalindo($tgl_akhir);

    // $data['x4']='Data pembelian Sahabat Optik';
    $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier and P.tgl_pembelian between '$tgl_awal' and '$tgl_akhir' order by D.kd_pembelian asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/pembelian/vlpembelianperiode');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function lihat()
  {
    $data['x1'] = 'Laporan Data pembelian';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'pembelian';
    // $data['x4']='Data pembelian Sahabat Optik';
    $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_pembelian asc")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/pembelian/vlpembelian');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_pembelian()
  {

    $data['judul'] = 'Laporan Data Pembelian';
    $data['periode'] = '';
    $data['item'] = $this->db->query("select sum(jumlah_pembelian) as total_bayar from tbl_detailpembelian")->row()->total_bayar;
    $data['totalpembelian'] = number_format($this->db->query("select sum(total_bayar) as total_bayar from tbl_detailpembelian")->row()->total_bayar);

    $this->load->library('pdf');

    $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_pembelian asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporanpembelian.pdf";
    $this->pdf->load_view('admin/laporan/pembelian/vlaporanpdfpembelian', $data);
    // nama file pdf yang di hasilkan
  }
  function laporan_pdf_pembelianperiode()
  {
    $tgl_awal = $this->session->userdata('tgl_awal');
    $tgl_akhir = $this->session->userdata('tgl_akhir');
    $data['judul'] = 'Laporan Data Pembelian';
    $data['periode'] = 'Tanggal ' . $this->Mglobal->tanggalindo($tgl_awal) . '-' . $this->Mglobal->tanggalindo($tgl_akhir);
    $sql = "select sum(d.jumlah_pembelian) as jumlah_pembelian
from tbl_detailpembelian d
left join tbl_pembelian p on d.kd_pembelian = p.kd_pembelian
where p.tgl_pembelian between '$tgl_awal' and '$tgl_akhir'";
    $sql2 = "select sum(d.total_bayar) as total_bayar
from tbl_detailpembelian d
left join tbl_pembelian p on d.kd_pembelian = p.kd_pembelian
where p.tgl_pembelian between '$tgl_awal' and '$tgl_akhir'";

    $data['item'] = $this->db->query($sql)->row()->jumlah_pembelian;
    $data['totalpembelian'] = number_format($this->db->query($sql2)->row()->total_bayar);
    $this->load->library('pdf');

    $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier and P.tgl_pembelian between '$tgl_awal' and '$tgl_akhir' order by D.kd_pembelian asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A3', 'landscape');
    $this->pdf->filename = "laporanpembelian.pdf";
    $this->pdf->load_view('admin/laporan/pembelian/vlaporanpdfpembelian', $data);
    // nama file pdf yang di hasilkan
  }
}
