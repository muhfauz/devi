<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historysewa extends CI_Controller
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
    // $tgl_penyewaan = $this->session->userdata('tgl_penyewaan');
    $kd_penyewa = $this->session->userdata('kd_penyewa');
    $data['nama_penyewa'] = $this->db->query("select nama_penyewa from tbl_penyewa where kd_penyewa='$kd_penyewa'")->row()->nama_penyewa;
    $data['alamat_penyewa'] = $this->db->query("select alamat_penyewa from tbl_penyewa where kd_penyewa='$kd_penyewa'")->row()->alamat_penyewa;
    // $kd_admin = $this->session->userdata('kd_admin');
    // $cari = $this->db->query("select * from tbl_penyewaan where tgl_penyewaan='$tgl_penyewaan' and kd_lapangan='$kd_lapangan' and kd_jam='JAM001'")->num_rows();
    $data['x1'] = 'Data penyewaan';
    $data['x2'] = 'penyewaan';
    $data['x3'] = 'penyewaan';
    $data['x4'] = 'Data penyewaan ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['penyewaan'] = $this->db->query("select * from tbl_penyewaan P, tbl_lapangan L, tbl_jam J where P.kd_lapangan=L.kd_lapangan and P.kd_jam=J.kd_jam and P.kd_penyewa='$kd_penyewa'")->result();
    $data['lapangan'] = $this->Mglobal->tampilkandata('tbl_lapangan');
    $data['rekening'] = $this->Mglobal->tampilkandata('tbl_rekening');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/penyewaan/v_historysewa');
    $this->load->view('admin/temp/v_footer');
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
  function hapuspenyewaan()
  {
    $where = array('kd_penyewaan' => $this->input->post('kd_penyewaan'));
    $this->Mglobal->hapusdata($where, 'tbl_penyewaan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/penyewaan/penyewaan/'));
  }
  function editpenyewaan($id)
  {
    $data['x1'] = 'penyewaan';
    $data['x2'] = 'penyewaan';
    $data['x3'] = 'Edit penyewaan Inventaris';
    $data['x4'] = 'Mengedit Data penyewaan Inventaris Sahabat Optik';
    $where = array('kd_penyewaan' => $id);
    $data['penyewaan'] = $this->Mglobal->tampilkandatasingle('tbl_penyewaan', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/penyewaan/penyewaan/veditpenyewaan', $data);
    $this->load->view('adm/footer');
  }
  function aksisewauser()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_penyewaan', 'Nama penyewaan', 'required');
    //  $this->form_validation->set_rules('username_penyewaan', 'Username penyewaan', 'required');
    //   $this->form_validation->set_rules('password_penyewaan', 'Password penyewaan', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/penyewaan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_penyewaan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_penyewaan')) {
    // $image = $this->upload->data();
    $where = array('kd_penyewaan' => $this->input->post('kd_penyewaan'));
    $data = array(
      'kd_penyewa' => $this->session->userdata('kd_penyewa'),
      'status_penyewaan' => 'booking',
      'pembayaran_sewa' => $this->input->post('pembayaran_sewa'),
      'tgl_pesan' => date('Y-m-d h:i:sa'),



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
    redirect(base_url('admin/penyewaan/sewauser/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/penyewaan/penyewaan/vtambahpenyewaan');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_penyewaan' => $this->input->post('kd_penyewaan'));
    //   $data = array(
    //     'nama_penyewaan' => $this->input->post('nama_penyewaan'),
    //     //'foto_penyewaan' => $image['file_name'],
    //     //  'password_penyewaan'=>md5($this->input->post('password_penyewaan'))
    //   );
    //   $this->Mglobal->editdata('tbl_penyewaan', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/penyewaan/penyewaan/'));
    // }
  }
  function aksibayaruser()
  {
    $where = array('kd_penyewaan' => $this->input->post('kd_penyewaan'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'buktibayar_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('bukti_bayar')) {
      $image = $this->upload->data();
      $data = array(
        'jumlah_bayar' => $this->input->post('jumlah_bayar'),
        'rekening_bayar' => $this->input->post('rekening_bayar'),
        'bukti_bayar' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_penyewaan', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/penyewaan/historysewa'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/admin/vtambahadmin');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'jumlah_bayar' => $this->input->post('jumlah_bayar'),
        'rekening_bayar' => $this->input->post('rekening_bayar'),
        // 'bukti_bayar' => $image['file_name'],
        // 'status_admin' => $this->input->post('status_admin'),
        // 'gambar_admin' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_admin', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/penyewaan/historysewa'));
    }
  }
}
