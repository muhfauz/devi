<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asal extends CI_Controller
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
    $data['x1'] = 'Data Asal';
    $data['x2'] = 'Master';
    $data['x3'] = 'Asal';
    $data['x4'] = 'Data Asal ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['asal'] = $this->Mglobal->tampilkandata('tbl_asal');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_asal');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahasal()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'asal';
    $data['x3'] = 'Tambah asal Inventaris';
    $data['x4'] = 'Menambahkan Data asal Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/asal/vtambahasal', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahasal()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_asal', 'Nama asal', 'required');
    //  $this->form_validation->set_rules('username_asal', 'Username asal', 'required');
    // $this->form_validation->set_rules('password_asal', 'Password asal', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/asal/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_asal_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_asal')) {
    //   $image = $this->upload->data();
    $data = array(
      'nama_asal' => $this->input->post('nama_asal'),
      'kd_asal' => $this->input->post('kd_asal'),
      // 'ket_asal' => $this->input->post('ket_asal'),
      // 'foto_asal' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_asal');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/asal/'));
  }

  // else {
  //
  //  $this->load->view('asal/temp/v_header');
  // $this->load->view('asal/temp/v_atas');
  // $this->load->view('asal/temp/v_sidebar');
  // $this->load->view('asal/master/asal/v_asal');
  // $this->load->view('asal/temp/v_footer');
  // }
  // }
  function hapusasal()
  {
    $where = array('kd_asal' => $this->input->post('kd_asal'));
    $this->Mglobal->hapusdata($where, 'tbl_asal');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/asal/'));
  }
  function editasal($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'asal';
    $data['x3'] = 'Edit asal Inventaris';
    $data['x4'] = 'Mengedit Data asal Inventaris Sahabat Optik';
    $where = array('kd_asal' => $id);
    $data['asal'] = $this->Mglobal->tampilkandatasingle('tbl_asal', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/asal/veditasal', $data);
    $this->load->view('adm/footer');
  }
  function aksieditasal()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_asal', 'Nama asal', 'required');
    //  $this->form_validation->set_rules('username_asal', 'Username asal', 'required');
    //   $this->form_validation->set_rules('password_asal', 'Password asal', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/asal/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_asal_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_asal')) {
    // $image = $this->upload->data();
    $where = array('kd_asal' => $this->input->post('kd_asal'));
    $data = array(
      'nama_asal' => $this->input->post('nama_asal'),
      // 'ket_asal' => $this->input->post('ket_asal'),
      // 'foto_asal' => $image['file_name'],
      //  'password_asal'=>md5($this->input->post('password_asal'))
    );
    $this->Mglobal->editdata('tbl_asal', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/asal/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/asal/vtambahasal');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_asal' => $this->input->post('kd_asal'));
    //   $data = array(
    //     'nama_asal' => $this->input->post('nama_asal'),
    //     //'foto_asal' => $image['file_name'],
    //     //  'password_asal'=>md5($this->input->post('password_asal'))
    //   );
    //   $this->Mglobal->editdata('tbl_asal', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/asal/'));
    // }
  }
}
