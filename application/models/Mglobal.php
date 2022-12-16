<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mglobal extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//Codeigniter : Write Less Do More
	}
	function tampilkandata($namatabel)
	{
		return $this->db->get($namatabel)->result();
	}
	function tambahdata($data, $namatabel)
	{
		$this->db->insert($namatabel, $data);
		// insert into beruta judul='apa', isi='apa'
	}
	function tampilkandatasingle($namatabel, $where)
	{
		return $this->db->get_where($namatabel, $where)->result();
	}
	function tampilkandatasingle1($namatabel, $where)
	{
		return $this->db->get_where($namatabel, $where);
	}
	function editdata($namatabel, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($namatabel, $data);
	}
	function hapusdata($where, $namatabel)
	{
		$this->db->where($where);
		$this->db->delete($namatabel);
	}
	public function kode_otomatis($namafield, $namatabel, $depankode)
	{
		$this->db->select('right(' . $namafield . ',3) as kode', false);
		$this->db->order_by($namafield, 'desc');
		$this->db->limit(1);
		$query = $this->db->get($namatabel);
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = $depankode . $kodemax;

		return $kodejadi;
	}
	function bulan($bulan)
	{
		$bln = date($bulan);
		// $tgl = date($bulan);
		if ($bln == "Jan") {
			return "Januari";
		} elseif ($bln == "Feb") {
			return "Februari";
		} elseif ($bln == "Mar") {
			return "Maret";
		} elseif ($bln == "Apr") {
			return "April";
		} elseif ($bln == "May") {
			return "Mei";
		} elseif ($bln == "Jun") {
			return "Juni";
		} elseif ($bln == "Jul") {
			return "Juli";
		} elseif ($bln == "Aug") {
			return "Agustus";
		} elseif ($bln == "Sep") {
			return "September";
		}
	}

	function tanggalindo($tanggal)
	{
		$bulan = array(
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	}
	function rupiah($angka)
	{
		$hasil_rupiah =  number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}
}
