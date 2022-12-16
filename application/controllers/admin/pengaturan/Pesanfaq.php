<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanfaq extends CI_Controller
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
        $data['x1'] = 'Pengaturan Pesan Faq';
        $data['x2'] = 'Pengaturan';
        $data['x3'] = 'Pengaturan Pesan Faq';
        // $data['x4']='Data Admin Sahabat Optik';

        $data['pesanfaq'] = $this->Mglobal->tampilkandata('tbl_pesanfaq');
        $this->load->view('admin/temp/v_header', $data);
        $this->load->view('admin/temp/v_atas');
        $this->load->view('admin/temp/v_sidebar');
        $this->load->view('admin/pengaturan/v_pesanfaq');
        $this->load->view('admin/temp/v_footer');
    }

    function aksieditpesanfaq()
    {

        //Form Validasi jika kosong
        //  $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
        //  $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
        //   $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
        //  if($this->form_validation->run()!=false)
        //  {
        $where = array('kd_pesanfaq' => $this->input->post('kd_pesanfaq'));
        $data = array(
            'judul_pesanfaq' => $this->input->post('judul_pesanfaq'),
            'isi_pesanfaq' => $this->input->post('isi_pesanfaq'),
            //  'password_admin'=>md5($this->input->post('password_admin'))
        );
        $this->Mglobal->editdata('tbl_pesanfaq', $where, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/pengaturan/pesanfaq/'));
        //  }
        //  else {

        //    $this->load->view('adm/header');
        //    $this->load->view('adm/sidebar');
        //    $this->load->view('adm/master/admin/vtambahadmin');
        //    $this->load->view('adm/footer');
        //  }
    }
}
