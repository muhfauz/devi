<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpenyewaan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') <> 'login') {
      redirect(base_url('login'));
    }
    //Codeigniter : Write Less Do More
  }
  function pilih()
  {
    $data['x1'] = 'Sewa Lapangan';
    $data['x2'] = 'Penyewaan';
    $data['x3'] = 'Pilih Tanggal dan Lapangan';
    // $data['x4']='Data Admin Sahabat Optik';
    $kd_penyewa = $this->session->userdata('kd_penyewa');
    $where = array('kd_penyewa' => $kd_penyewa);
    $data['lapangan'] = $this->Mglobal->tampilkandata('tbl_lapangan');
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    // $data['penyewa'] = $this->Mglobal->tampilkandatasingle('tbl_penyewa', $where);
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penyewaan/v_pilih');
    $this->load->view('admin/temp/v_footer');
  }
  function pindah()
  {
    $tgl_penyewaan = $this->input->post('tgl_penyewaan');
    $tgl_sekarang = date('Y-m-d');
    if ($tgl_penyewaan < $tgl_sekarang) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Transaksi Gagal!</strong> Tanggal yang Anda pilih lebih kecil dari tanggal sekarang.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect(base_url('admin/laporan/lpenyewaan/pilih'));
    } else {
      $kd_lapangan = $this->input->post('kd_lapangan');
      $nama_lapangan = $this->db->query("select nama_lapangan from tbl_lapangan where kd_lapangan='$kd_lapangan'")->row()->nama_lapangan;
      $session = array('tgl_penyewaan' => $tgl_penyewaan, 'kd_lapangan' => $kd_lapangan, 'nama_lapangan' => $nama_lapangan);
      $this->session->set_userdata($session);
      redirect(base_url('admin/laporan/lpenyewaan/'));
    }
  }

  function index()
  {
    $data['x1'] = 'Data Penyewaan';
    $data['x2'] = 'Master';
    $data['x3'] = 'penyewa';
    $data['x4'] = 'Data penyewa ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['penyewa'] = $this->db->query("select * from tbl_penyewa")->result();

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/penyewaan/v_lpenyewaan');
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
