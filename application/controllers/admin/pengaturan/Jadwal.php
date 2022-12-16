<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
    $data['x1'] = 'Pengaturan Jadwal';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Pengaturan Jadwal';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    // $data['x4']='Data Admin Sahabat Optik';

    $data['pendaftaran'] = $this->Mglobal->tampilkandata('tbl_pendaftaran');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_jadwal');
    $this->load->view('admin/temp/v_footer');
  }

  function aksieditjadwal()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
    //   $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
    //  if($this->form_validation->run()!=false)
    //  {
    $where = array('kd_pendaftaran' => $this->input->post('kd_pendaftaran'));
    $data = array(
      'nama_pendaftaran' => $this->input->post('nama_pendaftaran'),
      'tgl_pendaftaran' => $this->input->post('tgl_pendaftaran'),
      'tgl_seleksi' => $this->input->post('tgl_seleksi'),
      'tgl_pengumuman' => $this->input->post('tgl_pengumuman'),
      'tgl_penutupan' => $this->input->post('tgl_penutupan'),
      'besar_biaya' => $this->input->post('besar_biaya'),
      'status_pendaftaran' => $this->input->post('status_pendaftaran'),

      //  'password_admin'=>md5($this->input->post('password_admin'))
    );
    $this->Mglobal->editdata('tbl_pendaftaran', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/pengaturan/jadwal/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/admin/vtambahadmin');
    //    $this->load->view('adm/footer');
    //  }
  }
}
