<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadirihrd extends CI_Controller
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
    $data['x1'] = 'Data Diri';
    $data['x2'] = 'Pengaturan';
    $data['x3'] = 'Data Diri';
    // $data['x4']='Data Admin Sahabat Optik';
    $kd_hrd = $this->session->userdata('kd_hrd');
    // $where = array('kd_santri' => $kd_santri);
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['hrd'] = $this->db->query("select * from tbl_hrd where kd_hrd='$kd_hrd'")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/pengaturan/v_datadirihrd');
    $this->load->view('admin/temp/v_footer');
  }


  function aksieditdatadiri()
  {
    $where = array('kd_hrd' => $this->session->userdata('kd_hrd'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_hrd')) {
      $image = $this->upload->data();
      $data = array(
        'nama_hrd' => $this->input->post('nama_hrd'),
        'nohp_hrd' => $this->input->post('nohp_hrd'),
        'alamat_hrd' => $this->input->post('alamat_hrd'),
        'gambar_hrd' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_hrd', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/datadirihrd'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/admin/vtambahadmin');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'nama_hrd' => $this->input->post('nama_hrd'),
        'nohp_hrd' => $this->input->post('nohp_hrd'),
        'alamat_hrd' => $this->input->post('alamat_hrd'),

        // 'gambar_admin' => $image['file_name'],
        //  'password_admin'=>md5($this->input->post('password_admin'))
      );
      $this->Mglobal->editdata('tbl_hrd', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/pengaturan/datadirihrd/'));
    }
  }
}
