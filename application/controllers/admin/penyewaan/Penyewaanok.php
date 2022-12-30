<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaanok extends CI_Controller
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
    $data['x1'] = 'Data penyewaan';
    $data['x2'] = 'penyewaan';
    $data['x3'] = 'penyewaan';
    $data['x4'] = 'Data penyewaan ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['penyewaan'] = $this->db->query("select * from tbl_penyewaan P, tbl_lapangan L, tbl_jam J, tbl_penyewa S where P.kd_lapangan=L.kd_lapangan and P.kd_jam=J.kd_jam and P.kd_penyewa=S.kd_penyewa")->result();
    $data['lapangan'] = $this->Mglobal->tampilkandata('tbl_lapangan');
    $data['rekening'] = $this->Mglobal->tampilkandata('tbl_rekening');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/penyewaan/v_penyewaanok');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahpenyewaan()
  {
    $data['x1'] = 'penyewaan';
    $data['x2'] = 'penyewaan';
    $data['x3'] = 'Tambah penyewaan Inventaris';
    $data['x4'] = 'Menambahkan Data penyewaan Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/penyewaan/penyewaan/vtambahpenyewaan', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahpenyewaan()
  {

    $tgl_penyewaan = $this->input->post('tgl_penyewaan');
    $kd_lapangan = $this->input->post('kd_lapangan');
    $kd_admin = $this->session->userdata('kd_admin');
    $cari = $this->db->query("select * from tbl_penyewaan where tgl_penyewaan='$tgl_penyewaan' and kd_lapangan='$kd_lapangan' and kd_jam='JAM001'")->num_rows();



    if ($cari > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Tambah Data Gagal!</strong> Data yang Anda tambahkan sudah ada di database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/penyewaan/penyewaan/'));
    } else {

      $this->db->query("INSERT INTO tbl_penyewaan (kd_jam, tgl_penyewaan, kd_lapangan, kd_admin, harga_sewa)
    SELECT tbl_jam.kd_jam, '$tgl_penyewaan', '$kd_lapangan','$kd_admin', tbl_jam.hargasewa_lapangan from tbl_jam");
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/penyewaan/penyewaan/'));
    }
  }

  // else {
  //
  //  $this->load->view('penyewaan/temp/v_header');
  // $this->load->view('penyewaan/temp/v_atas');
  // $this->load->view('penyewaan/temp/v_sidebar');
  // $this->load->view('penyewaan/penyewaan/penyewaan/v_penyewaan');
  // $this->load->view('penyewaan/temp/v_footer');
  // }
  // }

  function aksihapussetting()
  {
    $tgl_penyewaan = $this->input->post('tgl_penyewaan');
    $kd_lapangan = $this->input->post('kd_lapangan');
    $kd_admin = $this->session->userdata('kd_admin');
    $cari = $this->db->query("select * from tbl_penyewaan where tgl_penyewaan='$tgl_penyewaan' and kd_lapangan='$kd_lapangan'")->num_rows();
    if ($cari > 0) {
      $where = array(
        'tgl_penyewaan' => $tgl_penyewaan,
        'kd_lapangan' => $kd_lapangan,
      );
      $this->Mglobal->hapusdata($where, 'tbl_penyewaan');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
      redirect(base_url('admin/penyewaan/penyewaan/'));
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hapus Data Gagal!</strong> Data tidak ada dalam database.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect(base_url('admin/penyewaan/penyewaan/'));
    }
  }


  function aksihapuspenyewaan()
  {
    $where = array('kd_penyewaan' => $this->input->post('kd_penyewaan'));
    $data = array(
      'kd_penyewa' => '',
      'status_penyewaan' => 'kosong',
      'status_penyewaan' => '0000-00-00 00:00:00',
      'pembayaran_sewa' => '',
      // 'status_penyewaan' => 'kosong',
      // 'status_penyewaan' => 'kosong',



      // 'ket_penyewaan' => $this->input->post('ket_penyewaan'),
      // 'foto_penyewaan' => $image['file_name'],
      //  'password_penyewaan'=>md5($this->input->post('password_penyewaan'))
    );
    $this->Mglobal->editdata('tbl_penyewaan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/penyewaan/penyewaanok/'));
  }
}
