<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
    $data['x1'] = 'Data Transaksi Hutang';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['transaksi'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['transaksi'] = $this->db->query("select * from tbl_transaksi T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_transaksi='hutang'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_transaksi');
    $this->load->view('admin/temp/v_footer');
  }
  function lunas()
  {
    $data['x1'] = 'Data Transaksi Lunas';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['transaksi'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['transaksi'] = $this->db->query("select * from tbl_transaksi T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_transaksi='lunas'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_transaksilunas');
    $this->load->view('admin/temp/v_footer');
  }
  function selesai()
  {
    $data['x1'] = 'Data Transaksi Selesai';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    //$data['transaksi'] = $this->Mglobal->tampilkandata('tbl_transaksi');
    $data['transaksi'] = $this->db->query("select * from tbl_transaksi T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.status_transaksi='selesai'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_transaksiselesai');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtransaksi()
  {
    $this->db->query("delete from tbl_tambahitemtemp");
    $data['x1'] = 'Transaki Baru';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi Baru';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['paket'] = $this->Mglobal->tampilkandata('tbl_paket');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_transaksibaru1');
    $this->load->view('admin/temp/v_footer');
  }
  function detailtransaksi($id)
  {

    $data['x1'] = 'Transaki Detail';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['paket'] = $this->Mglobal->tampilkandata('tbl_paket');
    $data['transaksi'] = $this->db->query("select * from tbl_transaksi T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.kd_transaksi='$id'")->result();

    $data['detailtransaksi'] = $this->db->query("select * from tbl_tambahitem D, tbl_paket P where D.kd_paket=P.kd_paket and D.kd_transaksi='$id'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_detailtransaksi1');
    $this->load->view('admin/temp/v_footer');
  }

  function tambah()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'barang';
    $data['x3'] = 'Tambah barang Inventaris';
    $data['x4'] = 'Menambahkan Data barang Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/barang/vtambahbarang', $data);
    $this->load->view('adm/footer');
  }
  public function aksitambahpaket()
  {
    $kd_paket = $this->input->post('kd_paket');
    $cek = $this->db->query("select * from tbl_tambahitemtemp where kd_paket='$kd_paket'")->num_rows();
    if ($cek > 0) {
      echo "1";
    } else {


      //  $cek = $this->db->query("select kd_paket from tbl_tambahitemtemp where kd_paket='$kd_paket")->num_rows();
      // if ($cek > 0) {
      //   redirect(base_url('admin/master/paket/'));
      // } else {
      $data = array(
        'kd_paket' => $this->input->post('kd_paket'),
        'jumlah_paket' => $this->input->post('jumlah_paket'),
        'jumlah_bayar' => $this->input->post('jumlah_bayar'),
        'kd_transaksi' => $this->input->post('kd_transaksi'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->tambahdata($data, 'tbl_tambahitemtemp');
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

    $where = array('kd_transaksi' => $this->input->post('kd_transaksi'));
    $data = array(
      'status_transaksi' => 'lunas',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_transaksi', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/transaksi/lunas'));
  }
  function transaksiselesai()
  {

    $where = array('kd_transaksi' => $this->input->post('kd_transaksi'));
    $data = array(
      'status_transaksi' => 'selesai',
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_transaksi', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/transaksi/selesai'));
  }

  function tampilkanpakettemp()
  {

    // $data['pakettemp'] = $this->Mglobal->tampilkandata('tbl_tambahitemtemp');
    $data['pakettemp'] = $this->db->query("select * from tbl_tambahitemtemp D, tbl_paket P where D.kd_paket=P.kd_paket")->result();
    $this->load->view('admin/transaksi/v_pakettemp', $data);
  }
  function hapuspakettemp()
  {
    $where = array('kd_tambahitem' => $this->input->post('kd_tambahitem'));
    $this->Mglobal->hapusdata($where, 'tbl_tambahitemtemp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    // redirect(base_url('admin/master/barang/'));
  }
  function simpantransaksi()
  {
    $isi = $this->db->query("select * from tbl_tambahitemtemp")->num_rows();
    if ($isi > 0) {
      $uang_muka = $this->input->post('uang_muka');
      $total_bayar = $this->input->post('total_bayar');
      if ($uang_muka == $total_bayar) {
        $data = array(
          'kd_transaksi' => $this->input->post('kd_transaksi'),
          'kd_pelanggan' => $this->input->post('kd_pelanggan'),
          'tgl_transaksi' => date('Y-m-d'),
          'tgl_acara' => $this->input->post('tgl_acara'),
          'tgl_selesai' => $this->input->post('tgl_selesai'),
          'uang_muka' => $this->input->post('uang_muka'),
          'total_bayar' => $this->input->post('total_bayar'),
          'keterangan_transaksi' => $this->input->post('keterangan_transaksi'),
          'status_transaksi' => 'lunas',
          'kd_admin' => $this->session->userdata('kd_admin'),
        );
        // $result_set = $this->tbl_products_model->insertUser($data);
        $this->Mglobal->tambahdata($data, 'tbl_transaksi');
      } else {
        $data = array(
          'kd_transaksi' => $this->input->post('kd_transaksi'),
          'kd_pelanggan' => $this->input->post('kd_pelanggan'),
          'tgl_transaksi' => date('Y-m-d'),
          'tgl_acara' => $this->input->post('tgl_acara'),
          'tgl_selesai' => $this->input->post('tgl_selesai'),
          'uang_muka' => $this->input->post('uang_muka'),
          'total_bayar' => $this->input->post('total_bayar'),
          'keterangan_transaksi' => $this->input->post('keterangan_transaksi'),
          'kd_admin' => $this->session->userdata('kd_admin'),
        );
        // $result_set = $this->tbl_products_model->insertUser($data);
        $this->Mglobal->tambahdata($data, 'tbl_transaksi');
      }
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      // $kd_transaksi = $this->db->query("select * from tbl_transaksi order by kd_transaksi desc limit 1")->row()->kd_transaksi;
      $this->db->query("INSERT INTO  tbl_tambahitem ( kd_transaksi, kd_paket, jumlah_paket, jumlah_bayar)
    SELECT tbl_tambahitemtemp.kd_transaksi, tbl_tambahitemtemp.kd_paket,  tbl_tambahitemtemp.jumlah_paket, tbl_tambahitemtemp.jumlah_bayar from tbl_tambahitemtemp");

      //hapus tabel ociwritekeranjangorarylob
      //mengurangi jumlah stok barang
      //$kd_pemesan = $this->session->userdata('kd_pemesan');
      //$jum=$this->db->query("select * from tbl_keranjang where kd_pemesan='$kd_pemesan'")->num_rows();
      $this->db->query("delete from tbl_tambahitemtemp");
      redirect(base_url('admin/transaksi/transaksi/'));
    } else {
      $this->session->set_flashdata('pesanx', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Simpan Data Gagal!</strong> Anda belum mengisi Paket yang dipesan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/transaksi/transaksi/tambahtransaksi'));
    }
  }
  function edittransaksi($id)
  {
    $this->db->query("delete from tbl_tambahitemtemp");
    $data['x1'] = 'Transaki Detail';
    $data['x2'] = 'Transaksi';
    $data['x3'] = 'Transaksi Detail';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $data['paket'] = $this->Mglobal->tampilkandata('tbl_paket');
    $data['transaksi'] = $this->db->query("select * from tbl_transaksi T, tbl_pelanggan P where T.kd_pelanggan=P.kd_pelanggan and T.kd_transaksi='$id'")->result();
    $data['detailtransaksi'] = $this->db->query("select * from tbl_tambahitem D, tbl_paket P where D.kd_paket=P.kd_paket and D.kd_transaksi='$id'")->result();
    $this->db->query("INSERT INTO  tbl_tambahitemtemp ( kd_transaksi, kd_paket, jumlah_paket, jumlah_bayar)
    SELECT tbl_tambahitem.kd_transaksi, tbl_tambahitem.kd_paket,  tbl_tambahitem.jumlah_paket, tbl_tambahitem.jumlah_bayar from tbl_tambahitem where tbl_tambahitem.kd_transaksi='$id'");
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/v_edittransaksi2');
    $this->load->view('admin/temp/v_footer');
  }
  function simpanedittransaksi()
  {
    $uang_muka = $this->input->post('uang_muka');
    $total_bayar = $this->input->post('total_bayar');
    $kd_transaksi = $this->input->post('kd_transaksi');
    if ($uang_muka == $total_bayar) {
      $where = array('kd_transaksi' => $this->input->post('kd_transaksi'));
      $data = array(

        // 'kd_pelanggan' => $this->input->post('kd_pelanggan'),
        // 'tgl_transaksi' => date('Y-m-d'),
        'tgl_acara' => $this->input->post('tgl_acara'),
        'tgl_selesai' => $this->input->post('tgl_selesai'),
        'uang_muka' => $this->input->post('uang_muka'),
        'total_bayar' => $this->input->post('total_bayar'),
        'keterangan_transaksi' => $this->input->post('keterangan_transaksi'),
        'status_transaksi' => 'lunas',
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      //$this->Mglobal->tambahdata($data, 'tbl_transaksi');
      $this->Mglobal->editdata('tbl_transaksi', $where, $data);
    } else {
      $where = array('kd_transaksi' => $this->input->post('kd_transaksi'));
      $data = array(

        // 'kd_pelanggan' => $this->input->post('kd_pelanggan'),
        // 'tgl_transaksi' => date('Y-m-d'),
        'tgl_acara' => $this->input->post('tgl_acara'),
        'tgl_selesai' => $this->input->post('tgl_selesai'),
        'uang_muka' => $this->input->post('uang_muka'),
        'total_bayar' => $this->input->post('total_bayar'),
        'keterangan_transaksi' => $this->input->post('keterangan_transaksi'),
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      // $result_set = $this->tbl_products_model->insertUser($data);
      $this->Mglobal->editdata('tbl_transaksi', $where, $data);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    // $kd_transaksi = $this->db->query("select * from tbl_transaksi order by kd_transaksi desc limit 1")->row()->kd_transaksi;
    $this->db->query("delete from tbl_tambahitem where kd_transaksi='$kd_transaksi'");
    $this->db->query("INSERT INTO  tbl_tambahitem ( kd_transaksi, kd_paket, jumlah_paket, jumlah_bayar)
    SELECT tbl_tambahitemtemp.kd_transaksi, tbl_tambahitemtemp.kd_paket,  tbl_tambahitemtemp.jumlah_paket, tbl_tambahitemtemp.jumlah_bayar from tbl_tambahitemtemp");

    //hapus tabel ociwritekeranjangorarylob
    //mengurangi jumlah stok barang
    //$kd_pemesan = $this->session->userdata('kd_pemesan');
    //$jum=$this->db->query("select * from tbl_keranjang where kd_pemesan='$kd_pemesan'")->num_rows();
    $this->db->query("delete from tbl_tambahitemtemp");
    redirect(base_url('admin/transaksi/transaksi/'));
  }
  function hapustransaksi()
  {
    $where = array('kd_transaksi' => $this->input->post('kd_transaksi'));
    $this->Mglobal->hapusdata($where, 'tbl_transaksi');
    $this->Mglobal->hapusdata($where, 'tbl_tambahitem');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/transaksi/'));
  }
  function aksieditpaket()
  {
    $where = array('kd_tambahitem' => $this->input->post('kd_tambahitem'));
    $data = array(
      'jumlah_paket' => $this->input->post('jumlah_paket'),
      'jumlah_bayar' => $this->input->post('jumlah_bayar'),

      // 'foto_paket' => $image['file_name'],
      //  'password_paket'=>md5($this->input->post('password_paket'))
    );
    $this->Mglobal->editdata('tbl_tambahitemtemp', $where, $data);
  }
}
