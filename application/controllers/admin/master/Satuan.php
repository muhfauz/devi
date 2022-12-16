<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
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
    $data['x1'] = 'Data satuan';
    $data['x2'] = 'Master';
    $data['x3'] = 'satuan';
    // $data['x4']='Data satuan Sahabat Optik';
    $data['satuan'] = $this->Mglobal->tampilkandata('tbl_satuan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_satuan');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahsatuan()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'satuan';
    $data['x3'] = 'Tambah satuan Inventaris';
    $data['x4'] = 'Menambahkan Data satuan Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/satuan/vtambahsatuan', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahsatuan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_satuan', 'Nama satuan', 'required');
    //  $this->form_validation->set_rules('username_satuan', 'Username satuan', 'required');
    // $this->form_validation->set_rules('password_satuan', 'Password satuan', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/satuan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_satuan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_satuan')) {
    //   $image = $this->upload->data();
    $data = array(
      'nama_satuan' => $this->input->post('nama_satuan'),
      'kd_satuan' => $this->input->post('kd_satuan'),
      // 'foto_satuan' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_satuan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/satuan/'));
  }

  // else {
  //
  //  $this->load->view('satuan/temp/v_header');
  // $this->load->view('satuan/temp/v_atas');
  // $this->load->view('satuan/temp/v_sidebar');
  // $this->load->view('satuan/master/satuan/v_satuan');
  // $this->load->view('satuan/temp/v_footer');
  // }
  // }
  function hapussatuan()
  {
    $where = array('kd_satuan' => $this->input->post('kd_satuan'));
    $this->Mglobal->hapusdata($where, 'tbl_satuan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/satuan/'));
  }
  function editsatuan($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'satuan';
    $data['x3'] = 'Edit satuan Inventaris';
    $data['x4'] = 'Mengedit Data satuan Inventaris Sahabat Optik';
    $where = array('kd_satuan' => $id);
    $data['satuan'] = $this->Mglobal->tampilkandatasingle('tbl_satuan', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/satuan/veditsatuan', $data);
    $this->load->view('adm/footer');
  }
  function aksieditsatuan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_satuan', 'Nama satuan', 'required');
    //  $this->form_validation->set_rules('username_satuan', 'Username satuan', 'required');
    //   $this->form_validation->set_rules('password_satuan', 'Password satuan', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/satuan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_satuan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_satuan')) {
    // $image = $this->upload->data();
    $where = array('kd_satuan' => $this->input->post('kd_satuan'));
    $data = array(
      'nama_satuan' => $this->input->post('nama_satuan'),
      // 'foto_satuan' => $image['file_name'],
      //  'password_satuan'=>md5($this->input->post('password_satuan'))
    );
    $this->Mglobal->editdata('tbl_satuan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/satuan/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/satuan/vtambahsatuan');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_satuan' => $this->input->post('kd_satuan'));
    //   $data = array(
    //     'nama_satuan' => $this->input->post('nama_satuan'),
    //     //'foto_satuan' => $image['file_name'],
    //     //  'password_satuan'=>md5($this->input->post('password_satuan'))
    //   );
    //   $this->Mglobal->editdata('tbl_satuan', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/satuan/'));
    // }
  }
}
