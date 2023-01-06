<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        // if ($this->session->userdata('status') <> 'login') {
        // 	redirect(base_url('login'));
        // }
        //Codeigniter : Write Less Do More
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // $data['lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush")->result();
        // $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        $data['slider'] = $this->Mglobal->tampilkandata('tbl_slider');
        $this->load->view('depan/temp/v_head', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        $this->load->view('depan/v_isi');
        $this->load->view('depan/temp/v_footer');
    }
    public function daftar()
    {
        // $data['lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush")->result();
        // $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        $data['faq'] = $this->Mglobal->tampilkandata('tbl_faq');
        $data['judul'] = 'Daftar Akun';
        // $data['kalimat'] = 'Isika Identitas Pendaftar';
        $this->load->view('depan/temp/v_head', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        $this->load->view('depan/v_daftar');
        $this->load->view('depan/temp/v_footer');
    }
    public function tentang()
    {
        // $data['lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush")->result();
        // $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        $data['tentang'] = $this->Mglobal->tampilkandata('tbl_tentang');
        $data['judul'] = 'Tentang Kami';
        // $data['kalimat'] = 'Isika Identitas Pendaftar';
        $this->load->view('depan/temp/v_head', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        $this->load->view('depan/v_tentang');
        $this->load->view('depan/temp/v_footer');
    }
    public function kontak()
    {
        // $data['lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush")->result();
        // $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        $data['tentang'] = $this->Mglobal->tampilkandata('tbl_tentang');
        $data['judul'] = 'Tentang Kami';
        // $data['kalimat'] = 'Isika Identitas Pendaftar';
        $this->load->view('depan/temp/v_head', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        $this->load->view('depan/v_kontak');
        $this->load->view('depan/temp/v_footer');
    }

    function aksidaftar()
    {
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'jpg|jpeg|png|tif|bmp|jfif';
        $config['max_size'] = '20480000';
        $config['file_name'] = 'adm_' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_pelamar')) {
            $image = $this->upload->data();
            $data = array(
                'nama_penyewa' => $this->input->post('nama_penyewa'),
                'kd_penyewa' => $this->input->post('kd_penyewa'),
                'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
                'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
                'alamat_penyewa' => $this->input->post('alamat_penyewa'),
                'nohp_penyewa' => $this->input->post('nohp_penyewa'),
                'jk_penyewa' => $this->input->post('jk_penyewa'),
                'gambar_penyewa' => $image['file_name'],
                'password_penyewa' => md5('password_penyewa'),
            );
            $this->Mglobal->tambahdata($data, 'tbl_pelamar');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect(base_url('depan/daftar'));
        } else {
            $data = array(
                'nama_penyewa' => $this->input->post('nama_penyewa'),
                'kd_penyewa' => $this->input->post('kd_penyewa'),
                'tempatlahir_penyewa' => $this->input->post('tempatlahir_penyewa'),
                'tgllahir_penyewa' => $this->input->post('tgllahir_penyewa'),
                'alamat_penyewa' => $this->input->post('alamat_penyewa'),
                'nohp_penyewa' => $this->input->post('nohp_penyewa'),
                'jk_penyewa' => $this->input->post('jk_penyewa'),
                'gambar_penyewa' => 'foto_penyewa.png',
                'password_penyewa' => md5('password_penyewa'),
            );
            $this->Mglobal->tambahdata($data, 'tbl_penyewa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            $this->session->set_flashdata('pesan', "Pendaftaran Berhasil");

            redirect(base_url('depan/daftar'));
        }
    }

    public function lowongan()
    {
        $tglsekarang = date('Y-m-d');
        $data['lowongan'] = $this->db->query("select * from tbl_lowongan where tgl_tutup >='$tglsekarang'")->result();
        // $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        // $data['lowongan'] = $this->Mglobal->tampilkandata('tbl_lowongan');
        $data['judul'] = 'Daftar Akun';
        $data['kalimat'] = 'Isika Identitas Pendaftar';
        $this->load->view('depan/temp/v_head', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        $this->load->view('depan/v_lowongan');
        $this->load->view('depan/temp/v_footer');
    }
    public function post($id)
    {
        $data['lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->result();
        $data['lowonganall'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush")->result();
        $data['bidang'] = $this->Mglobal->tampilkandata('tbl_bidang');
        // $data['lowongan'] = $this->Mglobal->tampilkandata('tbl_lowongan');
        $data['nama_lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->nama_lowongan;
        $data['nama_perush'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->nama_perush;
        $data['kd_pos'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->kd_pos;
        $data['kab_perush'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->kab_perush;
        $data['prop_perush'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->prop_perush;
        $data['alamat_perush'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->alamat_perush;
        $data['detail_lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->detail_lowongan;
        $data['kd_lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->kd_lowongan;
        $data['tgl_post'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->tgl_post;
        $data['tgl_tutup'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->tgl_tutup;
        $data['jenis_lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->jenis_lowongan;
        $data['gambar_lowongan'] = $this->db->query("select * from tbl_lowongan L, tbl_bidang B, tbl_perusahaan P where L.kd_bidang=B.kd_bidang and L.kd_perush=P.kd_perush and L.kdurl_lowongan='$id'")->row()->gambar_lowongan;
        $data['kdurl_lowongan'] = base_url('depan/post/') . $id;
        $this->load->view('depan/temp/v_headpost', $data);
        $this->load->view('depan/temp/v_header');
        // $this->load->view('depan/temp/v_navbar');
        // $this->load->view('depan/v_lowonganatas');
        $this->load->view('depan/v_lowongandetail');
        $this->load->view('depan/temp/v_footer');
    }
}
