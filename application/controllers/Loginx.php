<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Mpark');
    }

    public function index()
    {
        $this->load->view('vlogin');
    }
    function LogOut()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = md5($this->input->post('password'));
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $where = array('username_admin' => $username, 'password_admin' => md5($password));

            $data = $this->Mglobal->tampilkandatasingle1('tbl_admin', $where);
            $d = $this->Mglobal->tampilkandatasingle1('tbl_admin', $where)->row();
            $cek = $data->num_rows();

            if ($cek > 0) {
                $session = array('kd_admin' => $d->kd_admin, 'nama' => $d->nama_admin, 'nohp_admin' => $d->nohp_admin, 'gambar_admin' => $d->gambar_admin, 'status' => 'login', 'posisi' => 'admin', 'password_admin' => $d->password_admin);
                $this->session->set_userdata($session);
                if (!empty($this->input->post("remember"))) {
                    setcookie("loginId", $username, time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("loginPass",    $password,    time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie("loginId", "");
                    setcookie("loginPass", "");
                }
                redirect(base_url('welcome'));
            } else {
                $where = array('kd_pelamar' => $username, 'password_pelamar' => md5($password));
                /*$dt = $this->Mglobal->tampilkandatasingle1('tbl_user', $where);
				$hasil = $this->Mglobal->tampilkandatasingle1('tbl_user', $where)->row();
				*/
                $dt = $this->db->query("select * from tbl_pelamar where kd_pelamar='$username' and password_pelamar='$password2'");
                $hasil = $this->db->query("select * from tbl_pelamar where kd_pelamar='$username' and password_pelamar='$password2'")->row();
                // $hasil = $this->db->query("select * from tbl_user P, tbl_propinsi PR where P.id_propinsi=PR.id_propinsi and P.kd_user='$username' and P.password_user='$password2'")->row();
                $proses = $dt->num_rows();

                if ($proses > 0) {
                    $session = array('kd_pelamar' => $hasil->kd_pelamar, 'nama_pelamar' => $hasil->nama_pelamar, 'status' => 'login', 'status_pelamar' => $hasil->status_pelamar, 'posisi' => 'pelamar', 'password_pelamar' => $hasil->password_pelamar);
                    $this->session->set_userdata($session);
                    redirect(base_url('welcome'));
                } else {
                    $where = array('kd_hrd' => $username, 'password_hrd' => md5($password));
                    /*$dt = $this->Mglobal->tampilkandatasingle1('tbl_user', $where);
				$hasil = $this->Mglobal->tampilkandatasingle1('tbl_user', $where)->row();
				*/
                    $dt = $this->db->query("select * from tbl_hrd where kd_hrd='$username' and password_hrd='$password2'");
                    $hasil = $this->db->query("select * from tbl_hrd where kd_hrd='$username' and password_hrd='$password2'")->row();
                    // $hasil = $this->db->query("select * from tbl_user P, tbl_propinsi PR where P.id_propinsi=PR.id_propinsi and P.kd_user='$username' and P.password_user='$password2'")->row();
                    $proses = $dt->num_rows();
                    if ($proses > 0) {
                        $session = array('kd_hrd' => $hasil->kd_hrd, 'nama_hrd' => $hasil->nama_pelamar, 'status' => 'login', 'status_hrd' => $hasil->status_hrd, 'posisi' => 'hrd', 'password_pelamar' => $hasil->password_hrd);
                        $this->session->set_userdata($session);
                        redirect(base_url('welcome'));
                    } else {



                        //$data['judul']=$this->Mglobal->tampilkandata('tbl_judul');

                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
              		 <strong >Login Gagal!</strong><br> Username atau Password Salah!!.  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              			   <span aria-hidden="true">&times;</span>
               				</button>
             				</div>');
                        //$this->load->view('vlogin',$data);
                        redirect(base_url('depan/login'));
                    }
                }
            }
        } else {
            //$data['judul']=$this->Mglobal->tampilkandata('tbl_judul');
            $this->session->set_flashdata('msg', "<div class='alert alert-danger alert-message'>Anda belum mengisi username atau password</div>");
            redirect(base_url('login'));
        }
    }
}
