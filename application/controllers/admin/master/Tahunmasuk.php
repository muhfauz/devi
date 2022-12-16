<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunmasuk extends CI_Controller
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
    $data['x1'] = 'Data Tahun Masuk dan Uang Gedung';
    $data['x2'] = 'Master';
    $data['x3'] = 'Tahun Masuk';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tahunmasuk'] = $this->Mglobal->tampilkandata('tbl_tahunmasuk');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_tahunmasuk');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtahunmasuk()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tahunmasuk';
    $data['x3'] = 'Tambah tahunmasuk Inventaris';
    $data['x4'] = 'Menambahkan Data tahunmasuk Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tahunmasuk/vtambahtahunmasuk', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahtahunmasuk()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tahunmasuk', 'Nama tahunmasuk', 'required');
    //  $this->form_validation->set_rules('username_tahunmasuk', 'Username tahunmasuk', 'required');
    // $this->form_validation->set_rules('password_tahunmasuk', 'Password tahunmasuk', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/tahunmasuk/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tahunmasuk_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tahunmasuk')) {
    //   $image = $this->upload->data();
    $data = array(
      'tahun_masuk' => $this->input->post('tahun_masuk'),
      'kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'),
      // 'gedung1' => $this->input->post('gedung1'),
      // 'gedung2' => $this->input->post('gedung2'),
      // 'gedung3' => $this->input->post('gedung3'),
      // 'foto_tahunmasuk' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_tahunmasuk');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/tahunmasuk/'));
  }

  // else {
  //
  //  $this->load->view('tahunmasuk/temp/v_header');
  // $this->load->view('tahunmasuk/temp/v_atas');
  // $this->load->view('tahunmasuk/temp/v_sidebar');
  // $this->load->view('tahunmasuk/master/tahunmasuk/v_tahunmasuk');
  // $this->load->view('tahunmasuk/temp/v_footer');
  // }
  // }
  function hapustahunmasuk()
  {
    $where = array('kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'));
    $this->Mglobal->hapusdata($where, 'tbl_tahunmasuk');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tahunmasuk/'));
  }
  function edittahunmasuk($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tahunmasuk';
    $data['x3'] = 'Edit tahunmasuk Inventaris';
    $data['x4'] = 'Mengedit Data tahunmasuk Inventaris Sahabat Optik';
    $where = array('kd_tahunmasuk' => $id);
    $data['tahunmasuk'] = $this->Mglobal->tampilkandatasingle('tbl_tahunmasuk', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tahunmasuk/vedittahunmasuk', $data);
    $this->load->view('adm/footer');
  }
  function aksiedittahunmasuk()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tahunmasuk', 'Nama tahunmasuk', 'required');
    //  $this->form_validation->set_rules('username_tahunmasuk', 'Username tahunmasuk', 'required');
    //   $this->form_validation->set_rules('password_tahunmasuk', 'Password tahunmasuk', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/tahunmasuk/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tahunmasuk_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tahunmasuk')) {
    // $image = $this->upload->data();
    $where = array('kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'));
    $data = array(
      'tahun_masuk' => $this->input->post('tahun_masuk'),
      // 'gedung1' => $this->input->post('gedung1'),
      // 'gedung2' => $this->input->post('gedung2'),
      // 'gedung3' => $this->input->post('gedung3'),
      // 'foto_tahunmasuk' => $image['file_name'],
      //  'password_tahunmasuk'=>md5($this->input->post('password_tahunmasuk'))
    );
    $this->Mglobal->editdata('tbl_tahunmasuk', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tahunmasuk/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/tahunmasuk/vtambahtahunmasuk');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'));
    //   $data = array(
    //     'nama_tahunmasuk' => $this->input->post('nama_tahunmasuk'),
    //     //'foto_tahunmasuk' => $image['file_name'],
    //     //  'password_tahunmasuk'=>md5($this->input->post('password_tahunmasuk'))
    //   );
    //   $this->Mglobal->editdata('tbl_tahunmasuk', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/tahunmasuk/'));
    // }
  }
}
