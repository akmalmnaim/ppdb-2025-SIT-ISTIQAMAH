<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendaftar extends CI_Controller
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
		// $this->load->model('PendaftarModel','pendaftar');
		if (!$this->session->userdata('userLogin') || $this->session->userdata('userLogin') == '2') {
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->cekstatus('status') == 9):
			$proses = $this->db->get_where('prosespenerimaan', ['tahun' => cekSetting('tahun')])->result();
			$data = array(
				'title'				=> '<i class="ph-info me-2"></i> Pendaftar',
				'title_desc'		=> 'Berikut ini adalah Daftar Pendaftar Penerimaan Peserta Didik  Baru yang ada di SIT Istiqamah Balikpapan',
				'title_head'		=> 'Daftar pendaftar',
				'prosespenerimaan'	=> $proses,

			);
			$this->load->view('backend/pendaftar/list', $data, FALSE);
		endif;
	}

	public function formwawancara()
	{
		$idcalon = $this->uri->segment(3);
		$this->db->select('*,a.nama as namaanak,b.nama as proses');
		$this->db->join('prosespenerimaan as b', 'b.replid = a.idproses', 'LEFT');
		$anak = $this->db->get_where('calonsiswa as a', ['a.replid' => $idcalon])->row_array();
		$sekolah = $this->db->get_where('calonsiswa_sekolahasal', ['idcalon' => $idcalon])->row_array();
		$ortu = $this->db->get_where('calonsiswa_ortu', ['idcalon' => $idcalon])->row_array();
		$ortu_t = $this->db->get_where('calonsiswa_ortutambah', ['idcalon' => $idcalon])->row_array();
		$saudara = $this->db->get_where('calonsiswa_saudara', ['idcalon' => $idcalon])->result();
		$latarbelakang = $this->db->get_where('calonsiswa_latarbelakang', ['idcalon' => $idcalon])->row_array();
		$data = array(
			'anak'		=> $anak,
			'sekolah'	=> $sekolah,
			'ortu'		=> $ortu,
			'ortu_t'	=> $ortu_t,
			'saudara'	=> $saudara,
			'latarbelakang'	=> $latarbelakang,
		);
		$this->load->view('layout/print/print_wawancara', $data);
	}

	public function tampil()
	{
		$idcalon = $this->uri->segment(3);
		$cek = $this->db->get_where('jadwal_wawancara', ['idcalon' => $idcalon]);
		if ($cek->num_rows() == 0):
			$data = array(
				'isi'		=> 'backend/pendaftar/form-wawancara',
				'titel'		=> 'Penjadwalan',
				'title'		=> 'Jadwal Wawancara dan Ujian',
				'tw'		=> date("Y-m-d"),
				'ww'		=> date("H:i"),
				'tt'		=> date("Y-m-d"),
				'wt'		=> date("H:i"),
				'replid'	=> '',
				'idcalon'	=> $idcalon,
			);
		endif;
		if ($cek->num_rows() == 1):
			$c = $cek->row_array();
			$data = array(
				'isi'		=> 'backend/pendaftar/form-wawancara',
				'titel'		=> 'Penjadwalan',
				'title'		=> 'Ubah Wawancara dan Ujian',
				'tw'		=> $c['tglwawancara'],
				'ww'		=> $c['wktwawancara'],
				'tt'		=> $c['tglujian'],
				'wt'		=> $c['wktujian'],
				'replid'	=> $c['replid'],
				'idcalon'	=> $idcalon,
			);
		endif;
		$this->load->view('layout/form/template', $data);
	}

	public function reset()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['password' => password_hash('12345', PASSWORD_DEFAULT)]);
		echo $this->db->affected_rows() + 1;
	}

	public function cetak()
	{

		$replid = $this->uri->segment(3);
		$bio = $this->db->get_where('calonsiswa', ['replid' => $replid])->row_array();
		$kesehatan = $this->db->get_where('calonsiswa_kesehatan', ['idcalon' => $replid])->row_array();
		$ortu = $this->db->get_where('calonsiswa_ortu', ['idcalon' => $replid])->row_array();
		$ortutambahan = $this->db->get_where('calonsiswa_ortutambah', ['idcalon' => $replid])->row_array();
		$saudara = $this->db->get_where('calonsiswa_saudara', ['idcalon' => $replid])->result();
		$sekolahasal = $this->db->get_where('calonsiswa_sekolahasal', ['idcalon' => $replid])->row_array();
		$tambah = $this->db->get_where('calonsiswa_tambah', ['idcalon' => $replid])->row_array();
		$latarbelakang = $this->db->get_where('calonsiswa_latarbelakang', ['idcalon' => $replid])->row_array();
		$data = array(
			'bio'			=> $bio,
			'kesehatan'		=> $kesehatan,
			'ortu'			=> $ortu,
			'ortutambahan'	=> $ortutambahan,
			'saudara'		=> $saudara,
			'sekolahasal'	=> $sekolahasal,
			'tambah'		=> $tambah,
			'latarbelakang'		=> $latarbelakang,
		);
		$cetak = $this->load->view('backend/profil/profil-print', $data, true);
		$this->load->view('layout/print/template', ['cetak' => $cetak]);
	}
	public function set_barcode()
	{
		$code = $this->uri->segment(3);
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $code), array());
	}

	public function simpan()
	{
		$this->form_validation->set_rules('tw', 'Tanggal Wawancara', 'required|xss_clean', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('ww', 'Waktu Wawancara', 'required|xss_clean', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('tt', 'Tanggal Tes', 'required|xss_clean', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('wt', 'Waktu Tes', 'required|xss_clean', ['required' => '%s tidak boleh kosong']);
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$tw = $p['tw'];
			$ww = $p['ww'];
			$tt = $p['tt'];
			$wt = $p['wt'];
			$st = $p['is_perlu'];
			$replid = $p['replid'];
			$idcalon = $p['idcalon'];

			$data = array(
				'idcalon'			=> $idcalon,
				'tglwawancara'		=> $tw,
				'wktwawancara'		=> $ww,
				'tglujian'			=> $tt,
				'wktujian'			=> $wt,
				'is_perlu'			=> $st,
			);
			if (strlen($replid) == 36) {
				$this->db->where('replid', $replid);
				$this->db->update('jadwal_wawancara', $data);
				$this->UpdateProsesJadwal($idcalon);
			} else {
				$this->db->insert('jadwal_wawancara', $data);
			}
			echo json_encode(['sukses' => $this->db->affected_rows() + 1]);
		} else {
			$array = array(
				'error'			=> true,
			);
			echo json_encode($array);
		}
	}

	public function upload_hasil()
	{
		$idcalon = $this->uri->segment(3);
		$cek = $this->db->get_where('upload_hasil', ['idcalon' => $idcalon]);
		if ($cek->num_rows() == 0):
			$this->db->insert('upload_hasil', ['idcalon' => $idcalon]);
			$this->UpdateHasil($idcalon);
			$data = array(
				'isi'		=> 'backend/pendaftar/form-upload',
				'titel'		=> 'Upload Hasil',
				'title'		=> 'Upload Hasil Wawancara dan Tes',
				'idcalon'	=> $idcalon,
				'old_w'		=> '',
				'old_t'		=> '',
				'old_p'		=> '',
				'keterangan' => '',
			);
		endif;
		if ($cek->num_rows() == 1):
			$c = $cek->row_array();
			$data = array(
				'isi'		=> 'backend/pendaftar/form-upload',
				'titel'		=> 'Upload Hasil',
				'title'		=> 'Upload Hasil Wawancara dan Tes',
				'idcalon'	=> $idcalon,
				'old_w'		=> $c['up_wawancara'],
				'old_t'		=> $c['up_ujian'],
				'old_p'		=> $c['up_psikotes'],
				'keterangan' => $c['keterangan'],
			);
		endif;
		$this->load->view('layout/form/template', $data);
	}

	public function uploadhasil()
	{
		$p = $this->input->post();
		$idcalon = $p['idcalon'];
		$pt = $p['petunjuk'];
		$old_p = $p['old_p'];
		$old_t = $p['old_t'];
		$old_w = $p['old_w'];
		$config['upload_path'] = './upload/uploadhasil';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$array = array(
				'error'   				=> true,

			);
			echo json_encode($array);
		} else {
			$data = $this->upload->data();
			// echo "Upload successful!";
			if ($pt == 'psikotes'):
				$this->db->where('idcalon', $idcalon);
				$this->db->update('upload_hasil', ['up_psikotes' => $data['file_name']]);
				if (isset($old_p))
					if (file_exists('./upload/uploadhasil/' . $old_p))
						unlink('./upload/uploadhasil/' . $old_p);
			endif;
			if ($pt == 'tes'):
				$this->db->where('idcalon', $idcalon);
				$this->db->update('upload_hasil', ['up_ujian' => $data['file_name']]);
				if (isset($old_t))
					if (file_exists('./upload/uploadhasil/' . $old_t))
						unlink('./upload/uploadhasil/' . $old_t);
			endif;
			if ($pt == 'wawancara'):
				$this->db->where('idcalon', $idcalon);
				$this->db->update('upload_hasil', ['up_wawancara' => $data['file_name']]);
				if (isset($old_w))
					if (file_exists('./upload/uploadhasil/' . $old_w))
						unlink('./upload/uploadhasil/' . $old_w);
			endif;
			echo json_encode(['success' => $data['file_name']]);
		}
	}

	public function simpanketerangan()
	{
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$idcalon = $p['idcalon'];
			$keterangan = $p['keterangan'];
			$this->db->where('idcalon', $idcalon);
			$this->db->update('upload_hasil', ['keterangan' => $keterangan]);
			echo $this->db->affected_rows();
		} else {
			echo validation_errors();
		}
	}

	private function UpdateProsesJadwal($idcalon)
	{
		$this->db->where('replid', $idcalon);
		$this->db->update('calonsiswa', ['is_proses' => 5]);
	}
	private function UpdateHasil($idcalon)
	{
		$this->db->where('replid', $idcalon);
		$this->db->update('calonsiswa', ['is_proses' => 6]);
	}

	public function konfirmasi()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['is_proses' => '3']);

		$this->db->select('nopendaftaran,nama,emailsiswa');
		$r = $this->db->get_where('calonsiswa', ['replid' => $replid])->row_array();
		$data = '
					<h2>KONFIRMASI PEMBAYARAN</h2>
					Kami sudah melakukan konfirmasi pembayaran dengan ID Pendaftaran: <strong>' . $r["nopendaftaran"] . '</strong> atas nama <strong>' . $r["nama"] . '</strong> . </p>
					<p>Anda dapat masuk ke sistem kami di <a href="' . base_url() . 'login">SINI</a> dengan menggunakan user dan password yang anda miliki.
					<p>Hubungi: <strong> 081298781997 (WA)</strong> Jika ada Kesulitan atau lupa password</p>
					';
		$kirim = kirimEmail($r['emailsiswa'], 'Konfirmasi Pembayaran', $data, 'PPDB SIT ISTIQAMAH BALIKPAPAN');
	}

	public function diterima()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['is_proses' => '10']);
		echo $this->db->affected_rows();
	}


	public function tidak_diterima()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['is_proses' => '11']);
		echo $this->db->affected_rows();
	}

	public function mengundurkan_diri()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['is_proses' => '12']);
		echo $this->db->affected_rows();
	}

	public function hapus()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['aktif' => '0', 'emailsiswa' => $replid]);
		echo $this->db->affected_rows();
	}


	public function cari($rowno = 0)
	{
		$p = $this->input->post();
		$cari = $p['cari'];
		$rowperpage = $p['rowper'];
		$tahun = $p['tahun'];
		$proses = $p['proses'];

		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$this->db->where('tahunmasuk', $tahun);
		$allcount = $this->db->get_where('calonsiswa', ['tahunmasuk' => $tahun, 'aktif' => 1, 'idproses' => $proses])->num_rows();
		// 	$allcount = $this->db->count_all('calonsiswa');
		// $allcount = $this->db->get_where('calonsiswa',['tahunmasuk'=>cekSetting('tahun')]);
		$this->db->select('s.replid,s.nama,s.tmplahir,s.tgllahir,p.nama as namaproses,s.nopendaftaran,s.foto,s.is_verify,s.is_proses,s.slip_img,u.up_wawancara,u.up_ujian,u.up_psikotes,s.nowa,s.waktu_daftar,s.tahun_lulus,s.file_ijazah, s.is_baru,s.asal_sekolah');
		$this->db->join('prosespenerimaan as p', 'p.replid=s.idproses', 'LEFT');
		$this->db->join('upload_hasil as u', 's.replid = u.idcalon', 'LEFT');
		$this->db->like('s.nama', $cari);
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('is_proses ASC');
		$list = $this->db->get_where('calonsiswa as s', ['s.tahunmasuk' => $tahun, 's.aktif' => 1, 's.idproses' => $proses])->result_array();

		$config['base_url'] = base_url() . 'calonsiswa/cari';
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
