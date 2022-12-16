<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
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
    $data['x1'] = 'Data jabatan';
    $data['x2'] = 'Master';
    $data['x3'] = 'Jabatan';
    $data['x4'] = 'Data Jabatan ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['jabatan'] = $this->Mglobal->tampilkandata('tbl_jabatan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_jabatan');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahjabatan()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'jabatan';
    $data['x3'] = 'Tambah jabatan Inventaris';
    $data['x4'] = 'Menambahkan Data jabatan Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/jabatan/vtambahjabatan', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahjabatan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');
    //  $this->form_validation->set_rules('username_jabatan', 'Username jabatan', 'required');
    // $this->form_validation->set_rules('password_jabatan', 'Password jabatan', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/jabatan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jabatan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jabatan')) {
    //   $image = $this->upload->data();
    $data = array(
      'nama_jabatan' => $this->input->post('nama_jabatan'),
      'kd_jabatan' => $this->input->post('kd_jabatan'),
      'gaji_pokok' => $this->input->post('gaji_pokok'),
      'uang_makan' => $this->input->post('uang_makan'),


      // 'ket_jabatan' => $this->input->post('ket_jabatan'),
      // 'foto_jabatan' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_jabatan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/jabatan/'));
  }

  // else {
  //
  //  $this->load->view('jabatan/temp/v_header');
  // $this->load->view('jabatan/temp/v_atas');
  // $this->load->view('jabatan/temp/v_sidebar');
  // $this->load->view('jabatan/master/jabatan/v_jabatan');
  // $this->load->view('jabatan/temp/v_footer');
  // }
  // }
  function hapusjabatan()
  {
    $where = array('kd_jabatan' => $this->input->post('kd_jabatan'));
    $this->Mglobal->hapusdata($where, 'tbl_jabatan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jabatan/'));
  }
  function editjabatan($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'jabatan';
    $data['x3'] = 'Edit jabatan Inventaris';
    $data['x4'] = 'Mengedit Data jabatan Inventaris Sahabat Optik';
    $where = array('kd_jabatan' => $id);
    $data['jabatan'] = $this->Mglobal->tampilkandatasingle('tbl_jabatan', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/jabatan/veditjabatan', $data);
    $this->load->view('adm/footer');
  }
  function aksieditjabatan()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');
    //  $this->form_validation->set_rules('username_jabatan', 'Username jabatan', 'required');
    //   $this->form_validation->set_rules('password_jabatan', 'Password jabatan', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/jabatan/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jabatan_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jabatan')) {
    // $image = $this->upload->data();
    $where = array('kd_jabatan' => $this->input->post('kd_jabatan'));
    $data = array(
      'nama_jabatan' => $this->input->post('nama_jabatan'),
      'gaji_pokok' => $this->input->post('gaji_pokok'),
      'uang_makan' => $this->input->post('uang_makan'),

      // 'ket_jabatan' => $this->input->post('ket_jabatan'),
      // 'foto_jabatan' => $image['file_name'],
      //  'password_jabatan'=>md5($this->input->post('password_jabatan'))
    );
    $this->Mglobal->editdata('tbl_jabatan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jabatan/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/jabatan/vtambahjabatan');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_jabatan' => $this->input->post('kd_jabatan'));
    //   $data = array(
    //     'nama_jabatan' => $this->input->post('nama_jabatan'),
    //     //'foto_jabatan' => $image['file_name'],
    //     //  'password_jabatan'=>md5($this->input->post('password_jabatan'))
    //   );
    //   $this->Mglobal->editdata('tbl_jabatan', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/jabatan/'));
    // }
  }
}
