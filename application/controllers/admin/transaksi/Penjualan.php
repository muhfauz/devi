<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
    $data['x1'] = 'Input penjualan';
    $data['x2'] = 'penjualan';
    $data['x3'] = 'penjualan';
    // $data['x4']='Data gaji Sahabat Optik';
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['gaji'] = $this->db->query("select * from tbl_gaji where status_gaji='aktif'")->result();
    $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['total_penjualan'] = $this->db->query("select sum(total_penjualan) as total_penjualan from tbl_penjualan where kd_gaji='$kd_gaji'")->row()->total_penjualan;
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_setgajipenjualan');
    $this->load->view('admin/temp/v_footer');
  }

  function settingpenjualanxxxx()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    // $kd_penjualan = $this->input->post('kd_penjualan');
    $kd_admin = $this->session->userdata('kd_admin');
    $data = array(
      'kd_penjualan' => $this->Mglobal->kode_otomatis('kd_penjualan', 'tbl_penjualan', 'SER'),
      'kd_admin' => $kd_admin,
      'kd_gaji' => $kd_gaji,
      // 'total_penjualan' => $this->input->post('total_penjualan'),
    );

    $this->Mglobal->tambahdata($data, 'tbl_penjualan');
    // $this->Mglobal->tambahdata($data, 'tbl_gaji');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/'));
  }
  function unsettingpenjualan()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $kd_admin = $this->session->userdata('kd_admin');

    $this->db->query("DELETE FROM tbl_penjualan WHERE kd_gaji='$kd_gaji'");


    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Unsetting Data Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/'));
  }
  function inputpenjualan()
  {

    $data['x1'] = 'Input penjualan';
    $data['x2'] = 'penjualan';
    $data['x3'] = 'penjualan ';
    $data['x4'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['total_penjualan'] = $this->db->query("select sum(total_penjualan) as total_penjualan from tbl_penjualan where kd_gaji='$kd_gaji'")->row()->total_penjualan;
    $data['total_karyawan'] = $this->db->query("select * from tbl_karyawan where kd_bagian='BAG002'")->num_rows() + 1;
    $data['x1'] = 'Input penjualan';
    $data['penjualan'] = $this->db->query("select * from tbl_penjualan PJ, tbl_mobil M, tbl_jenismobil JM, tbl_karyawan K, tbl_jabatan J, tbl_gaji G where PJ.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and PJ.kd_mobil=M.kd_mobil and M.kd_jenismobil=JM.kd_jenismobil and PJ.kd_gaji='$kd_gaji' and K.kd_bagian='BAG001'")->result();
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    $data['karyawan'] = $this->db->query("select * from tbl_karyawan K, tbl_jabatan J where K.kd_jabatan=J.kd_jabatan and K.kd_bagian='BAG001' and K.kd_jabatan<>'JAB004'")->result();
    $data['supervisor'] = $this->db->query("select * from tbl_karyawan where kd_jabatan='JAB004'")->result();
    $data['adminsales'] = $this->db->query("select * from tbl_karyawan where kd_jabatan='JAB006'")->result();
    $data['kepalacabang'] = $this->db->query("select * from tbl_karyawan where kd_jabatan='JAB001'")->result();
    $data['mobil'] = $this->db->query("select * from tbl_mobil")->result();
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_inputpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function aksitambahpenjualan()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    $kd_mobil = $this->input->post('kd_mobil');
    $harga_mobil = $this->db->query("select * from tbl_mobil where kd_mobil='$kd_mobil'")->row()->harga_mobil;
    $jumlah_penjualan = $this->input->post('jumlah_penjualan');
    $total_penjualan = $harga_mobil * $jumlah_penjualan;
    $kd_karyawan = $this->input->post('kd_karyawan');
    $kd_spv = $this->input->post('kd_spv');
    $kd_as = $this->input->post('kd_as');
    $kd_kc = $this->input->post('kd_kc');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $session = array('kd_gaji' => $kd_gaji);
    // $this->session->set_flashdata('kd_gaji', $kd_gaji);
    $data = array(
      'kd_penjualan' => $this->input->post('kd_penjualan'),
      'kd_karyawan' => $this->input->post('kd_karyawan'),
      'kd_mobil' => $this->input->post('kd_mobil'),
      'kd_spv' => $this->input->post('kd_spv'),
      'kd_as' => $this->input->post('kd_as'),
      'kd_kc' => $this->input->post('kd_kc'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'kd_gaji' => $kd_gaji,
      'total_penjualan' => $total_penjualan,
      'jumlah_penjualan' => $this->input->post('jumlah_penjualan'),
      'tgl_penjualan' => date('Y-m-d'),

    );
    $this->Mglobal->tambahdata($data, 'tbl_penjualan');
    // input komisi sales
    $komisi_karyawan = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisisales_jenismobil;
    $tj_karyawan = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_karyawan'")->row()->tunjangan_jabatan;
    $tj_karyawan = $tj_karyawan + ($komisi_karyawan * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_karyawan,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_karyawan,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi supervisor
    $komisi_supervisor = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisisupervisor_jenismobil;
    $tj_supervisor = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_spv'")->row()->tunjangan_jabatan;
    $tj_supervisor = $tj_supervisor + ($komisi_supervisor * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_spv,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_supervisor,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi admin sales
    $komisi_adminsales = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisiadmin_jenismobil;
    $tj_adminsales = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_as'")->row()->tunjangan_jabatan;
    $tj_adminsales = $tj_adminsales + ($komisi_adminsales * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_as,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_adminsales,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi kc
    $komisi_kc = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisikc_jenismobil;
    $tj_kc = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_kc'")->row()->tunjangan_jabatan;
    $tj_kc = $tj_kc + ($komisi_kc * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_kc,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_kc,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Input penjualan Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/inputpenjualan'));
  }
  function hapuspenjualan()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    $kd_mobil = $this->input->post('kd_mobil');
    $harga_mobil = $this->db->query("select * from tbl_mobil where kd_mobil='$kd_mobil'")->row()->harga_mobil;
    $jumlah_penjualan = $this->input->post('jumlah_penjualan');
    $total_penjualan = $harga_mobil * $jumlah_penjualan;
    $kd_karyawan = $this->input->post('kd_karyawan');
    $kd_spv = $this->input->post('kd_spv');
    $kd_as = $this->input->post('kd_as');
    $kd_kc = $this->input->post('kd_kc');
    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $this->Mglobal->hapusdata($where, 'tbl_penjualan');

    // input komisi sales
    $komisi_karyawan = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisisales_jenismobil;
    $tj_karyawan = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_karyawan'")->row()->tunjangan_jabatan;
    $tj_karyawan = $tj_karyawan - ($komisi_karyawan * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_karyawan,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_karyawan,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi supervisor
    $komisi_supervisor = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisisupervisor_jenismobil;
    $tj_supervisor = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_spv'")->row()->tunjangan_jabatan;
    $tj_supervisor = $tj_supervisor - ($komisi_supervisor * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_spv,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_supervisor,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi admin sales
    $komisi_adminsales = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisiadmin_jenismobil;
    $tj_adminsales = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_as'")->row()->tunjangan_jabatan;
    $tj_adminsales = $tj_adminsales - ($komisi_adminsales * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_as,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_adminsales,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);

    // input komisi kc
    $komisi_kc = $this->db->query("select * from tbl_mobil M, tbl_jenismobil JM where M.kd_jenismobil=JM.kd_jenismobil and M.kd_mobil='$kd_mobil'")->row()->komisikc_jenismobil;
    $tj_kc = $this->db->query("select * from tbl_gajidetail where kd_gaji='$kd_gaji' and kd_karyawan='$kd_kc'")->row()->tunjangan_jabatan;
    $tj_kc = $tj_kc - ($komisi_kc * $this->input->post('jumlah_penjualan'));
    $where = array(
      'kd_karyawan' => $kd_kc,
    );
    $data = array(
      'tunjangan_jabatan' => $tj_kc,
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);


    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hapus Data Sukses!</strong> Data berhasil dihapus dari database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/inputpenjualan'));
  }

  function settingpenjualan()
  {

    $data['x1'] = 'Input penjualan';
    $data['x2'] = 'penjualan';
    $data['x3'] = 'penjualan ';
    $data['x4'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;
    $data['nama_perush'] = $this->db->query("select nama_perush from tbl_perusahaan")->row()->nama_perush;

    $kd_gaji = $this->session->userdata('kd_gaji');
    $data['bulan'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->bulan_gaji;
    $data['tahun'] = $this->db->query("select * from tbl_gaji where kd_gaji='$kd_gaji'")->row()->tahun_gaji;
    $data['total_penjualan'] = $this->db->query("select * from tbl_penjualan where kd_gaji='$kd_gaji'")->row()->total_penjualan;
    $data['total_tunjangan'] = $this->db->query("select sum(tunjangan_jabatan) as tunjangan_jabatan from tbl_gajidetail where kd_gaji='$kd_gaji'")->row()->tunjangan_jabatan;
    $data['total_karyawan'] = $this->db->query("select * from tbl_karyawan where kd_bagian='BAG002'")->num_rows() + 1;
    $data['x1'] = 'Input penjualan';
    $data['karyawan'] = $this->db->query("select * from tbl_gajidetail GD, tbl_karyawan K, tbl_jabatan J where GD.kd_karyawan=K.kd_karyawan and K.kd_jabatan=J.kd_jabatan and GD.kd_gaji='$kd_gaji' and K.kd_bagian='BAG001'")->result();
    // $data['bulan'] = $this->db->query("select * from tbl_bulan")->result();
    // $data['kategori'] = $this->Mglobal->tampilkandata('tbl_kategori');
    $this->load->view('admin/temp/v_header', $data);
    $this->load->view('admin/temp/v_atas');
    $this->load->view('admin/temp/v_sidebar');
    $this->load->view('admin/transaksi/penjualan/v_lihatpenjualan');
    $this->load->view('admin/temp/v_footer');
  }
  function inputinsentif()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $session = array('kd_gaji' => $kd_gaji);
    // $this->session->set_flashdata('kd_gaji', $kd_gaji);
    $where = array('kd_gajidetail' => $this->input->post('kd_gajidetail'));

    $data = array(
      'insentif_reguler' => $this->input->post('insentif_reguler'),
    );
    $this->Mglobal->editdata('tbl_gajidetail', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Input penjualan Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/inputpenjualan'));
  }
  function  settingpenjualanx()
  {
    $kd_gaji = $this->input->post('kd_gaji');
    $session = array('kd_gaji' => $kd_gaji);
    $this->session->set_userdata($session);
    redirect(base_url('admin/transaksi/penjualan/settingpenjualan'));
  }
  function aksieditpenjualan()
  {
    $kd_gaji = $this->session->userdata('kd_gaji');
    $kd_mobil = $this->input->post('kd_mobil');
    $harga_mobil = $this->db->query("select * from tbl_mobil where kd_mobil='$kd_mobil'")->row()->harga_mobil;
    $jumlah_penjualan = $this->input->post('jumlah_penjualan');
    $total_penjualan = $harga_mobil * $jumlah_penjualan;
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $kd_karyawan = $this->input->post('kd_karyawan');
    // $session = array('kd_gaji' => $kd_gaji);
    // $this->session->set_flashdata('kd_gaji', $kd_gaji);
    $where = array('kd_penjualan' => $this->input->post('kd_penjualan'));
    $data = array(
      'kd_penjualan' => $this->input->post('kd_penjualan'),
      'kd_karyawan' => $this->input->post('kd_karyawan'),
      'kd_mobil' => $this->input->post('kd_mobil'),
      'kd_spv' => $this->input->post('kd_spv'),
      'kd_as' => $this->input->post('kd_as'),
      'kd_kc' => $this->input->post('kd_kc'),
      'kd_admin' => $this->session->userdata('kd_admin'),
      'kd_gaji' => $kd_gaji,
      'total_penjualan' => $total_penjualan,
      'jumlah_penjualan' => $this->input->post('jumlah_penjualan'),
      // 'tgl_penjualan' => date('Y-m-d'),

    );
    $this->Mglobal->editdata('tbl_penjualan', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Input penjualan Sukses!</strong> Data berhasil disimpan ke database.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect(base_url('admin/transaksi/penjualan/inputpenjualan'));
  }
}
