<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
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
    $data['penyewaan'] = $this->Mglobal->tampilkandata('tbl_penyewaan');
    $data['lapangan'] = $this->Mglobal->tampilkandata('tbl_lapangan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/penyewaan/v_penyewaan');
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

  // else {
  //
  //  $this->load->view('penyewaan/temp/v_header');
  // $this->load->view('penyewaan/temp/v_atas');
  // $this->load->view('penyewaan/temp/v_sidebar');
  // $this->load->view('penyewaan/penyewaan/penyewaan/v_penyewaan');
  // $this->load->view('penyewaan/temp/v_footer');
  // }
  // }
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
  function aksieditpenyewaan()
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
      'nama_penyewaan' => $this->input->post('nama_penyewaan'),



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
    redirect(base_url('admin/penyewaan/penyewaan/'));
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
}
