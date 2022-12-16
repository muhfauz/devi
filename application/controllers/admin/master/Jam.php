<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
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
    $data['x1'] = 'Data jam';
    $data['x2'] = 'Master';
    $data['x3'] = 'Jam';
    // $data['x4']='Data jam Sahabat Optik';
    $data['jam'] = $this->Mglobal->tampilkandata('tbl_jam');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_jam');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahjam()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'jam';
    $data['x3'] = 'Tambah jam Inventaris';
    $data['x4'] = 'Menambahkan Data jam Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/jam/vtambahjam', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahjam()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('jam', 'Nama jam', 'required');
    //  $this->form_validation->set_rules('username_jam', 'Username jam', 'required');
    // $this->form_validation->set_rules('password_jam', 'Password jam', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/jam/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jam_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jam')) {
    //   $image = $this->upload->data();
    $data = array(
      'jam' => $this->input->post('jam'),
      'kd_jam' => $this->input->post('kd_jam'),
      // 'foto_jam' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_jam');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/jam/'));
  }

  // else {
  //
  //  $this->load->view('jam/temp/v_header');
  // $this->load->view('jam/temp/v_atas');
  // $this->load->view('jam/temp/v_sidebar');
  // $this->load->view('jam/master/jam/v_jam');
  // $this->load->view('jam/temp/v_footer');
  // }
  // }
  function hapusjam()
  {
    $where = array('kd_jam' => $this->input->post('kd_jam'));
    $this->Mglobal->hapusdata($where, 'tbl_jam');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jam/'));
  }
  function editjam($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'jam';
    $data['x3'] = 'Edit jam Inventaris';
    $data['x4'] = 'Mengedit Data jam Inventaris Sahabat Optik';
    $where = array('kd_jam' => $id);
    $data['jam'] = $this->Mglobal->tampilkandatasingle('tbl_jam', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/jam/veditjam', $data);
    $this->load->view('adm/footer');
  }
  function aksieditjam()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('jam', 'Nama jam', 'required');
    //  $this->form_validation->set_rules('username_jam', 'Username jam', 'required');
    //   $this->form_validation->set_rules('password_jam', 'Password jam', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/jam/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jam_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jam')) {
    // $image = $this->upload->data();
    $where = array('kd_jam' => $this->input->post('kd_jam'));
    $data = array(
      'jam' => $this->input->post('jam'),
      // 'foto_jam' => $image['file_name'],
      //  'password_jam'=>md5($this->input->post('password_jam'))
    );
    $this->Mglobal->editdata('tbl_jam', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jam/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/jam/vtambahjam');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_jam' => $this->input->post('kd_jam'));
    //   $data = array(
    //     'jam' => $this->input->post('jam'),
    //     //'foto_jam' => $image['file_name'],
    //     //  'password_jam'=>md5($this->input->post('password_jam'))
    //   );
    //   $this->Mglobal->editdata('tbl_jam', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/jam/'));
    // }
  }
}
