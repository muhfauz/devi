<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
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
    $data['x1'] = 'Data pembelian ';
    $data['x2'] = 'Pembelian';
    $data['x3'] = 'Pembelian';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    $data['pembelian'] = $this->db->query("select * from tbl_pembelian P, tbl_suplier S where P.kd_suplier=S.kd_suplier")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/pembelian/v_pembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function lunas()
  {
    $data['x1'] = 'Data pembelian Lunas';
    $data['x2'] = 'pembelian';
    $data['x3'] = 'pembelian';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    $data['pembelian'] = $this->db->query("select * from tbl_pembelian T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_pembelian='lunas'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/pembelian/v_pembelianlunas');
    $this->load->view('admin/temp/v_footer');
  }
  function selesai()
  {
    $data['x1'] = 'Data pembelian Selesai';
    $data['x2'] = 'pembelian';
    $data['x3'] = 'pembelian';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['pembelian'] = $this->Mglobal->tampilkandata('tbl_pembelian');
    $data['pembelian'] = $this->db->query("select * from tbl_pembelian T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_pembelian='selesai'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pembelian/v_pembelianselesai');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahpembelian()
  {
    $this->db->query("delete from tbl_detailpembeliantemp");
    $data['x1'] = 'Pembelian Baru';
    $data['x2'] = 'Pembelian';
    $data['x3'] = 'pembelian Baru';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    // $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['suplier'] = $this->Mglobal->tampilkandata('tbl_suplier');
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    // $data['detailbarang'] = $this->db->query("select * from tbl_detailbarang D inner join tbl_barang B on D.kd_barang=B.kd_barang")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/pembelian/v_pembelianbaru');
    $this->load->view('admin/temp/v_footer');
  }
  function detailpembelian($id)
  {

    $data['x1'] = 'Pembelian Detail';
    $data['x2'] = 'Pembelian';
    $data['x3'] = 'Pembelian Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    $data['kd_pembelian'] = $id;
    // $data['x4']='Data Pelanggan Sahabat Optik';
    // $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $data['suplier'] = $this->Mglobal->tampilkandata('tbl_suplier');
    $data['pembelian'] = $this->db->query("select * from tbl_pembelian P, tbl_suplier S where P.kd_suplier=S.kd_suplier and P.kd_pembelian='$id'")->result();

    // $data['detailpembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_barang B  where D.kd_pembelian=B.kd_barang and D.kd_pembelian='$id'")->result();
    $data['detailpembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_barang B where D.kd_barang=B.kd_barang and D.kd_pembelian='$id'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/pembelian/v_detailpembelian');
    $this->load->view('admin/temp/v_footer');
  }


  public function aksitambahpembelian()
  {
    $kd_baramg = $this->input->post('kd_barang');
    $cek = $this->db->query("select * from tbl_detailpembeliantemp where kd_barang='$kd_barang'")->num_rows();
    if ($cek > 0) {
      echo "1";
    } else {


      //  $cek = $this->db->query("select kd_paket from tbl_detailpembeliantemptemp where kd_paket='$kd_paket")->num_rows();
      // if ($cek > 0) {
      //   redirect(base_url('admin/master/paket/'));
      // } else {
      $data = array(
        'kd_barang' => $this->input->post('kd_barang'),
        'ijin_edar' => $this->input->post('ijin_edar'),
        'hna_std' => $this->input->post('hna_std'),
        'ED' => $this->input->post('ED'),
        'kd_pembelian' => $this->input->post('kd_pembelian'),
        'total_bayar' => $this->input->post('hna_std') * $this->input->post('jumlah_pembelian'),
        'jumlah_pembelian' => $this->input->post('jumlah_pembelian'),
        'stok_pembelian' => $this->input->post('jumlah_pembelian'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->tambahdata($data, 'tbl_detailpembeliantemp');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      // redirect(base_url('admin/master/barang/'));

    }
  }






  function hapusbarang()
  {
    $where = array('kd_barang' => $this->input->post('kd_barang'));
    $this->Mglobal->hapusdata($where, 'tbl_barang');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/barang/'));
  }
  function editbarang($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'barang';
    $data['x3'] = 'Edit barang Inventaris';
    $data['x4'] = 'Mengedit Data barang Inventaris Sahabat Optik';
    $where = array('kd_barang' => $id);
    $data['barang'] = $this->Mglobal->tampilkandatasingle('tbl_barang', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/barang/veditbarang', $data);
    $this->load->view('adm/footer');
  }
  function pembayaranlunas()
  {

    $where = array('kd_pembelian' => $this->input->post('kd_pembelian'));
    $data = array(
      'status_pembelian' => 'lunas',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_pembelian', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pembelian/pembelian/lunas'));
  }
  function pembelianselesai()
  {

    $where = array('kd_pembelian' => $this->input->post('kd_pembelian'));
    $data = array(
      'status_pembelian' => 'selesai',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_pembelian', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pembelian/pembelian/selesai'));
  }

  function tampilkanpembeliantemp()
  {

    // $data['pakettemp'] = $this->Mglobal->tampilkandata('tbl_detailpembeliantemptemp');
    $data['pembeliantemp'] = $this->db->query("select * from tbl_detailpembeliantemp D, tbl_barang B where D.kd_barang=B.kd_barang")->result();
    $this->load->view('admin/transaksi/pembelian/v_detailpembeliantemp', $data);
  }
  function hapusdetailpembeliantemp()
  {
    $where = array('kd_detailpembeliantemp' => $this->input->post('kd_detailpembeliantemp'));
    $this->Mglobal->hapusdata($where, 'tbl_detailpembeliantemp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    // redirect(base_url('admin/master/barang/'));
  }
  function simpanpembelian()
  {
    $isi = $this->db->query("select * from tbl_detailpembeliantemp")->num_rows();
    if ($isi > 0) {

      $data = array(
        'kd_pembelian' => $this->input->post('kd_pembelian'),
        'kd_suplier' => $this->input->post('kd_suplier'),
        'tgl_pembelian' => $this->input->post('tgl_pembelian'),
        'total_pembelian' => $this->input->post('total_pembelian'),
        'no_fakturpembelian' => $this->input->post('no_fakturpembelian'),
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->tambahdata($data, 'tbl_pembelian');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      // $kd_pembelian = $this->db->query("select * from tbl_pembelian order by kd_pembelian desc limit 1")->row()->kd_pembelian;
      $this->db->query("INSERT INTO  tbl_detailpembelian ( kd_pembelian, kd_barang, jumlah_pembelian, hna_std, total_bayar, ijin_edar, ED, stok_pembelian)
    SELECT tbl_detailpembeliantemp.kd_pembelian, tbl_detailpembeliantemp.kd_barang,  tbl_detailpembeliantemp.jumlah_pembelian, tbl_detailpembeliantemp.hna_std, tbl_detailpembeliantemp.total_bayar, tbl_detailpembeliantemp.ijin_edar, tbl_detailpembeliantemp.ED, tbl_detailpembeliantemp.stok_pembelian from tbl_detailpembeliantemp");

      //hapus tabel ociwritekeranjangorarylob
      //mengurangi jumlah stok barang
      //$kd_pemesan = $this->session->userdata('kd_pemesan');
      //$jum=$this->db->query("select * from tbl_keranjang where kd_pemesan='$kd_pemesan'")->num_rows();
      $this->db->query("delete from tbl_detailpembeliantemp");
      redirect(base_url('admin/transaksi/pembelian/'));
    } else {
      $this->session->set_flashdata('pesanx', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Simpan Data Gagal!</strong> Anda belum mengisi barang yang dibeli.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/transaksi/pembelian/tambahpembelian'));
    }
  }
  function editpembelian($id)
  {
    $this->db->query("delete from tbl_detailpembeliantemp");
    $data['x1'] = 'Transaki Detail';
    $data['x2'] = 'pembelian';
    $data['x3'] = 'Pembelian Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    $data['kd_pembelian'] = $id;
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['suplier'] = $this->Mglobal->tampilkandata('tbl_suplier');
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $data['pembelian'] = $this->db->query("select * from tbl_pembelian P, tbl_suplier S where P.kd_suplier=S.kd_suplier and P.kd_pembelian='$id'")->result();
    // $data['detailpembelian'] = $this->db->query("select * from tbl_detailpembelian D, tbl_barang B where D.kd_barang=B.kd_barang and D.kd_pembelian='$id'")->result();


    $this->db->query("INSERT INTO  tbl_detailpembeliantemp (kd_pembelian, kd_barang, jumlah_pembelian, hna_std, total_bayar, ijin_edar, ED, stok_pembelian)
    SELECT tbl_detailpembelian.kd_pembelian, tbl_detailpembelian.kd_barang, tbl_detailpembelian.jumlah_pembelian, tbl_detailpembelian.hna_std, tbl_detailpembelian.total_bayar, tbl_detailpembelian.ijin_edar, tbl_detailpembelian.ED, tbl_detailpembelian.stok_pembelian from tbl_detailpembelian where kd_pembelian='$id'");

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/pembelian/v_editpembelian');
    $this->load->view('admin/temp/v_footer');
  }
  function simpaneditpembelian()
  {
    $where = array('kd_pembelian' => $this->input->post('kd_pembelian'));
    $data = array(
      'kd_suplier' => $this->input->post('kd_suplier'),
      'tgl_pembelian' => $this->input->post('tgl_pembelian'),
      'total_pembelian' => $this->input->post('total_pembelian'),
      'no_fakturpembelian' => $this->input->post('no_fakturpembelian'),
      'kd_admin' => $this->session->userdata('kd_admin'),
    );

    $this->Mglobal->editdata('tbl_pembelian', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    $kd_pembelian = $this->input->post('kd_pembelian');
    $this->db->query("delete from tbl_detailpembelian where kd_pembelian='$kd_pembelian'");
    $this->db->query("INSERT INTO  tbl_detailpembelian ( kd_pembelian, kd_barang, jumlah_pembelian, hna_std, total_bayar, ijin_edar, ED, stok_pembelian)
    SELECT tbl_detailpembeliantemp.kd_pembelian, tbl_detailpembeliantemp.kd_barang,  tbl_detailpembeliantemp.jumlah_pembelian, tbl_detailpembeliantemp.hna_std, tbl_detailpembeliantemp.total_bayar, tbl_detailpembeliantemp.ijin_edar, tbl_detailpembeliantemp.ED,  tbl_detailpembeliantemp.stok_pembelian from tbl_detailpembeliantemp");
    $this->db->query("delete from tbl_detailpembeliantemp");
    redirect(base_url('admin/transaksi/pembelian/'));
  }
  function hapuspembelian()
  {
    $where = array('kd_pembelian' => $this->input->post('kd_pembelian'));
    $this->Mglobal->hapusdata($where, 'tbl_pembelian');
    $this->Mglobal->hapusdata($where, 'tbl_detailpembelian');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/pembelian/'));
  }
  function editdetailpembeliantemp()
  {
    $where = array('kd_detailpembeliantemp' => $this->input->post('kd_detailpembeliantemp'));
    $data = array(
      'kd_barang' => $this->input->post('kd_barang'),
      'ijin_edar' => $this->input->post('ijin_edar'),
      'hna_std' => $this->input->post('hna_std'),
      'ED' => $this->input->post('ED'),
      'total_bayar' => $this->input->post('hna_std') * $this->input->post('jumlah_pembelian'),
      'jumlah_pembelian' => $this->input->post('jumlah_pembelian'),
      'stok_pembelian' => $this->input->post('jumlah_pembelian'),


    );
    $this->Mglobal->editdata('tbl_detailpembeliantemp', $where, $data);
  }
}
