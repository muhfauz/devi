<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
    $data['x1'] = 'Data Kelas';
    $data['x2'] = 'Master';
    $data['x3'] = 'Kelas';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['kelas'] = $this->Mglobal->tampilkandata('tbl_kelas');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_kelas');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahkelas()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'kelas';
    $data['x3'] = 'Tambah kelas Inventaris';
    $data['x4'] = 'Menambahkan Data kelas Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/kelas/vtambahkelas', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahkelas()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required');
    //  $this->form_validation->set_rules('username_kelas', 'Username kelas', 'required');
    // $this->form_validation->set_rules('password_kelas', 'Password kelas', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/kelas/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kelas_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kelas')) {
    //   $image = $this->upload->data();
    $data = array(
      'kelas' => $this->input->post('kelas'),
      'kd_kelas' => $this->input->post('kd_kelas'),

      // 'foto_kelas' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_kelas');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/kelas/'));
  }

  // else {
  //
  //  $this->load->view('kelas/temp/v_header');
  // $this->load->view('kelas/temp/v_atas');
  // $this->load->view('kelas/temp/v_sidebar');
  // $this->load->view('kelas/master/kelas/v_kelas');
  // $this->load->view('kelas/temp/v_footer');
  // }
  // }
  function hapuskelas()
  {
    $where = array('kd_kelas' => $this->input->post('kd_kelas'));
    $this->Mglobal->hapusdata($where, 'tbl_kelas');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/kelas/'));
  }
  function editkelas($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'kelas';
    $data['x3'] = 'Edit kelas Inventaris';
    $data['x4'] = 'Mengedit Data kelas Inventaris Sahabat Optik';
    $where = array('kd_kelas' => $id);
    $data['kelas'] = $this->Mglobal->tampilkandatasingle('tbl_kelas', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/kelas/veditkelas', $data);
    $this->load->view('adm/footer');
  }
  function aksieditkelas()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required');
    //  $this->form_validation->set_rules('username_kelas', 'Username kelas', 'required');
    //   $this->form_validation->set_rules('password_kelas', 'Password kelas', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/kelas/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kelas_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kelas')) {
    // $image = $this->upload->data();
    $where = array('kd_kelas' => $this->input->post('kd_kelas'));
    $data = array(
      'kelas' => $this->input->post('kelas'),

      // 'foto_kelas' => $image['file_name'],
      //  'password_kelas'=>md5($this->input->post('password_kelas'))
    );
    $this->Mglobal->editdata('tbl_kelas', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/kelas/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/kelas/vtambahkelas');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_kelas' => $this->input->post('kd_kelas'));
    //   $data = array(
    //     'nama_kelas' => $this->input->post('nama_kelas'),
    //     //'foto_kelas' => $image['file_name'],
    //     //  'password_kelas'=>md5($this->input->post('password_kelas'))
    //   );
    //   $this->Mglobal->editdata('tbl_kelas', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/kelas/'));
    // }
  }
}
