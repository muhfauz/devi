<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
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
    $data['x1'] = 'Data Slider';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Slider';
    // $data['x4']='Data slider Sahabat Optik';
    $data['slider'] = $this->Mglobal->tampilkandata('tbl_slider');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_slider');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahslider()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'slider';
    $data['x3'] = 'Tambah slider Inventaris';
    $data['x4'] = 'Menambahkan Data slider Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/slider/vtambahslider', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahslider()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_slider', 'Nama slider', 'required');
    //  $this->form_validation->set_rules('username_slider', 'Username slider', 'required');
    // $this->form_validation->set_rules('password_slider', 'Password slider', 'required');
    // if($this->form_validation->run()!=false)
    // {
    $config['upload_path'] = './assets/depan/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'gambar_slider_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_slider')) {
      $image = $this->upload->data();
      $data = array(
        'atas_slider' => $this->input->post('atas_slider'),
        'tengah_slider' => $this->input->post('tengah_slider'),
        'bawah_slider' => $this->input->post('bawah_slider'),
        'gambar_slider' => $image['file_name'],
      );
      $this->Mglobal->tambahdata($data, 'tbl_slider');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url('admin/pengaturan/slider/'));
    } else {
      echo "Ada kesalahan";
    }
  }

  // else {
  //
  //  $this->load->view('slider/temp/v_header');
  // $this->load->view('slider/temp/v_atas');
  // $this->load->view('slider/temp/v_sidebar');
  // $this->load->view('slider/master/slider/v_slider');
  // $this->load->view('slider/temp/v_footer');
  // }
  // }
  function hapusslider()
  {
    $where = array('kd_slider' => $this->input->post('kd_slider'));
    $this->Mglobal->hapusdata($where, 'tbl_slider');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/slider/'));
  }
  function editslider($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'slider';
    $data['x3'] = 'Edit slider Inventaris';
    $data['x4'] = 'Mengedit Data slider Inventaris Sahabat Optik';
    $where = array('kd_slider' => $id);
    $data['slider'] = $this->Mglobal->tampilkandatasingle('tbl_slider', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/slider/veditslider', $data);
    $this->load->view('adm/footer');
  }
  function aksieditslider()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_slider', 'Nama slider', 'required');
    //  $this->form_validation->set_rules('username_slider', 'Username slider', 'required');
    //   $this->form_validation->set_rules('password_slider', 'Password slider', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $config['upload_path'] = './assets/depan/images/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    $config['max_size'] = '2048';
    $config['file_name'] = 'foto_slider_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_slider')) {
      $image = $this->upload->data();
      $where = array('kd_slider' => $this->input->post('kd_slider'));
      $data = array(
        'atas_slider' => $this->input->post('atas_slider'),
        'tengah_slider' => $this->input->post('tengah_slider'),
        'bawah_slider' => $this->input->post('bawah_slider'),
        'gambar_slider' => $image['file_name'],
        //  'password_slider'=>md5($this->input->post('password_slider'))
      );
      $this->Mglobal->editdata('tbl_slider', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/slider/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/slider/vtambahslider');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $where = array('kd_slider' => $this->input->post('kd_slider'));
      $data = array(
        'atas_slider' => $this->input->post('atas_slider'),
        'tengah_slider' => $this->input->post('tengah_slider'),
        'bawah_slider' => $this->input->post('bawah_slider'),
        // 'gambar_slider' => $image['file_name'],
        //'foto_slider' => $image['file_name'],
        //  'password_slider'=>md5($this->input->post('password_slider'))
      );
      $this->Mglobal->editdata('tbl_slider', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/slider/'));
    }
  }
}
