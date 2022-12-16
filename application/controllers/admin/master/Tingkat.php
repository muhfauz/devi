<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tingkat extends CI_Controller
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
    $data['x1'] = 'Data Tingkat';
    $data['x2'] = 'Master';
    $data['x3'] = 'Tingkat';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tingkat'] = $this->Mglobal->tampilkandata('tbl_tingkat');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_tingkat');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtingkat()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tingkat';
    $data['x3'] = 'Tambah tingkat Inventaris';
    $data['x4'] = 'Menambahkan Data tingkat Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tingkat/vtambahtingkat', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahtingkat()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tingkat', 'Nama tingkat', 'required');
    //  $this->form_validation->set_rules('username_tingkat', 'Username tingkat', 'required');
    // $this->form_validation->set_rules('password_tingkat', 'Password tingkat', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/tingkat/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tingkat_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tingkat')) {
    //   $image = $this->upload->data();
    $data = array(
      'tingkat' => $this->input->post('tingkat'),
      'kd_tingkat' => $this->input->post('kd_tingkat'),

      // 'foto_tingkat' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_tingkat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/tingkat/'));
  }

  // else {
  //
  //  $this->load->view('tingkat/temp/v_header');
  // $this->load->view('tingkat/temp/v_atas');
  // $this->load->view('tingkat/temp/v_sidebar');
  // $this->load->view('tingkat/master/tingkat/v_tingkat');
  // $this->load->view('tingkat/temp/v_footer');
  // }
  // }
  function hapustingkat()
  {
    $where = array('kd_tingkat' => $this->input->post('kd_tingkat'));
    $this->Mglobal->hapusdata($where, 'tbl_tingkat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tingkat/'));
  }
  function edittingkat($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tingkat';
    $data['x3'] = 'Edit tingkat Inventaris';
    $data['x4'] = 'Mengedit Data tingkat Inventaris Sahabat Optik';
    $where = array('kd_tingkat' => $id);
    $data['tingkat'] = $this->Mglobal->tampilkandatasingle('tbl_tingkat', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tingkat/vedittingkat', $data);
    $this->load->view('adm/footer');
  }
  function aksiedittingkat()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tingkat', 'Nama tingkat', 'required');
    //  $this->form_validation->set_rules('username_tingkat', 'Username tingkat', 'required');
    //   $this->form_validation->set_rules('password_tingkat', 'Password tingkat', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/tingkat/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tingkat_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tingkat')) {
    // $image = $this->upload->data();
    $where = array('kd_tingkat' => $this->input->post('kd_tingkat'));
    $data = array(
      'tingkat' => $this->input->post('tingkat'),

      // 'foto_tingkat' => $image['file_name'],
      //  'password_tingkat'=>md5($this->input->post('password_tingkat'))
    );
    $this->Mglobal->editdata('tbl_tingkat', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tingkat/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/tingkat/vtambahtingkat');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_tingkat' => $this->input->post('kd_tingkat'));
    //   $data = array(
    //     'nama_tingkat' => $this->input->post('nama_tingkat'),
    //     //'foto_tingkat' => $image['file_name'],
    //     //  'password_tingkat'=>md5($this->input->post('password_tingkat'))
    //   );
    //   $this->Mglobal->editdata('tbl_tingkat', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/tingkat/'));
    // }
  }
}
