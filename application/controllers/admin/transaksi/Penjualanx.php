<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
    $data['x1'] = 'Data Penjualan ';
    $data['x2'] = 'Penjualan';
    $data['x3'] = 'Penjualan';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['penjualan'] = $this->Mglobal->tampilkandata('tbl_penjualan');
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan P, tbl_outlet O where P.kd_outlet=O.kd_outlet")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_penjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function lunas()
  {
    $data['x1'] = 'Data penjualan Lunas';
    $data['x2'] = 'penjualan';
    $data['x3'] = 'penjualan';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_penjualan');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['penjualan'] = $this->Mglobal->tampilkandata('tbl_penjualan');
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_penjualan='lunas'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_penjualanlunas');
    $this->load->view('admin/temp/v_footer');
  }
  function selesai()
  {
    $data['x1'] = 'Data penjualan Selesai';
    $data['x2'] = 'penjualan';
    $data['x3'] = 'penjualan';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_penjualan');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['penjualan'] = $this->Mglobal->tampilkandata('tbl_penjualan');
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_penjualan='selesai'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/penjualan/v_penjualanselesai');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahpenjualan()
  {
    $this->db->query("delete from tbl_detailpenjualantemp");
    $data['x1'] = 'Penjualan Baru';
    $data['x2'] = 'Penjualan';
    $data['x3'] = 'Penjualan Baru';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    // $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['outlet'] = $this->Mglobal->tampilkandata('tbl_outlet');
    $data['barang'] = $this->db->query("select * from tbl_detailpembelian D, tbl_barang B where D.kd_barang=B.kd_barang and D.stok_pembelian > 0 order by D.ED asc")->result();
    // $data['detailbarang'] = $this->db->query("select * from tbl_detailbarang D inner join tbl_barang B on D.kd_barang=B.kd_barang")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_penjualanbaru');
    $this->load->view('admin/temp/v_footer');
  }
  function detailpenjualan($id)
  {

    $data['x1'] = 'Penjualan Detail';
    $data['x2'] = 'Lenjualan';
    $data['x3'] = 'penjualan Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    $data['kd_penjualan'] = $id;
    // $data['x4']='Data Pelanggan Sahabat Optik';
    // $data['barang'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    // $data['suplie'] = $this->Mglobal->tampilkandata('tbl_paket');
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan P, tbl_outlet O where P.kd_outlet=O.kd_outlet and P.kd_penjualan='$id'")->result();

    // $data['detailpenjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_barang B  where D.kd_penjualan=B.kd_barang and D.kd_penjualan='$id'")->result();
    $data['detailpenjualan'] = $this->db->query("select * from tbl_detailpenjualan D, tbl_barang B where D.kd_barang=B.kd_barang and D.kd_penjualan='$id'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_detailpenjualan');
    $this->load->view('admin/temp/v_footer');
  }


  public function aksitambahpenjualan()
  {
    $kd_detailpembelian = $this->input->post('kd_detailpembelian');
    $cek = $this->db->query("select * from tbl_detailpenjualantemp where kd_detailpembelian='$kd_detailpembelian'")->num_rows();
    if ($cek > 0) {
      echo "1";
    } else {


      //  $cek = $this->db->query("select kd_paket from tbl_detailpenjualantemptemp where kd_paket='$kd_paket")->num_rows();
      // if ($cek > 0) {
      //   redirect(base_url('admin/master/paket/'));
      // } else {
      $data = array(
        'kd_detailpembelian' => $this->input->post('kd_detailpembelian'),
        'kd_barang' => $this->input->post('kd_barang'),
        'kd_penjualan' => $this->input->post('kd_penjualan'),
        'ED' => $this->input->post('ED'),
        'jumlah_penjualan' => $this->input->post('jumlah_penjualan'),
        'hargajual_barang' => $this->input->post('hargajual_barang'),
        'total_bayarpenjualan' => $this->input->post('total_bayarpenjualan'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->tambahdata($data, 'tbl_detailpenjualantemp');
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

    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $data = array(
      'status_penjualan' => 'lunas',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_penjualan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/penjualan/penjualan/lunas'));
  }
  function penjualanselesai()
  {

    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $data = array(
      'status_penjualan' => 'selesai',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_penjualan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/penjualan/penjualan/selesai'));
  }

  function tampilkanpenjualantemp()
  {    // $data['pakettemp'] = $this->Mglobal->tampilkandata('tbl_detailpenjualantemptemp');
    $data['penjualantemp'] = $this->db->query("select * from tbl_detailpenjualantemp D, tbl_barang B where D.kd_barang=B.kd_barang")->result();
    $this->load->view('admin/transaksi/penjualan/v_detailpenjualantemp', $data);
  }
  function hapusdetailpenjualantemp()
  {
    $where = array('kd_detailpenjualantemp' => $this->input->post('kd_detailpenjualantemp'));
    $this->Mglobal->hapusdata($where, 'tbl_detailpenjualantemp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    // redirect(base_url('admin/master/barang/'));
  }
  function simpanpenjualan()
  {
    $isi = $this->db->query("select * from tbl_detailpenjualantemp")->num_rows();
    if ($isi > 0) {

      $data = array(
        'kd_penjualan' => $this->input->post('kd_penjualan'),
        'kd_outlet' => $this->input->post('kd_outlet'),
        'tgl_penjualan' => $this->input->post('tgl_penjualan'),
        'total_penjualan' => $this->input->post('total_penjualan'),
        'no_fakturpenjualan' => $this->input->post('no_fakturpenjualan'),
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->tambahdata($data, 'tbl_penjualan');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      // $kd_penjualan = $this->db->query("select * from tbl_penjualan order by kd_penjualan desc limit 1")->row()->kd_penjualan;
      $this->db->query("INSERT INTO  tbl_detailpenjualan ( kd_penjualan, kd_detailpembelian, kd_barang, jumlah_penjualan, hargajual_barang, total_bayarpenjualan)
    SELECT tbl_detailpenjualantemp.kd_penjualan, tbl_detailpenjualantemp.kd_detailpembelian, tbl_detailpenjualantemp.kd_barang,  tbl_detailpenjualantemp.jumlah_penjualan, tbl_detailpenjualantemp.hargajual_barang, tbl_detailpenjualantemp.total_bayarpenjualan from tbl_detailpenjualantemp");

      //hapus tabel ociwritekeranjangorarylob
      //mengurangi jumlah stok barang
      //$kd_pemesan = $this->session->userdata('kd_pemesan');
      //$jum=$this->db->query("select * from tbl_keranjang where kd_pemesan='$kd_pemesan'")->num_rows();
      $this->db->query("delete from tbl_detailpenjualantemp");
      redirect(base_url('admin/transaksi/penjualan/'));
    } else {
      $this->session->set_flashdata('pesanx', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Simpan Data Gagal!</strong> Anda belum mengisi barang yang dibeli.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/transaksi/penjualan/tambahpenjualan'));
    }
  }
  function editpenjualan($id)
  {
    $this->db->query("delete from tbl_detailpenjualantemp");
    $data['x1'] = 'Transaki Detail';
    $data['x2'] = 'Penjualan';
    $data['x3'] = 'Penjualan Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    $data['kd_penjualan'] = $id;
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['outlet'] = $this->Mglobal->tampilkandata('tbl_outlet');
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan P, tbl_outlet S where P.kd_outlet=S.kd_outlet and P.kd_penjualan='$id'")->result();



    $this->db->query("INSERT INTO  tbl_detailpenjualantemp ( kd_penjualan, kd_detailpembelian, kd_barang, jumlah_penjualan, hargajual_barang, total_bayarpenjualan)
    SELECT tbl_detailpenjualan.kd_penjualan, tbl_detailpenjualan.kd_detailpembelian, tbl_detailpenjualan.kd_barang,  tbl_detailpenjualan.jumlah_penjualan, tbl_detailpenjualan.hargajual_barang, tbl_detailpenjualan.total_bayarpenjualan from tbl_detailpenjualan where kd_penjualan='$id'");

    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_editpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function simpaneditpenjualan()
  {
    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $data = array(
      // 'kd_penjualan' => $this->input->post('kd_penjualan'),
      'kd_outlet' => $this->input->post('kd_outlet'),
      'tgl_penjualan' => $this->input->post('tgl_penjualan'),
      'total_penjualan' => $this->input->post('total_penjualan'),
      'no_fakturpenjualan' => $this->input->post('no_fakturpenjualan'),
      'kd_admin' => $this->session->userdata('kd_admin'),
    );

    $this->Mglobal->editdata('tbl_penjualan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    $kd_penjualan = $this->input->post('kd_penjualan');
    $this->db->query("delete from tbl_detailpenjualan where kd_penjualan='$kd_penjualan'");
    $this->db->query("INSERT INTO  tbl_detailpenjualan ( kd_penjualan, kd_detailpembelian, kd_barang, jumlah_penjualan, hargajual_barang, total_bayarpenjualan)
    SELECT tbl_detailpenjualantemp.kd_penjualan, tbl_detailpenjualantemp.kd_detailpembelian, tbl_detailpenjualantemp.kd_barang,  tbl_detailpenjualantemp.jumlah_penjualan, tbl_detailpenjualantemp.hargajual_barang, tbl_detailpenjualantemp.total_bayarpenjualan from tbl_detailpenjualantemp");
    $this->db->query("delete from tbl_detailpenjualantemp");
    redirect(base_url('admin/transaksi/penjualan/'));
  }
  function hapuspenjualan()
  {
    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $this->Mglobal->hapusdata($where, 'tbl_penjualan');
    $this->Mglobal->hapusdata($where, 'tbl_detailpenjualan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/'));
  }
  function editdetailpenjualantemp()
  {
    $where = array('kd_detailpenjualantemp' => $this->input->post('kd_detailpenjualantemp'));
    $data = array(
      'kd_detailpembelian' => $this->input->post('kd_detailpembelian'),
      'kd_barang' => $this->input->post('kd_barang'),
      'kd_penjualan' => $this->input->post('kd_penjualan'),
      'ED' => $this->input->post('ED'),
      'jumlah_penjualan' => $this->input->post('jumlah_penjualan'),
      'hargajual_barang' => $this->input->post('hargajual_barang'),
      'total_bayarpenjualan' => $this->input->post('total_bayarpenjualan'),
    );
    $this->Mglobal->editdata('tbl_detailpenjualantemp', $where, $data);
  }
}
