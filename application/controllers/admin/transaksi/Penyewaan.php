<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
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
    $data['x1'] = 'Data Barang';
    $data['x2'] = 'Master';
    $data['x3'] = 'Barang';
    // $data['x4']='Data barang Sahabat Optik';
    $data['barang'] = $this->Mglobal->tampilkandata('tbl_barang');
    $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/master/v_barang');
    $this->load->view('admin/temp/v_footer');
  }
  function baru()
  {
    $data['x1'] = 'Pilih Data Pelanggan';
    $data['x2'] = 'Master';
    $data['x3'] = 'Pelanggan';
    $data['x4'] = 'Pilih data pelanggan yang akan menyewa';
    // $data['x4']='Data Pelanggan Sahabat Optik';
    $data['pelanggan'] = $this->Mglobal->tampilkandata('tbl_pelanggan');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penyewaan/v_pelanggan');
    $this->load->view('admin/temp/v_footer');
  }
  function tambah()
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'barang';
    $data['x3'] = 'Tambah barang Inventaris';
    $data['x4'] = 'Menambahkan Data barang Inventaris Sahabat Optik';
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/barang/vtambahbarang', $data);
    $this->load->view('adm/footer');
  }
  public function aksitambahbarang()
  {
    // $this->load->library('upload');
    // $dataInfo = array();
    // $files = $_FILES;
    // $cpt = count($_FILES['userfile']['name']);
    // for ($i = 0; $i < $cpt; $i++) {
    //     $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
    //     $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
    //     $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
    //     $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
    //     $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

    //     $this->upload->initialize($this->set_upload_options());
    //     $this->upload->do_upload();
    //     $dataInfo[] = $this->upload->data();
    // }

    $data = array(
      'kd_barang' => $this->input->post('kd_barang'),
      'nama_barang' => $this->input->post('nama_barang'),
      'kd_kategori' => $this->input->post('kd_kategori'),
      'harga_sewa' => $this->input->post('harga_sewa'),
      'detail_barang' => $this->input->post('detail_barang'),
      'jumlah_barang' => $this->input->post('jumlah_barang'),
      // 'foto_barang' => $dataInfo[0]['file_name'],
      // 'foto_barang1' => $dataInfo[1]['file_name'],
      // 'foto_barang2' => $dataInfo[2]['file_name'],
      // 'foto_barang3' => $dataInfo[3]['file_name'],
      // 'foto_barang4' => $dataInfo[4]['file_name'],

      //'prod_image2' => $dataInfo[2]['file_name'],
      // 'created_time' => date('Y-m-d H:i:s')
    );
    // $result_set = $this->tbl_products_model->insertUser($data);
    $this->Mglobal->tambahdata($data, 'tbl_barang');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    redirect(base_url('admin/master/barang/'));
  }

  private function set_upload_options()
  {
    //upload an image options
    $config = array();
    $config['upload_path'] = './assets/toko/images/barang/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
  }

  // function aksitambahbarang()
  // {

  //     //Form Validasi jika kosong
  //     //  $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
  //     //  $this->form_validation->set_rules('username_barang', 'Username barang', 'required');
  //     // $this->form_validation->set_rules('password_barang', 'Password barang', 'required');
  //     // if($this->form_validation->run()!=false)
  //     // {
  //     $config['upload_path'] = './assets/toko/images/barang/';
  //     $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp';
  //     $config['max_size'] = '2048';
  //     $config['file_name'] = 'foto_barang_' . time();
  //     $this->load->library('upload', $config);
  //     if ($this->upload->do_upload('foto_barang')) {
  //         $image = $this->upload->data();
  //         $data = array(
  //             'nama_barang' => $this->input->post('nama_barang'),
  //             'kd_barang' => $this->input->post('kd_barang'),
  //             'foto_barang' => $image['file_name'],
  //         );
  //         $this->Mglobal->tambahdata($data, 'tbl_barang');
  //         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //             <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
  //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //               <span aria-hidden="true">&times;</span>
  //             </button>
  //           </div>');
  //         redirect(base_url('admin/master/barang/'));
  //     } else {
  //         echo "Ada kesalahan";
  //     }
  // }

  // else {
  //
  //  $this->load->view('barang/temp/v_header');
  // $this->load->view('barang/temp/v_atas');
  // $this->load->view('barang/temp/v_sidebar');
  // $this->load->view('barang/master/barang/v_barang');
  // $this->load->view('barang/temp/v_footer');
  // }
  // }
  function hapusbarang()
  {
    $where = array('kd_barang' => $this->input->post('kd_barang'));
    $this->Mglobal->hapusdata($where, 'tbl_barang');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/barang/'));
  }
  function editbarang($id)
  {
    $data['x1'] = 'Master';
    $data['x2'] = 'barang';
    $data['x3'] = 'Edit barang Inventaris';
    $data['x4'] = 'Mengedit Data barang Inventaris Sahabat Optik';
    $where = array('kd_barang' => $id);
    $data['barang'] = $this->Mglobal->tampilkandatasingle('tbl_barang', $where);
    $this->load->view('adm/header');
    $this->load->view('adm/sidebar');
    $this->load->view('adm/master/barang/veditbarang', $data);
    $this->load->view('adm/footer');
  }
  function aksieditbarang()
  {

    //Form Validasi jika kosong
    //  $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
    //  $this->form_validation->set_rules('username_barang', 'Username barang', 'required');
    //   $this->form_validation->set_rules('password_barang', 'Password barang', 'required');
    //  if($this->form_validation->run()!=false)
    //  {



    $where = array('kd_barang' => $this->input->post('kd_barang'));
    $data = array(
      'nama_barang' => $this->input->post('nama_barang'),
      'harga_sewa' => $this->input->post('harga_sewa'),
      'detail_barang' => $this->input->post('detail_barang'),
      'jumlah_barang' => $this->input->post('jumlah_barang'),
      //  'password_barang'=>md5($this->input->post('password_barang'))
    );
    $this->Mglobal->editdata('tbl_barang', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/master/barang/'));
    //  }
    //  else {

    //    $this->load->view('adm/header');
    //    $this->load->view('adm/sidebar');
    //    $this->load->view('adm/master/barang/vtambahbarang');
    //    $this->load->view('adm/footer');
    //  }


  }
}
