<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prosespenerimaan extends CI_Controller
{

	/**
	 * YAYASAN PENDIDIKAN AL-ISTIQAMAH TERPADU BALIKPAPAN
	 * SIT AL-ISTIQAMAH YPAITB
	 * PENERIMAAN PESERTA DIDIK BARU
	 * Coded By: Bang Jack
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['security', 'common']);
		$this->load->library('pagination');
		$this->load->model('ProsespenerimaanModel', 'proses');
		if (!$this->session->userdata('userLogin') || $this->session->userdata('userLogin') == '2') {
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->cekstatus('status') == 9):
			$data = array(
				'title'			=> '<i class="ph-info me-2"></i> Proses Penerimaan',
				'title_desc'	=> 'Berikut ini adalah daftar Proses Penerimaan Peserta Didik  Baru yang ada di SIT Istiqamah Balikpapan',
				'title_head'	=> 'Daftar Proses',
				'kuota' => ($kuota = $this->proses->hitungKuota()) !== null ? number_format($kuota, 0, ',', '.') : 'N/A',
			);
			$this->load->view('backend/proses/list', $data, FALSE);
		endif;
	}

	public function status()
	{
		$replid = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		if ($status == 0):
			$this->db->where('replid', $replid);
			$this->db->update('prosespenerimaan', ['aktif' => 1]);
		endif;
		if ($status == 1):
			$this->db->where('replid', $replid);
			$this->db->update('prosespenerimaan', ['aktif' => 0]);
		endif;
		echo $this->db->affected_rows();
	}

	public function hapus()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->delete('prosespenerimaan');
		echo $this->db->affected_rows();
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama', 'Nama Proses', 'required|xss_clean', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'Tahun Penerimaan', 'xss_clean');
		$this->form_validation->set_rules('kuota', 'Kuota Penerimaan', 'numeric|xss_clean', ['numeric' => '%s harus diisi angka']);
		$this->form_validation->set_rules('keterangan', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$nama = $p['nama'];
			$tahun = $p['tahun'];
			$kuota = $p['kuota'];
			$keterangan = $p['keterangan'];
			$replid = $p['replid'];

			$data = array(
				'nama'			=> $nama,
				'tahun'			=> $tahun,
				'kuota'			=> $kuota,
				'keterangan'	=> $keterangan,
			);
			if (strlen($replid) == 36) {
				$this->db->where('replid', $replid);
				$this->db->update('prosespenerimaan', $data);
			} else {
				$this->db->insert('prosespenerimaan', $data);
			}
			echo json_encode(['sukses' => $this->db->affected_rows() + 1]);
		} else {
			$array = array(
				'error'			=> true,
				'er_nama'		=> form_error('nama'),
				'er_kuota'		=> form_error('kuota'),
			);
			echo json_encode($array);
		}
	}

	public function tampil()
	{
		$uuid = $this->uri->segment(3);
		if ($uuid !== null && strlen($uuid) == 36) {
			$proses = $this->db->get_where('prosespenerimaan', ['replid' => $uuid])->row_array();
			$data = array(
				'isi'		=> 'backend/proses/form',
				'titel'		=> 'Ubah Proses',
				'nama'		=> $proses['nama'],
				'tahun'		=> $proses['tahun'],
				'kuota'		=> $proses['kuota'],
				'keterangan'		=> $proses['keterangan'],
				'replid'	=> $proses['replid'],
			);
		} else {
			$data = array(
				'isi'		=> 'backend/proses/form',
				'titel'		=> 'Tambah Proses',
				'nama'		=> '',
				'tahun'		=> '',
				'kuota'		=> '0',
				'keterangan'		=> '',
				'replid'	=> '',
			);
		}
		$this->load->view('layout/form/template', $data);
	}

	public function sisa()
	{
		$replid = $this->uri->segment(3);
		echo sisaKuota($replid);
	}

	public function cari($rowno = 0)
	{
		$p = $this->input->post();
		$cari = $p['cari'];
		$rowperpage = $p['rowper'];
		$tahun = $p['tahun'];

		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcount = $this->db->count_all('prosespenerimaan');
		$this->db->like('nama', $cari);
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('aktif DESC');
		$list = $this->db->get_where('prosespenerimaan', ['tahun' => $tahun])->result_array();

		$config['base_url'] = base_url() . 'prosespenerimaan/cari';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"><i class="ph-check ms-1"></i></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $list;
		$data['row'] = $rowno;

		echo json_encode($data);
	}

	private function cekstatus($status)
	{
		return $this->encryption->decrypt($this->session->userdata($status));
	}
}
