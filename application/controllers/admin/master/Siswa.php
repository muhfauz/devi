<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
    $data['x1'] = 'Data Siswa';
    $data['x2'] = 'Master';
    $data['x3'] = 'Siswa';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['tingkat'] = $this->Mglobal->tampilkandata('tbl_tingkat');
    $data['kelas'] = $this->Mglobal->tampilkandata('tbl_kelas');
    $data['tahunmasuk'] = $this->Mglobal->tampilkandata('tbl_tahunmasuk');
    $data['siswa'] = $this->db->query("select * from tbl_siswa S, tbl_kelas K, tbl_tingkat T, tbl_tahunmasuk TM where S.kd_kelas=K.kd_kelas and S.kd_tingkat=T.kd_tingkat and S.kd_tahunmasuk=TM.kd_tahunmasuk")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_siswa');
    $this->load->view('admin/temp/v_footer');
  }
  function tambahsiswa()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'siswa';
    $data['x3'] = 'Tambah siswa Inventaris';
    $data['x4'] = 'Menambahkan Data siswa Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/siswa/vtambahsiswa', $data);
    $this->load->view('adm/footer');
  }
  function aksitambahsiswa()
  {
    $config['upload_path'] = '.assets/img/fotosiswa/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = $this->input->post('kd_siswa') . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_siswa')) {
      $image = $this->upload->data();
      $data = array(
        'kd_siswa' => $this->input->post('kd_siswa'),
        'nama_siswa' => $this->input->post('nama_siswa'),
        'nis' => $this->input->post('nis'),
        'nisn' => $this->input->post('nisn'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'nohp_ayah' => $this->input->post('nohp_ayah'),
        'alamat_siswa' => $this->input->post('alamat_siswa'),
        'kd_tingkat' => $this->input->post('kd_tingkat'),
        'kd_kelas' => $this->input->post('kd_kelas'),
        'kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'),
        'gambar_siswa' => $image['file_name'],
        'cd_siswa' => date('Y-m-d'),
        'kd_admin' => $this->session->userdata('kd_admin'),

      );
      $this->Mglobal->tambahdata($data, 'tbl_siswa');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/siswa/'));
    } else {
      $data = array(
        'kd_siswa' => $this->input->post('kd_siswa'),
        'nama_siswa' => $this->input->post('nama_siswa'),
        'nis' => $this->input->post('nis'),
        'nisn' => $this->input->post('nisn'),
        'alamat_siswa' => $this->input->post('alamat_siswa'),
        'kd_tingkat' => $this->input->post('kd_tingkat'),
        'kd_kelas' => $this->input->post('kd_kelas'),
        'kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'),
        'gambar_siswa' => 'siswa.png',
        'cd_siswa' => date('Y-m-d'),
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      $this->Mglobal->tambahdata($data, 'tbl_siswa');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/siswa/'));
    }
  }

  function hapussiswa()
  {
    $where = array('kd_siswa' => $this->input->post('kd_siswa'));
    $this->Mglobal->hapusdata($where, 'tbl_siswa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/siswa/'));
  }
  function editsiswa($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'siswa';
    $data['x3'] = 'Edit siswa Inventaris';
    $data['x4'] = 'Mengedit Data siswa Inventaris Sahabat Optik';
    $where = array('kd_siswa' => $id);
    $data['siswa'] = $this->Mglobal->tampilkandatasingle('tbl_siswa', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/siswa/veditsiswa', $data);
    $this->load->view('adm/footer');
  }
  function aksieditsiswa()
  {
    $where = array('kd_siswa' => $this->input->post('kd_siswa'));
    $config['upload_path'] = './gambar/';
    $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
    $config['max_size'] = '20480000';
    $config['file_name'] = 'adm_' . time();
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar_siswa')) {
      $image = $this->upload->data();
      $data = array(
        'nama_siswa' => $this->input->post('nama_siswa'),
        'nis' => $this->input->post('nis'),
        'nisn' => $this->input->post('nisn'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'nohp_ayah' => $this->input->post('nohp_ayah'),
        'alamat_siswa' => $this->input->post('alamat_siswa'),
        'kd_tingkat' => $this->input->post('kd_tingkat'),
        'kd_kelas' => $this->input->post('kd_kelas'),
        'kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'),
        'gambar_siswa' => $image['file_name'],
        'ed_siswa' => date('Y-m-d'),
        'kd_admin' => $this->session->userdata('kd_admin'),
        //  'password_siswa'=>md5($this->input->post('password_siswa'))
      );
      $this->Mglobal->editdata('tbl_siswa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/siswa/'));
      //  }
      //  else {

      //    $this->load->view('adm/header');
      //    $this->load->view('adm/sidebar');
      //    $this->load->view('adm/master/siswa/vtambahsiswa');
      //    $this->load->view('adm/footer');
      //  }
    } else {
      $data = array(
        'nama_siswa' => $this->input->post('nama_siswa'),
        'nis' => $this->input->post('nis'),
        'nisn' => $this->input->post('nisn'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'nohp_ayah' => $this->input->post('nohp_ayah'),
        'alamat_siswa' => $this->input->post('alamat_siswa'),
        'kd_tingkat' => $this->input->post('kd_tingkat'),
        'kd_kelas' => $this->input->post('kd_kelas'),
        'kd_tahunmasuk' => $this->input->post('kd_tahunmasuk'),
        'ed_siswa' => date('Y-m-d'),
        'kd_admin' => $this->session->userdata('kd_admin'),
      );
      $this->Mglobal->editdata('tbl_siswa', $where, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url('admin/master/siswa/'));
    }
  }
}
