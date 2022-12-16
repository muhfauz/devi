<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunajaran extends CI_Controller
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
    $data['x1'] = 'Data Tahun Ajaran dan Pembayaran';
    $data['x2'] = 'Master';
    $data['x3'] = 'Tahun Ajaran';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tahunajaran'] = $this->Mglobal->tampilkandata('tbl_tahunajaran');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_tahunajaran');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahtahunajaran()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tahunajaran';
    $data['x3'] = 'Tambah tahunajaran Inventaris';
    $data['x4'] = 'Menambahkan Data tahunajaran Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tahunajaran/vtambahtahunajaran', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahtahunajaran()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tahunajaran', 'Nama tahunajaran', 'required');
    //  $this->form_validation->set_rules('username_tahunajaran', 'Username tahunajaran', 'required');
    // $this->form_validation->set_rules('password_tahunajaran', 'Password tahunajaran', 'required');
    // if($this->form_validation->run()!=false)
    // {
    // $config['upload_path'] = './assets/toko/images/tahunajaran/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tahunajaran_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tahunajaran')) {
    //   $image = $this->upload->data();
    $this->db->query("UPDATE tbl_tahunajaran SET status_tahunajaran = 'nonaktif'");
    $data = array(
      'tahun_ajaran' => $this->input->post('tahun_ajaran'),
      'kd_tahunajaran' => $this->input->post('kd_tahunajaran'),
      'spp' => $this->input->post('spp'),
      // 'pts1' => $this->input->post('pts1'),
      // 'pts2' => $this->input->post('pts2'),
      // 'pas1' => $this->input->post('pas1'),
      // 'pas2' => $this->input->post('pas2'),
      // 'pramuka' => $this->input->post('pramuka'),
      // 'uam' => $this->input->post('uam'),
      'status_tahunajaran' => 'aktif',
      // 'foto_tahunajaran' => $image['file_name'],
    );
    $this->Mglobal->tambahdata($data, 'tbl_tahunajaran');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/tahunajaran/'));
  }

  // else {
  //
  //  $this->load->view('tahunajaran/temp/v_header');
  // $this->load->view('tahunajaran/temp/v_atas');
  // $this->load->view('tahunajaran/temp/v_sidebar');
  // $this->load->view('tahunajaran/master/tahunajaran/v_tahunajaran');
  // $this->load->view('tahunajaran/temp/v_footer');
  // }
  // }
  function hapustahunajaran()
  {
    $where = array('kd_tahunajaran' => $this->input->post('kd_tahunajaran'));
    $this->Mglobal->hapusdata($where, 'tbl_tahunajaran');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tahunajaran/'));
  }
  function edittahunajaran($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'tahunajaran';
    $data['x3'] = 'Edit tahunajaran Inventaris';
    $data['x4'] = 'Mengedit Data tahunajaran Inventaris Sahabat Optik';
    $where = array('kd_tahunajaran' => $id);
    $data['tahunajaran'] = $this->Mglobal->tampilkandatasingle('tbl_tahunajaran', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/tahunajaran/vedittahunajaran', $data);
    $this->load->view('adm/footer');
  }
  function aksiedittahunajaran()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_tahunajaran', 'Nama tahunajaran', 'required');
    //  $this->form_validation->set_rules('username_tahunajaran', 'Username tahunajaran', 'required');
    //   $this->form_validation->set_rules('password_tahunajaran', 'Password tahunajaran', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    // $config['upload_path'] = './assets/toko/images/tahunajaran/';
    // $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
    // $config['max_size'] = '2048';
    // $config['file_name'] = 'foto_tahunajaran_' . time();
    // $this->load->library('upload', $config);
    // if ($this->upload->do_upload('foto_tahunajaran')) {
    // $image = $this->upload->data();
    $this->db->query("UPDATE tbl_tahunajaran SET status_tahunajaran = 'nonaktif'");
    $where = array('kd_tahunajaran' => $this->input->post('kd_tahunajaran'));
    $data = array(
      'tahun_ajaran' => $this->input->post('tahun_ajaran'),
      'spp' => $this->input->post('spp'),
      // 'pts1' => $this->input->post('pts1'),
      // 'pts2' => $this->input->post('pts2'),
      // 'pas1' => $this->input->post('pas1'),
      // 'pas2' => $this->input->post('pas2'),
      // 'pramuka' => $this->input->post('pramuka'),
      // 'uam' => $this->input->post('uam'),
      'status_tahunajaran' => 'aktif',
      // 'foto_tahunajaran' => $image['file_name'],
      //  'password_tahunajaran'=>md5($this->input->post('password_tahunajaran'))
    );
    $this->Mglobal->editdata('tbl_tahunajaran', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/tahunajaran/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/tahunajaran/vtambahtahunajaran');
    //    $this->load->view('adm/footer');
    //  }
    // } else {
    //   $where = array('kd_tahunajaran' => $this->input->post('kd_tahunajaran'));
    //   $data = array(
    //     'nama_tahunajaran' => $this->input->post('nama_tahunajaran'),
    //     //'foto_tahunajaran' => $image['file_name'],
    //     //  'password_tahunajaran'=>md5($this->input->post('password_tahunajaran'))
    //   );
    //   $this->Mglobal->editdata('tbl_tahunajaran', $where, $data);
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //   redirect(base_url('admin/master/tahunajaran/'));
    // }
  }
}
