<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenismobil extends CI_Controller
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
    $data['x1'] = 'Data Jenis Mobil';
    $data['x2'] = 'Master';
    $data['x3'] = 'Jenis Mobil';
    $data['x4'] = 'Data Jenis Mobil ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['jenismobil'] = $this->Mglobal->tampilkandata('tbl_jenismobil');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_jenismobil');
    $this->load->view('admin/temp/v_footer');
  }

  function aksitambahjenismobil()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_jenismobil', 'Nama jenismobil', 'required');
    //  $this->form_validation->set_rules('username_jenismobil', 'Username jenismobil', 'required');
    // $this->form_validation->set_rules('password_jenismobil', 'Password jenismobil', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/jenismobil/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jenismobil_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jenismobil')) {
    //   $image = $this->upload->data();
    $data = array(
      'kd_jenismobil' => $this->input->post('kd_jenismobil'),
      'nama_jenismobil' => $this->input->post('nama_jenismobil'),
      'komisisales_jenismobil' => $this->input->post('komisisales_jenismobil'),
      'komisikc_jenismobil' => $this->input->post('komisikc_jenismobil'),
      'komisiadmin_jenismobil' => $this->input->post('komisiadmin_jenismobil'),
      'komisisupervisor_jenismobil' => $this->input->post('komisisupervisor_jenismobil'),
      // 'ket_jenismobil' => $this->input->post('ket_jenismobil'),
      // 'foto_jenismobil' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_jenismobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/jenismobil/'));
  }

  // else {
  //
  //  $this->load->view('jenismobil/temp/v_header');
  // $this->load->view('jenismobil/temp/v_atas');
  // $this->load->view('jenismobil/temp/v_sidebar');
  // $this->load->view('jenismobil/master/jenismobil/v_jenismobil');
  // $this->load->view('jenismobil/temp/v_footer');
  // }
  // }
  function hapusjenismobil()
  {
    $where = array('kd_jenismobil' => $this->input->post('kd_jenismobil'));
    $this->Mglobal->hapusdata($where, 'tbl_jenismobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jenismobil/'));
  }

  function aksieditjenismobil()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_jenismobil', 'Nama jenismobil', 'required');
    //  $this->form_validation->set_rules('username_jenismobil', 'Username jenismobil', 'required');
    //   $this->form_validation->set_rules('password_jenismobil', 'Password jenismobil', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/jenismobil/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_jenismobil_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_jenismobil')) {
    // $image = $this->upload->data();
    $where = array('kd_jenismobil' => $this->input->post('kd_jenismobil'));
    $data = array(
      'nama_jenismobil' => $this->input->post('nama_jenismobil'),
      'komisisales_jenismobil' => $this->input->post('komisisales_jenismobil'),
      'komisikc_jenismobil' => $this->input->post('komisikc_jenismobil'),
      'komisiadmin_jenismobil' => $this->input->post('komisiadmin_jenismobil'),
      'komisisupervisor_jenismobil' => $this->input->post('komisisupervisor_jenismobil'),

    );
    $this->Mglobal->editdata('tbl_jenismobil', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/jenismobil/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/jenismobil/vtambahjenismobil');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_jenismobil' => $this->input->post('kd_jenismobil'));
    //   $data = array(
    //     'nama_jenismobil' => $this->input->post('nama_jenismobil'),
    //     //'foto_jenismobil' => $image['file_name'],
    //     //  'password_jenismobil'=>md5($this->input->post('password_jenismobil'))
    //   );
    //   $this->Mglobal->editdata('tbl_jenismobil', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/jenismobil/'));
    // }
  }
}
