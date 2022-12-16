<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
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

    $data['x1'] = 'Setting SPP';
    $data['x2'] = 'Setting';
    $data['x3'] = 'spp';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    // $data['spp'] = $this->Mglobal->tampilkandata('tbl_spp');
    $data['spp'] = $this->db->query("select * from tbl_spp S, tbl_tahunajaran T, tbl_admin A where S.kd_tahunajaran=T.kd_tahunajaran and S.kd_admin=A.kd_admin")->result();
    $data['tahunajaran'] = $this->Mglobal->tampilkandata('tbl_tahunajaran');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_spp');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahspp()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'spp';
    $data['x3'] = 'Tambah spp Inventaris';
    $data['x4'] = 'Menambahkan Data spp Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/spp/vtambahspp', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahspp()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_spp', 'Nama spp', 'required');
    //  $this->form_validation->set_rules('username_spp', 'Username spp', 'required');
    // $this->form_validation->set_rules('password_spp', 'Password spp', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/spp/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_spp_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_spp')) {
    //   $image = $this->upload->data();
    $data = array(
      'kd_tahunajaran' => $this->input->post('kd_tahunajaran'),
      'kd_spp' => $this->input->post('kd_spp'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'cd_spp' => date('Y-m-d'),
      'status_spp' => $this->input->post('status_spp'),
      'bulan_spp' => $this->input->post('bulan_spp'),

      // 'foto_spp' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_spp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/pengaturan/spp/'));
  }

  // else {
  //
  //  $this->load->view('spp/temp/v_header');
  // $this->load->view('spp/temp/v_atas');
  // $this->load->view('spp/temp/v_sidebar');
  // $this->load->view('spp/master/spp/v_spp');
  // $this->load->view('spp/temp/v_footer');
  // }
  // }
  function hapusspp()
  {
    $where = array('kd_spp' => $this->input->post('kd_spp'));
    $this->Mglobal->hapusdata($where, 'tbl_spp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/spp/'));
  }
  function inputspp()
  {
    // $where = array('kd_spp' => $this->input->post('kd_spp'));
    $kd_spp = $this->input->post('kd_spp');
    $bulan = $this->input->post('bulan_spp');
    $besar_spp = $this->input->post('besar_spp');
    $kd_admin = $this->session->userdata('kd_admin');
    // $this->Mglobal->hapusdata($where, 'tbl_spp');
    $this->db->query("INSERT INTO  tbl_sppdetail (kd_siswa, kd_spp, bulan, besar_spp,kd_admin)
    SELECT tbl_siswa.kd_siswa, '$kd_spp','$bulan','$besar_spp','$kd_admin' from tbl_siswa");
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/spp/'));
  }
  function editspp($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'spp';
    $data['x3'] = 'Edit spp Inventaris';
    $data['x4'] = 'Mengedit Data spp Inventaris Sahabat Optik';
    $where = array('kd_spp' => $id);
    $data['spp'] = $this->Mglobal->tampilkandatasingle('tbl_spp', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/spp/veditspp', $data);
    $this->load->view('adm/footer');
  }
  function aksieditspp()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_spp', 'Nama spp', 'required');
    //  $this->form_validation->set_rules('username_spp', 'Username spp', 'required');
    //   $this->form_validation->set_rules('password_spp', 'Password spp', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/spp/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_spp_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_spp')) {
    // $image = $this->upload->data();
    $where = array('kd_spp' => $this->input->post('kd_spp'));
    $data = array(
      'kd_tahunajaran' => $this->input->post('kd_tahunajaran'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      // 'cd_spp' => date('Y-m-d'),
      'status_spp' => $this->input->post('status_spp'),
      'bulan_spp' => $this->input->post('bulan_spp'),

      // 'foto_spp' => $image['file_name'],
      //  'password_spp'=>md5($this->input->post('password_spp'))
    );
    $this->Mglobal->editdata('tbl_spp', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/spp/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/spp/vtambahspp');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_spp' => $this->input->post('kd_spp'));
    //   $data = array(
    //     'nama_spp' => $this->input->post('nama_spp'),
    //     //'foto_spp' => $image['file_name'],
    //     //  'password_spp'=>md5($this->input->post('password_spp'))
    //   );
    //   $this->Mglobal->editdata('tbl_spp', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/spp/'));
    // }
  }
}
