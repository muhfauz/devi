<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
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
    $data['x1'] = 'Data Lapangan';
    $data['x2'] = 'Master';
    $data['x3'] = 'lapangan';
    $data['x4'] = 'Data lapangan ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['lapangan'] = $this->Mglobal->tampilkandata('tbl_lapangan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_lapangan');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahlapangan()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'lapangan';
    $data['x3'] = 'Tambah lapangan Inventaris';
    $data['x4'] = 'Menambahkan Data lapangan Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/lapangan/vtambahlapangan', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahlapangan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_lapangan', 'Nama lapangan', 'required');
    //  $this->form_validation->set_rules('username_lapangan', 'Username lapangan', 'required');
    // $this->form_validation->set_rules('password_lapangan', 'Password lapangan', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/lapangan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_lapangan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_lapangan')) {
    //   $image = $this->upload->data();
    $data = array(
      'nama_lapangan' => $this->input->post('nama_lapangan'),
      'kd_lapangan' => $this->input->post('kd_lapangan'),




      // 'ket_lapangan' => $this->input->post('ket_lapangan'),
      // 'foto_lapangan' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_lapangan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/lapangan/'));
  }

  // else {
  //
  //  $this->load->view('lapangan/temp/v_header');
  // $this->load->view('lapangan/temp/v_atas');
  // $this->load->view('lapangan/temp/v_sidebar');
  // $this->load->view('lapangan/master/lapangan/v_lapangan');
  // $this->load->view('lapangan/temp/v_footer');
  // }
  // }
  function hapuslapangan()
  {
    $where = array('kd_lapangan' => $this->input->post('kd_lapangan'));
    $this->Mglobal->hapusdata($where, 'tbl_lapangan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/lapangan/'));
  }
  function editlapangan($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'lapangan';
    $data['x3'] = 'Edit lapangan Inventaris';
    $data['x4'] = 'Mengedit Data lapangan Inventaris Sahabat Optik';
    $where = array('kd_lapangan' => $id);
    $data['lapangan'] = $this->Mglobal->tampilkandatasingle('tbl_lapangan', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/lapangan/veditlapangan', $data);
    $this->load->view('adm/footer');
  }
  function aksieditlapangan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_lapangan', 'Nama lapangan', 'required');
    //  $this->form_validation->set_rules('username_lapangan', 'Username lapangan', 'required');
    //   $this->form_validation->set_rules('password_lapangan', 'Password lapangan', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/lapangan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_lapangan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_lapangan')) {
    // $image = $this->upload->data();
    $where = array('kd_lapangan' => $this->input->post('kd_lapangan'));
    $data = array(
      'nama_lapangan' => $this->input->post('nama_lapangan'),



      // 'ket_lapangan' => $this->input->post('ket_lapangan'),
      // 'foto_lapangan' => $image['file_name'],
      //  'password_lapangan'=>md5($this->input->post('password_lapangan'))
    );
    $this->Mglobal->editdata('tbl_lapangan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/lapangan/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/lapangan/vtambahlapangan');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_lapangan' => $this->input->post('kd_lapangan'));
    //   $data = array(
    //     'nama_lapangan' => $this->input->post('nama_lapangan'),
    //     //'foto_lapangan' => $image['file_name'],
    //     //  'password_lapangan'=>md5($this->input->post('password_lapangan'))
    //   );
    //   $this->Mglobal->editdata('tbl_lapangan', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/lapangan/'));
    // }
  }
}
