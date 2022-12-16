<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
    $data['x1'] = 'Data kategori';
    $data['x2'] = 'Master';
    $data['x3'] = 'Kategori';
    $data['x4'] = 'Data Kategori ' . '| ' . $this->db->query('select nama_perush from tbl_perusahaan')->row()->nama_perush;
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_kategori');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahkategori()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'kategori';
    $data['x3'] = 'Tambah kategori Inventaris';
    $data['x4'] = 'Menambahkan Data kategori Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/kategori/vtambahkategori', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahkategori()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required');
    //  $this->form_validation->set_rules('username_kategori', 'Username kategori', 'required');
    // $this->form_validation->set_rules('password_kategori', 'Password kategori', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/kategori/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kategori_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kategori')) {
    //   $image = $this->upload->data();
    $data = array(
      'nama_kategori' => $this->input->post('nama_kategori'),
      'kd_kategori' => $this->input->post('kd_kategori'),
      'ket_kategori' => $this->input->post('ket_kategori'),
      // 'foto_kategori' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_kategori');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/kategori/'));
  }

  // else {
  //
  //  $this->load->view('kategori/temp/v_header');
  // $this->load->view('kategori/temp/v_atas');
  // $this->load->view('kategori/temp/v_sidebar');
  // $this->load->view('kategori/master/kategori/v_kategori');
  // $this->load->view('kategori/temp/v_footer');
  // }
  // }
  function hapuskategori()
  {
    $where = array('kd_kategori' => $this->input->post('kd_kategori'));
    $this->Mglobal->hapusdata($where, 'tbl_kategori');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/kategori/'));
  }
  function editkategori($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'kategori';
    $data['x3'] = 'Edit kategori Inventaris';
    $data['x4'] = 'Mengedit Data kategori Inventaris Sahabat Optik';
    $where = array('kd_kategori' => $id);
    $data['kategori'] = $this->Mglobal->tampilkandatasingle('tbl_kategori', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/kategori/veditkategori', $data);
    $this->load->view('adm/footer');
  }
  function aksieditkategori()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required');
    //  $this->form_validation->set_rules('username_kategori', 'Username kategori', 'required');
    //   $this->form_validation->set_rules('password_kategori', 'Password kategori', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/kategori/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_kategori_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_kategori')) {
    // $image = $this->upload->data();
    $where = array('kd_kategori' => $this->input->post('kd_kategori'));
    $data = array(
      'nama_kategori' => $this->input->post('nama_kategori'),
      'ket_kategori' => $this->input->post('ket_kategori'),
      // 'foto_kategori' => $image['file_name'],
      //  'password_kategori'=>md5($this->input->post('password_kategori'))
    );
    $this->Mglobal->editdata('tbl_kategori', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/kategori/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/kategori/vtambahkategori');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_kategori' => $this->input->post('kd_kategori'));
    //   $data = array(
    //     'nama_kategori' => $this->input->post('nama_kategori'),
    //     //'foto_kategori' => $image['file_name'],
    //     //  'password_kategori'=>md5($this->input->post('password_kategori'))
    //   );
    //   $this->Mglobal->editdata('tbl_kategori', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/kategori/'));
    // }
  }
}
