<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lspp extends CI_Controller
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
    $data['x1'] = 'Laporan Data Pembayaran SPP';
    $data['x2'] = 'Laporan';
    $data['x3'] = 'Data Data Pembayaran SPP';
    // $data['x4']='Data pembelian Sahabat Optik';
    $data['siswa'] = $this->db->query("select * from tbl_detailpembelian D, tbl_pembelian P, tbl_barang B, tbl_satuan S, tbl_suplier SP where D.kd_pembelian=P.kd_pembelian and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_suplier=SP.kd_suplier order by D.kd_pembelian asc")->result();
    $data['tingkat'] = $this->Mglobal->tampilkandata('tbl_tingkat');
    $data['kelas'] = $this->Mglobal->tampilkandata('tbl_kelas');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/spp/vlsppall');
    // $this->load->view('pembelian/laporan/pembelian/vlpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  // function kelas()
  // {
  //   $session = array('kd_tingkat' => $this->input->post('kd_tingkat'), 'kd_kelas' => $this->input->post('kd_kelas'));
  //   $this->session->set_userdata($session);
  //   redirect(base_url('admin/laporan/lsiswa/lihatkelas'));
  // }
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
  function all()
  {
    $session = array('bulan' => $this->input->post('bulan'), 'statusbulan' => $this->input->post('status'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lspp/setelahall'));
  }
  function setelahall()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');
    $data['x1'] = 'Data Pembayaran SPP';
    $data['x2'] = 'Pembayaran SPP';
    $data['x3'] = 'Pembayaran SPP';
    $data['bulan'] = $bulan;
    $data['status'] = $status;
    // $data['x4']='Data barang Sahabat Optik';
    // $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00'")->result();
    }


    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/spp/v_bayarsppall');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_spp_all()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');


    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00'")->result();
    }


    if ($bulan == 'Semua') {
      $data['judul'] = 'Laporan Penerimaan SPP Keseluruhan ';
    } else {
      $data['judul'] = 'Laporan Penerimaan SPP bulan ' . $bulan;
    }
    if ($status == 'Semua') {
      $data['status'] = ' Lunas dan Hutang. ';
    } else {
      $data['status'] = $status;
    }



    // $data['periode'] = '';
    // $data['item'] = $this->db->query("select sum(jumlah_penjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar;
    // $data['totalpenjualan'] = number_format($this->db->query("select sum(total_bayarpenjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar);

    $this->load->library('pdf');

    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet order by D.kd_penjualan asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporanpenjualan.pdf";
    $this->pdf->load_view('admin/laporan/spp/vlaporanpdfsppall', $data);
    // nama file pdf yang di hasilkan
  }
  function tingkat()
  {
    $session = array('bulan' => $this->input->post('bulan'), 'statusbulan' => $this->input->post('status'), 'kd_tingkat' => $this->input->post('kd_tingkat'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lspp/setelahtingkat'));
  }
  function setelahtingkat()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');
    $kd_tingkat = $this->session->userdata('kd_tingkat');
    $data['x1'] = 'Data Pembayaran SPP';
    $data['x2'] = 'Pembayaran SPP';
    $data['x3'] = 'Pembayaran SPP';
    $data['bulan'] = $bulan;
    $data['status'] = $status;
    $data['tingkat'] = $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat;
    // $data['x4']='Data barang Sahabat Optik';
    // $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    }

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/spp/v_bayarspptingkat');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_spp_tingkat()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');
    $kd_tingkat = $this->session->userdata('kd_tingkat');


    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SW.kd_tingkat='$kd_tingkat'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat'")->result();
    }
    $tingkat = $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat;

    if ($bulan == 'Semua') {
      $data['judul'] = 'Laporan Penerimaan SPP Keseluruhan Kelas ' . $tingkat;
    } else {
      $data['judul'] = 'Laporan Penerimaan SPP Kelas ' . $tingkat . ' bulan ' . $bulan;
    }
    if ($status == 'Semua') {
      $data['status'] = ' Lunas dan Hutang. ';
    } else {
      $data['status'] = $status;
    }



    // $data['periode'] = '';
    // $data['item'] = $this->db->query("select sum(jumlah_penjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar;
    // $data['totalpenjualan'] = number_format($this->db->query("select sum(total_bayarpenjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar);

    $this->load->library('pdf');

    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet order by D.kd_penjualan asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporanpenjualan.pdf";
    $this->pdf->load_view('admin/laporan/spp/vlaporanpdfsppall', $data);
    // nama file pdf yang di hasilkan
  }
  function kelas()
  {
    $session = array('bulan' => $this->input->post('bulan'), 'statusbulan' => $this->input->post('status'), 'kd_tingkat' => $this->input->post('kd_tingkat'), 'kd_kelas' => $this->input->post('kd_kelas'));
    $this->session->set_userdata($session);
    redirect(base_url('admin/laporan/lspp/setelahkelas'));
  }
  function setelahkelas()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');
    $kd_tingkat = $this->session->userdata('kd_tingkat');
    $kd_kelas = $this->session->userdata('kd_kelas');
    $data['x1'] = 'Data Pembayaran SPP';
    $data['x2'] = 'Pembayaran SPP';
    $data['x3'] = 'Pembayaran SPP';
    $data['bulan'] = $bulan;
    $data['status'] = $status;
    $data['tingkat'] = $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat;
    $data['kelas'] = $this->db->query("select * from tbl_kelas where kd_kelas='$kd_kelas'")->row()->kelas;
    // $data['x4']='Data barang Sahabat Optik';
    // $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    }

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/laporan/spp/v_bayarsppkelas');
    $this->load->view('admin/temp/v_footer');
  }
  function laporan_pdf_spp_kelas()
  {
    $bulan = $this->session->userdata('bulan');
    $status = $this->session->userdata('statusbulan');
    $kd_tingkat = $this->session->userdata('kd_tingkat');
    $kd_kelas = $this->session->userdata('kd_kelas');

    if ($bulan == 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Hutang') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan == 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Semua') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } elseif ($bulan <> 'Semua' and $status == 'Lunas') {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar<>'0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    } else {
      $data['sppdetail'] = $this->db->query("select * from tbl_sppdetail SP, tbl_siswa SW, tbl_admin AD, tbl_tingkat TK, tbl_kelas KL where SP.kd_siswa=SW.kd_siswa and SP.kd_admin=AD.kd_admin and SW.kd_tingkat=TK.kd_tingkat and SW.kd_kelas=KL.kd_kelas and SP.bulan='$bulan' and SP.tgl_bayar='0000-00-00' and SW.kd_tingkat='$kd_tingkat' and SW.kd_kelas='$kd_kelas'")->result();
    }

    $tingkat = $this->db->query("select * from tbl_tingkat where kd_tingkat='$kd_tingkat'")->row()->tingkat;
    $kelas = $this->db->query("select * from tbl_kelas where kd_kelas='$kd_kelas'")->row()->kelas;

    if ($bulan == 'Semua') {
      $data['judul'] = 'Laporan Penerimaan SPP Keseluruhan Kelas ' . $tingkat . ' ' . $kelas;
    } else {
      $data['judul'] = 'Laporan Penerimaan SPP Kelas ' . $tingkat . ' ' . $kelas . ' bulan ' . $bulan;
    }
    if ($status == 'Semua') {
      $data['status'] = ' Lunas dan Hutang. ';
    } else {
      $data['status'] = $status;
    }



    // $data['periode'] = '';
    // $data['item'] = $this->db->query("select sum(jumlah_penjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar;
    // $data['totalpenjualan'] = number_format($this->db->query("select sum(total_bayarpenjualan) as total_bayar from tbl_detailpenjualan")->row()->total_bayar);

    $this->load->library('pdf');

    $data['penjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_penjualan P, tbl_barang B, tbl_satuan S, tbl_outlet O where D.kd_penjualan=P.kd_penjualan and D.kd_barang=B.kd_barang and B.kd_satuan=S.kd_satuan and P.kd_outlet=O.kd_outlet order by D.kd_penjualan asc")->result();
    $data['perush'] = $this->Mglobal->tampilkandata('tbl_perusahaan');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporanpenjualan.pdf";
    $this->pdf->load_view('admin/laporan/spp/vlaporanpdfsppall', $data);
    // nama file pdf yang di hasilkan
  }
}
