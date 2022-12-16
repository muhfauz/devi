<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
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
        $data['x1'] = 'Gaji';
        $data['x2'] = 'Gaji';
        $data['x3'] = 'Gaji';
        // $data['x4']='Data gaji Sahabat Optik';
        $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
        $data['gaji'] = $this->db->query("select * from tbl_gaji")->result();
        $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
        // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
        $this->load->view('admin/temp/v_header', $data);
        $this->load->view('admin/temp/v_atas');
        $this->load->view('admin/temp/v_sidebar');
        $this->load->view('admin/transaksi/gaji/v_gaji');
        $this->load->view('admin/temp/v_footer');
    }

    function aksitambahgaji()
    {
        $data = array(
            'kd_gaji' => $this->input->post('kd_gaji'),
            'bulan_gaji' => $this->input->post('bulan_gaji'),
            'tahun_gaji' => $this->input->post('tahun_gaji'),
            'status_gaji' => $this->input->post('status_gaji'),
        );
        $this->Mglobal->tambahdata($data, 'tbl_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/transaksi/gaji/'));
    }

    function hapusgaji()
    {
        $where = array('kd_gaji' => $this->input->post('kd_gaji'));
        $this->Mglobal->hapusdata($where, 'tbl_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/transaksi/gaji/'));
    }

    function aksieditgaji()
    {
        $where = array('kd_gaji' => $this->input->post('kd_gaji'));
        $data = array(
            'bulan_gaji' => $this->input->post('bulan_gaji'),
            'tahun_gaji' => $this->input->post('tahun_gaji'),
            'status_gaji' => $this->input->post('status_gaji'),
            //  'password_gaji'=>md5($this->input->post('password_gaji'))
        );
        $this->Mglobal->editdata('tbl_gaji', $where, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect(base_url('admin/transaksi/gaji/'));
    }
}
