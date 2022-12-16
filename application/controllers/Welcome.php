<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');
		if ($this->session->userdata('status') <> 'login') {
			redirect(base_url('login'));
		}
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
		// $data['spp'] = $this->db->query("select * from tbl_spp S, tbl_tahunajaran T, tbl_admin A where S.kd_tahunajaran=T.kd_tahunajaran and S.kd_admin=A.kd_admin")->result();
		$this->load->view('admin/temp/v_header');
		$this->load->view('admin/temp/v_atas');
		$this->load->view('admin/temp/v_sidebar');
		$this->load->view('admin/temp/v_dasboard');
		$this->load->view('admin/temp/v_footer');
	}
	public function profile()
	{
		$this->load->view('admin/temp/v_header');
		$this->load->view('admin/temp/v_atas');
		$this->load->view('admin/temp/v_sidebar');
		$this->load->view('admin/master/admin/v_profile');
		$this->load->view('admin/temp/v_footer');
	}
}
