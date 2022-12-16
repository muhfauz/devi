<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lsiswa extends CI_Controller
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
    $data['x1'] = 'Laporan Data Siswa';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Data Siswa';
    // $data['x4']='Data pembelian Sahabat Optik';
    $data['siswa'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_pembelian asc")->result();
    $data['tingkat'] = $this->Mglobal->tampilkandata('tbl_tingkat');
    $data['kelas'] = $this->Mglobal->tampilkandata('tbl_kelas');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/siswa/vlsiswabaru');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function kelas()
  {
    $session = array('kd_tingkat' => $this->input->post('kd_tingkat'), 'kd_kelas' => $this->input->post('kd_kelas'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lsiswa/lihatkelas'));
  }
  function lihatkelas()
  {
    $kd_tingkat = $this->session->userdata('kd_tingkat');
    $kd_kelas = $this->session->userdata('kd_kelas');
    $data['x1'] = 'Laporan Data Siswa';
    $data['x2'] = 'Laporan ';
    $data['x3'] = 'Laporan Data Siswa';
    $data['x1'] = 'Laporan Data Siswa Siswa Kelas ' . $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat . ' ' . $this->db->query("select * from tbl_kelas where kd_kelas='$kd_kelas'")->row()->kelas;

    // $data['x4']='Data pembelian Sahabat Optik';
    $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk and S.kd_tingkat='$kd_tingkat' and S.kd_kelas='$kd_kelas' ")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/siswa/vltingkatkelas');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function lihat()
  {
    $data['x1'] = 'Laporan Data Siswa';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Data Siswa';
    // $data['x4']='Data pembelian Sahabat Optik';
    $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/siswa/vlsiswaall');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_siswaall()
  {

    $data['judul'] = 'Laporan Data Siswa';
    $data['periode'] = '';
    // $data['item'] = $this->db->query("select sum(jumlah_pembelian) as total_bayar from tbl_detailpembelian")->row()->total_bayar;
    $data['totalsiswa'] = $this->db->query("select * from tbl_siswa")->num_rows();
    $data['totalsiswa7'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT001'")->num_rows();
    $data['totalsiswa8'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT002'")->num_rows();
    $data['totalsiswa9'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT003'")->num_rows();

    $this->load->library('pdf');

    $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporandatasiswa.pdf";
    $this->pdf->load_view('admin/laporan/siswa/vlaporanpdfsiswaall', $data);
    // nama file pdf yang di hasilkan
  }
  function laporan_pdf_tingkatkelas()
  {
    $kd_tingkat = $this->session->userdata('kd_tingkat');
    $kd_kelas = $this->session->userdata('kd_kelas');
    $data['judul'] = 'Laporan Data Siswa';
    $data['periode'] = 'Kelas ' . $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat . ' ' . $this->db->query("select * from tbl_kelas where kd_kelas='$kd_kelas'")->row()->kelas;
    $data['kelas'] = $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat . ' ' . $this->db->query("select * from tbl_kelas where kd_kelas='$kd_kelas'")->row()->kelas;
    $data['totalsiswa'] = $this->db->query("select * from tbl_siswa")->num_rows();
    $data['totalsiswaini'] = $this->db->query("select * from tbl_siswa where kd_tingkat='$kd_tingkat' and kd_kelas='$kd_kelas'")->num_rows();
    $data['totalsiswa7'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT001'")->num_rows();
    $data['totalsiswa8'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT002'")->num_rows();
    $data['totalsiswa9'] = $this->db->query("select * from tbl_siswa where kd_tingkat='TKT003'")->num_rows();
    //     $sql = "select sum(d.jumlah_pembelian) as jumlah_pembelian
    // from tbl_detailpembelian d
    // left join tbl_pembelian p on d.kd_pembelian = p.kd_pembelian
    // where p.tgl_pembelian between '$tgl_awal' and '$tgl_akhir'";
    //     $sql2 = "select sum(d.total_bayar) as total_bayar
    // from tbl_detailpembelian d
    // left join tbl_pembelian p on d.kd_pembelian = p.kd_pembelian
    // where p.tgl_pembelian between '$tgl_awal' and '$tgl_akhir'";

    // $data['item'] = $this->db->query($sql)->row()->jumlah_pembelian;
    $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk and S.kd_tingkat='$kd_tingkat' and S.kd_kelas='$kd_kelas' ")->result();

    $this->load->library('pdf');

    // $data['pembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier and P.tgl_pembelian between '$tgl_awal' and '$tgl_akhir' order by D.kd_pembelian asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A3', 'landscape');
    $this->pdf->filename = "laporansiswakelas.pdf";
    $this->pdf->load_view('admin/laporan/siswa/vlaporanpdfsiswakelas', $data);
    // nama file pdf yang di hasilkan
  }
}
