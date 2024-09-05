<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->load->helper(['security']);
		if (!$this->session->userdata('userLogin')) {
			redirect('login');
		}
	}

	public function index()
	{
		$status = $this->encryption->decrypt($this->session->userdata('status'));
		if ($status == '9') :
			$tahun = cekSetting('tahun');
			$total = $this->db->get_where('calonsiswa', ['aktif' => 1, 'is_proses >' => 1, 'tahunmasuk' => $tahun])->num_rows();
			$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
			$data_login = $this->db->get_where('login', ['login' => $login])->row_array();
			$this->db->select('b.nama as proses, count(*) as jumlah');
			$this->db->join('prosespenerimaan as b', 'a.idproses=b.replid', 'LEFT');
			$this->db->group_by('b.replid');
			$quick_p = $this->db->get_where('calonsiswa as a', ['a.aktif' => '1', 'is_proses >' => 1, 'a.tahunmasuk' => $tahun])->result();
			$data = array(
				'isi'			=> 'backend/profil/beranda',
				'status'		=> $status,
				'info'			=> $data_login,
				// 'jmldaftar'		=> $this->jmlPendaftar(),
				'psmpit'		=> hitungPendaftar('smpit', 0),
				'psdit'			=> hitungPendaftar('sdit', 0),
				'psmait'		=> hitungPendaftar('smait', 0),
				'pdsdit'		=> hitungPendaftar('sdit', 1),
				'pdsmpit'		=> hitungPendaftar('smpit', 1),
				'pdsmait'		=> hitungPendaftar('smait', 1),
				'qp'			=> $quick_p,
				'total'			=> $total,
			);
			$this->load->view('layout/profil/template', $data, FALSE);
		endif;
		if ($status == '1') :
			$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
			$data_login = $this->db->get_where('login', ['login' => $login])->row_array();
			$data = array(
				'isi'			=> 'backend/profil/beranda',
				'status'		=> $status,
				'info'			=> $data_login,
			);
			$this->load->view('layout/profil/template', $data, FALSE);
		endif;
		if ($status == '2') :
			$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
			$data_login = $this->db->get_where('calonsiswa', ['emailsiswa' => $login])->row_array();
			$data = array(
				'isi'			=> 'backend/profil/beranda',
				'status'		=> $status,
				'info'			=> $data_login,
			);
			$this->load->view('layout/profil/template', $data, FALSE);
		endif;
	}
	private function jmlPendaftar()
	{
		$pre = getPrefix();
		$this->db->like('nopendaftaran', $pre, 'after');
		return $this->db->get('calonsiswa')->num_rows();
	}

	public function ubahpassword()
	{
		$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
		$bio = $this->db->get_where('calonsiswa', ['emailsiswa' => $login])->row_array();
		$this->load->view('backend/profil/profil-ubah-password', ['profil' => $bio]);
	}

	public function simpanpassword()
	{
		$this->form_validation->set_rules('passbaru1', 'Password', 'required|min_length[5]', ['min_length' => 'Minimum 5 Karakter']);
		$this->form_validation->set_rules('passbaru2', 'Password Konfirmasi', 'required|matches[passbaru1]|min_length[5]', ['matches' => 'Password tidak sesuai', 'min_length' => 'Minimal 5 karakter']);
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$pass = $p['passbaru2'];
			$this->db->where('replid', $replid);
			$this->db->update('calonsiswa', ['password' => password_hash($pass, PASSWORD_DEFAULT),]);
			echo json_encode(['sukses' => $this->db->affected_rows() + 1]);
		} else {
			echo json_encode(['gagal' => validation_errors()]);
		}
	}

	public function uploadslip()
	{
		$p = $this->input->post();
		$replid = $p['replid'];
		$config['upload_path'] = './upload/slip_bayar';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$array = array(
				'error'   				=> true,
				'd_error' 				=> $this->upload->display_errors(),
			);
			echo json_encode($array);
		} else {
			$data = $this->upload->data();
			// echo "Upload successful!";
			$this->db->where(['replid' => $replid]);
			$this->db->update('calonsiswa', ['slip_img' => $data['file_name'], 'is_proses' => '2']);
			echo json_encode(['success' => true]);
		}
	}

	// public function uploadijazah()
	// {
	// 	$p = $this->input->post();
	// 	$replid = $p['replid'];
	// 	$config['upload_path'] = './upload/ijazah';
	// 	$config['allowed_types'] = 'jpeg|jpg|png|pdf';
	// 	$config['max_size'] = 2048;
	// 	$config['encrypt_name'] = TRUE;
	// 	$config['overwrite'] = TRUE;

	// 	$this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload('image')) {
	// 		$array = array(
	// 			'error'   				=> true,
	// 			'd_error' 				=> $this->upload->display_errors(),
	// 		);
	// 		echo json_encode($array);
	// 	} else {
	// 		$data = $this->upload->data();
	// 		// echo "Upload successful!";
	// 		$this->db->where(['replid' => $replid]);
	// 		$this->db->update('calonsiswa', ['ijazah_img' => $data['file_name'], 'is_ijazah_upload' => '1']);
	// 		echo json_encode(['success' => true]);
	// 	}
	// }

	public function profil()
	{
		$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
		$this->db->join('calonsiswa_sekolahasal', 'calonsiswa_sekolahasal.idcalon=calonsiswa.replid');
		$this->db->join('calonsiswa_kesehatan', 'calonsiswa_kesehatan.idcalon=calonsiswa.replid');
		$this->db->join('calonsiswa_ortu', 'calonsiswa_ortu.idcalon=calonsiswa.replid');
		$this->db->join('calonsiswa_ortutambah', 'calonsiswa_ortutambah.idcalon=calonsiswa.replid');
		$this->db->join('calonsiswa_tambah', 'calonsiswa_tambah.idcalon=calonsiswa.replid');
		$this->db->join('calonsiswa_latarbelakang', 'calonsiswa_latarbelakang.idcalon=calonsiswa.replid');
		$profil = $this->db->get_where('calonsiswa', ['emailsiswa' => $login])->row_array();
		$data = array(
			'profil'	=> $profil,
			'proses'	=> getProsesPenerimaan($profil['idproses']),
		);
		$this->load->view('backend/profil/profil-pendaftar-wizard', $data);
	}

	public function saudara()
	{
		$idcalon = $this->uri->segment(3);
		$replid = $this->uri->segment(4);
		if ($replid == 'add') :
			$data = array(
				'isi'		=> 'backend/profil/profil-add-saudara',
				'titel'		=> 'Tambah Saudara',
				'idcalon'	=> $idcalon,
				'replid'	=> $replid,
				'nama'		=> '',
				'masih'		=> '0',
				'namasek'	=> '',
				'kls'		=> '',
			);
		endif;
		if (strlen($replid) == 36) :
			$r = $this->db->get_where('calonsiswa_saudara', ['replid' => $replid])->row_array();
			$data = array(
				'isi'		=> 'backend/profil/profil-add-saudara',
				'titel'		=> 'Tambah Saudara',
				'idcalon'	=> $idcalon,
				'replid'	=> $replid,
				'nama'		=> $r['namasaudara'],
				'masih'		=> $r['is_sekolah'],
				'namasek'	=> $r['namasekolah'],
				'kls'		=> $r['kelas_saudara'],
			);
		endif;

		$this->load->view('layout/form/template', $data);
	}


	public function saudarasimpan()
	{
		$this->form_validation->set_rules('nama', 'Nama Saudara', 'required|xss_clean');
		$this->form_validation->set_rules('is_sekolah', 'Masih Sekolah', 'numeric|xss_clean');
		$this->form_validation->set_rules('namasekolah', 'Sekolah', 'xss_clean');
		$this->form_validation->set_rules('kelassekolah', 'Kelas', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$nama = $p['nama'];
			$replid = $p['replid'];
			$idcalon = $p['idcalon'];
			$is_sekolah = $p['is_sekolah'];
			$namasek = $p['namasekolah'];
			$kelas = $p['kelassekolah'];
			$data = array(
				'idcalon'		=> $idcalon,
				'namasaudara'	=> $nama,
				'is_sekolah'	=> $is_sekolah,
				'namasekolah'	=> $namasek,
				'kelas_saudara'	=> $kelas,
			);
			if (strlen($replid) == 3) :
				$this->db->insert('calonsiswa_saudara', $data);
			endif;
			if (strlen($replid) == 36) :
				$this->db->where('replid', $replid);
				$this->db->update('calonsiswa_saudara', $data);
			endif;
			echo json_encode(['sukses' => $this->db->affected_rows() + 1]);
		} else {
			echo json_encode(['gagal' => validation_errors()]);
		}
	}

	public function saudaralist()
	{
		$idcalon = $this->uri->segment(3);
		$result = $this->db->get_where('calonsiswa_saudara', ['idcalon' => $idcalon])->result();
		echo json_encode($result);
	}

	public function hapussaudara()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->delete('calonsiswa_saudara');
		echo $this->db->affected_rows();
	}

	public function jadwal()
	{
		$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
		$bio = $this->db->get_where('calonsiswa', ['emailsiswa' => $login])->row_array();
		$jadwal = $this->db->get_where('jadwal_wawancara', ['idcalon' => $bio['replid'], 'is_perlu <' => 2])->row_array();
		$this->load->view('backend/profil/profil-jadwal', ['bio' => $bio, 'jadwal' => $jadwal]);
	}

	public function profilpermanen()
	{
		$replid = $this->uri->segment(3);
		$this->db->where('replid', $replid);
		$this->db->update('calonsiswa', ['status_data' => '1']);
		echo $this->db->affected_rows();
	}

	public function pengumuman()
	{
		$login = $this->encryption->decrypt($this->session->userdata('userLogin'));
		$this->db->select('s.nopendaftaran, s.nama, p.nama as proses,s.is_proses,s.aktif,s.tahunmasuk,s.departemen');
		$this->db->join('prosespenerimaan as p', 'p.replid = s.idproses');
		$pengumuman = $this->db->get_where('calonsiswa as s', ['emailsiswa' => $login])->row_array();;
		$this->load->view('backend/profil/profil-pengumuman', ['pengumuman' => $pengumuman]);
	}

	public function simpan1()
	{
		$this->form_validation->set_rules('departemen', 'Mendaftar di', 'xss_clean');
		$this->form_validation->set_rules('is_baru', 'Mendaftar di', 'xss_clean');
		$this->form_validation->set_rules('kelas', 'Masuk di Kelas', 'xss_clean');
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$departemen = $p['departemen'];
			$is_baru = $p['is_baru'];
			$kelas = $p['kelas'];
			$alasan_pindah = $p['alasan_pindah'];
			$d_simpan1 = array(
				'departemen' 	=> $departemen,
				'is_baru'		=> $is_baru,
				'kelas'			=> $kelas,
				'alasan_pindah' => $alasan_pindah,
			);
			$this->db->where('replid', $replid);
			$this->db->update('calonsiswa', $d_simpan1);
			echo $this->db->affected_rows() + 1;
		}
	}

	public function simpan2()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('panggilan', 'Panggilan', 'xss_clean');
		$this->form_validation->set_rules('nisn', 'NISN', 'numeric|xss_clean');
		$this->form_validation->set_rules('nik', 'NIK', 'numeric|xss_clean');
		$this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'xss_clean');
		$this->form_validation->set_rules('suku', 'Suku', 'xss_clean');
		$this->form_validation->set_rules('warga', 'Kewargeangeraan', 'xss_clean');
		$this->form_validation->set_rules('Anakke', 'Anak Ke', 'numeric|xss_clean');
		$this->form_validation->set_rules('jumlahsaudara', 'Dari', 'numeric|xss_clean');
		$this->form_validation->set_rules('statusanak', 'Status', 'xss_clean');
		$this->form_validation->set_rules('jumlahkandung', 'Jumlah Kandung', 'numeric|xss_clean');
		$this->form_validation->set_rules('jumlahtiri', 'Jumlah Tiri', 'numeric|xss_clean');
		$this->form_validation->set_rules('jumlahangkat', 'Jumlah Angkat', 'numeric|xss_clean');
		$this->form_validation->set_rules('isyatim', 'Yatim/Piatu/Yatim Piatu', 'numeric|xss_clean');
		$this->form_validation->set_rules('bahasa', 'Bahasa', 'xss_clean');
		$this->form_validation->set_rules('alamatsiswa', 'Alamat', 'xss_clean');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'xss_clean');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'xss_clean');
		$this->form_validation->set_rules('kodepossiswa', 'Kode Pos Siswa', 'numeric|xss_clean');
		$this->form_validation->set_rules('jarak', 'jarak', 'numeric|xss_clean');
		$this->form_validation->set_rules('telponsiswa', 'Telepon', 'xss_clean');
		$this->form_validation->set_rules('hpsiswa', 'HP', 'xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'xss_clean');
		$this->form_validation->set_rules('tinggalbersama', 'Tinggal Dengan', 'xss_clean');
		$this->form_validation->set_rules('moda', 'Moda Transportasi', 'xss_clean');

		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$panggilan = $p['panggilan'];
			$nisn = $p['nisn'];
			$nik = $p['nik'];
			$kelamin = $p['kelamin'];
			$suku = $p['suku'];
			$warga = $p['warga'];
			$anakke = $p['anakke'];
			$jumlahsaudara = $p['jumlahsaudara'];
			$statusanak = $p['statusanak'];
			$jumlahkandung = $p['jumlahkandung'];
			$jumlahtiri = $p['jumlahtiri'];
			$jumlahangkat = $p['jumlahangkat'];
			$isyatim = $p['isyatim'];
			$bahasa = $p['bahasa'];
			$alamatsiswa = $p['alamatsiswa'];
			$kelurahan = $p['kelurahan'];
			$kecamatan = $p['kecamatan'];
			$kodepossiswa = $p['kodepossiswa'];
			$jarak = $p['jarak'];
			$telponsiswa = $p['telponsiswa'];
			$hpsiswa = $p['hpsiswa'];
			$email = $p['email'];
			$tinggalbersama = $p['tinggalbersama'];
			$moda = $p['moda'];
			$d_simpan2 = array(
				'panggilan' 		=> $panggilan,
				'nisn' 				=> $nisn,
				'nik' 				=> $nik,
				'kelamin' 			=> $kelamin,
				'suku' 				=> $suku,
				'agama'				=> 'ISLAM',
				'warga' 			=> $warga,
				'anakke' 			=> $anakke,
				'jumlahsaudara' 	=> $jumlahsaudara,
				'statusanak' 		=> $statusanak,
				'jumlahkandung' 	=> $jumlahkandung,
				'jumlahtiri' 		=> $jumlahtiri,
				'jumlahangkat' 		=> $jumlahangkat,
				'isyatim' 			=> $isyatim,
				'bahasa' 			=> $bahasa,
				'alamatsiswa' 		=> $alamatsiswa,
				'kelurahan'			=> $kelurahan,
				'kecamatan'			=> $kecamatan,
				'kodepossiswa'		=> $kodepossiswa,
				'jarak' 			=> $jarak,
				'telponsiswa' 		=> $telponsiswa,
				'hpsiswa' 			=> $hpsiswa,
				'emailsiswa' 		=> $email,
				'tinggal' 			=> $tinggalbersama,
				'modatransportasi'	=> $moda,
			);
			$this->db->where('replid', $replid);
			$this->db->update('calonsiswa', $d_simpan2);
			echo $this->db->affected_rows() + 1;
		}
	}

	public function simpan3()
	{
		$this->form_validation->set_rules('asal', 'Asal Sekolah', 'xss_clean');
		$this->form_validation->set_rules('noijazah', 'Nomor Ijazah', 'xss_clean');
		$this->form_validation->set_rules('tglijazah', 'Tanggal Ijazah', 'xss_clean');
		$this->form_validation->set_rules('lamabelajar', 'Lama Belajar', 'xss_clean');
		$this->form_validation->set_rules('sekolahsebelumnya', 'Sekolah Sebelumnya', 'xss_clean');
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$asal = $p['asal'];
			$nomer = $p['noijazah'];
			$tanggal = $p['tglijazah'];
			$lamabelajar = $p['lamabelajar'];
			$sekolahsebelumnya = $p['sekolahsebelumnya'];
			$d_simpan3 = array(
				'sekolahasal' 	=> $asal,
				'noijazah'		=> $nomer,
				'tglijazah'		=> $tanggal,
				'lamabelajar'		=> $lamabelajar,
				'sekolahsebelumnya'		=> $sekolahsebelumnya,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_sekolahasal', $d_simpan3);
			echo $this->db->affected_rows() + 1;
		}
	}

	public function simpan4()
	{
		$this->form_validation->set_rules('golongandarah', 'Golongan Darah', 'xss_clean');
		$this->form_validation->set_rules('bb', 'Berat Badan', 'xss_clean');
		$this->form_validation->set_rules('tb', 'Tanggal Ijazah', 'xss_clean');
		$this->form_validation->set_rules('kelainanjasmani', 'Kelainan Jasmani', 'xss_clean');
		$this->form_validation->set_rules('riwayatsakit', 'Riwayat Sakit', 'xss_clean');
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$kelainanjasmani = $p['kelainanjasmani'];
			$riwayat = $p['riwayatsakit'];
			$golongan = $p['golongandarah'];
			$bb = $p['bb'];
			$tb = $p['tb'];
			$d_simpan4 = array(
				'golongandarah' 	=> $golongan,
				'bb'				=> $bb,
				'tb'				=> $tb,
				'kelainanjasmani'	=> $kelainanjasmani,
				'riwayatsakit'		=> $riwayat,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_kesehatan', $d_simpan4);
			echo $this->db->affected_rows() + 1;
		}
	}
	public function simpan5()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('statusayah', 'Status Ayah', 'xss_clean');
		$this->form_validation->set_rules('namaayah', 'Nama Ayah', 'xss_clean');
		$this->form_validation->set_rules('tmpayah', 'Tempat Lahir Ayah', 'xss_clean');
		$this->form_validation->set_rules('tgllahirayah', 'Tanggal Lahir Ayah', 'xss_clean');
		$this->form_validation->set_rules('wargaayah', 'Warga Ayah', 'xss_clean');
		$this->form_validation->set_rules('teleponayah', 'Telepon Ayah', 'xss_clean');
		$this->form_validation->set_rules('wa_ayah', 'No Handphone Ayah', 'xss_clean');
		$this->form_validation->set_rules('email_ayah', 'Email Ayah', 'xss_clean');
		$this->form_validation->set_rules('pendidikanayah', 'Pendidikan Ayah', 'xss_clean');
		$this->form_validation->set_rules('jurusanayah', 'Jurusan Ayah', 'xss_clean');
		$this->form_validation->set_rules('sekolahayah', 'Sekolah/Universitas Ayah', 'xss_clean');
		$this->form_validation->set_rules('pekerjaanayah', 'Pekerjaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('namaperusahaanayah', 'Nama Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('jabatanayah', 'Jabatan Ayah', 'xss_clean');
		$this->form_validation->set_rules('alamatperusahaanayah', 'Alamat Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('notelpperusahaanayah', 'No Telp Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('nofaxperusahaanayah', 'No Fax Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('emailperusahaanayah', 'Email Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('kotaperusahaanayah', 'Kota Perusahaan Ayah', 'xss_clean');
		$this->form_validation->set_rules('penghasilanayah', 'Penghasilan Ayah', 'xss_clean');
		$this->form_validation->set_rules('alamatayah', 'Alamat Ayah', 'xss_clean');
		$this->form_validation->set_rules('kelurahanayah', 'Kelurahan Ayah', 'xss_clean');
		$this->form_validation->set_rules('kecamatanayah', 'Kecamatan Ayah', 'xss_clean');
		$this->form_validation->set_rules('kodeposayah', 'Kode Pos Ayah', 'xss_clean');
		$this->form_validation->set_rules('keteranganhidupayah', 'Keterangan Hidup Ayah', 'xss_clean');
		$this->form_validation->set_rules('statusibu', 'Status Ibu', 'xss_clean');
		$this->form_validation->set_rules('namaibu', 'Nama Ibu', 'xss_clean');
		$this->form_validation->set_rules('tmpibu', 'Tempat Lahir Ibu', 'xss_clean');
		$this->form_validation->set_rules('tgllahiribu', 'Tanggal Lahir Ibu', 'xss_clean');
		$this->form_validation->set_rules('wargaibu', 'Warga Ibu', 'xss_clean');
		$this->form_validation->set_rules('teleponibu', 'Telepon Ibu', 'xss_clean');
		$this->form_validation->set_rules('wa_ibu', 'No Handphone Ibu', 'xss_clean');
		$this->form_validation->set_rules('pendidikanibu', 'Pendidikan Ibu', 'xss_clean');
		$this->form_validation->set_rules('jurusanibu', 'Jurusan Ibu', 'xss_clean');
		$this->form_validation->set_rules('sekolahibu', 'Sekolah/Universitas Ibu', 'xss_clean');
		$this->form_validation->set_rules('pekerjaanibu', 'Pekerjaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('namaperusahaanibu', 'Nama Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('jabatanibu', 'Jabatan Ibu', 'xss_clean');
		$this->form_validation->set_rules('alamatperusahaanibu', 'Alamat Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('notelpperusahaanibu', 'No Telp Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('nofaxperusahaanibu', 'No Fax Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('emailperusahaanibu', 'Email Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('kotaperusahaanibu', 'Kota Perusahaan Ibu', 'xss_clean');
		$this->form_validation->set_rules('penghasilanibu', 'Penghasilan Ibu', 'xss_clean');
		$this->form_validation->set_rules('alamatibu', 'Alamat Ibu', 'xss_clean');
		$this->form_validation->set_rules('kelurahanibu', 'Kelurahan Ibu', 'xss_clean');
		$this->form_validation->set_rules('kecamatanibu', 'Kecamatan Ibu', 'xss_clean');
		$this->form_validation->set_rules('kodeposibu', 'Kode Pos Ibu', 'xss_clean');
		$this->form_validation->set_rules('keteranganhidupibu', 'Keterangan Hidup Ibu', 'xss_clean');

		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$statusayah = $p['statusayah'];
			$namaayah = $p['namaayah'];
			$tmpayah = $p['tmpayah'];
			$tgllahirayah = $p['tgllahirayah'];
			$wargaayah = $p['wargaayah'];
			$teleponayah = $p['teleponayah'];
			$wa_ayah = $p['wa_ayah'];
			$email_ayah = $p['email_ayah'];
			$pendidikanayah = $p['pendidikanayah'];
			$jurusanayah = $p['jurusanayah'];
			$sekolahayah = $p['sekolahayah'];
			$pekerjaanayah = $p['pekerjaanayah'];
			$namaperusahaanayah = $p['namaperusahaanayah'];
			$jabatanayah = $p['jabatanayah'];
			$alamatperusahaanayah = $p['alamatperusahaanayah'];
			$notelpperusahaanayah = $p['notelpperusahaanayah'];
			$nofaxperusahaanayah = $p['nofaxperusahaanayah'];
			$emailperusahaanayah = $p['emailperusahaanayah'];
			$kotaperusahaanayah = $p['kotaperusahaanayah'];
			$penghasilanayah = $p['penghasilanayah'];
			$alamatayah = $p['alamatayah'];
			$kelurahanayah = $p['kelurahanayah'];
			$kecamatanayah = $p['kecamatanayah'];
			$kodeposayah = $p['kodeposayah'];
			$kota_ayah = $p['kota_ayah'];
			$keteranganhidupayah = $p['keteranganhidupayah'];

			$statusibu = $p['statusibu'];
			$namaibu = $p['namaibu'];
			$tmpibu = $p['tmpibu'];
			$tgllahiribu = $p['tgllahiribu'];
			$wargaibu = $p['wargaibu'];
			$teleponibu = $p['teleponibu'];
			$wa_ibu = $p['wa_ibu'];
			$email_ibu = $p['email_ibu'];
			$pendidikanibu = $p['pendidikanibu'];
			$jurusanibu = $p['jurusanibu'];
			$sekolahibu = $p['sekolahibu'];
			$pekerjaanibu = $p['pekerjaanibu'];
			$namaperusahaanibu = $p['namaperusahaanibu'];
			$jabatanibu = $p['jabatanibu'];
			$alamatperusahaanibu = $p['alamatperusahaanibu'];
			$notelpperusahaanibu = $p['notelpperusahaanibu'];
			$nofaxperusahaanibu = $p['nofaxperusahaanibu'];
			$emailperusahaanibu = $p['emailperusahaanibu'];
			$kotaperusahaanibu = $p['kotaperusahaanibu'];
			$penghasilanibu = $p['penghasilanibu'];
			$alamatibu = $p['alamatibu'];
			$kelurahanibu = $p['kelurahanibu'];
			$kecamatanibu = $p['kecamatanibu'];
			$kodeposibu = $p['kodeposibu'];
			$kota_ibu = $p['kota_ibu'];
			$keteranganhidupibu = $p['keteranganhidupibu'];


			$d_simpan5 = array(
				'statusayah'       => $statusayah,
				'namaayah'          => $namaayah,
				'tmpayah' 		   => $tmpayah,
				'tgllahirayah'     => $tgllahirayah,
				'wargaayah'        => $wargaayah,
				'teleponayah'          => $teleponayah,
				'wa_ayah'          => $wa_ayah,
				'email_ayah'          => $email_ayah,
				'pendidikanayah'      => $pendidikanayah,
				'jurusanayah'      => $jurusanayah,
				'sekolahayah'      => $sekolahayah,
				'pekerjaanayah'    => $pekerjaanayah,
				'namaperusahaanayah' => $namaperusahaanayah,
				'jabatanayah'      => $jabatanayah,
				'alamatperusahaanayah' => $alamatperusahaanayah,
				'notelpperusahaanayah' => $notelpperusahaanayah,
				'nofaxperusahaanayah' => $nofaxperusahaanayah,
				'emailperusahaanayah' => $emailperusahaanayah,
				'kotaperusahaanayah' => $kotaperusahaanayah,
				'penghasilanayah'  => $penghasilanayah,
				'alamatayah'       => $alamatayah,
				'kelurahanayah'    => $kelurahanayah,
				'kecamatanayah'    => $kecamatanayah,
				'kodeposayah'      => $kodeposayah,
				'kota_ayah'      => $kota_ayah,
				'keteranganhidupayah'      => $keteranganhidupayah,


				'statusibu'        => $statusibu,
				'namaibu'          => $namaibu,
				'tmpibu'    	   => $tmpibu,
				'tgllahiribu'      => $tgllahiribu,
				'wargaibu'    	   => $wargaibu,
				'teleponibu'           => $teleponibu,
				'wa_ibu'           => $wa_ibu,
				'email_ibu'           => $email_ibu,
				'pendidikanibu'    => $pendidikanibu,
				'jurusanibu'       => $jurusanibu,
				'sekolahibu'       => $sekolahibu,
				'pekerjaanibu'     => $pekerjaanibu,
				'namaperusahaanibu' => $namaperusahaanibu,
				'jabatanibu'       => $jabatanibu,
				'alamatperusahaanibu' => $alamatperusahaanibu,
				'notelpperusahaanibu' => $notelpperusahaanibu,
				'nofaxperusahaanibu' => $nofaxperusahaanibu,
				'emailperusahaanibu' => $emailperusahaanibu,
				'alamatperusahaanibu' => $alamatperusahaanibu,
				'kotaperusahaanibu'   => $kotaperusahaanibu,
				'penghasilanibu'  => $penghasilanibu,
				'alamatibu'       => $alamatibu,
				'kelurahanibu'    => $kelurahanibu,
				'kecamatanibu'    => $kecamatanibu,
				'kodeposibu'      => $kodeposibu,
				'kota_ibu'      => $kota_ibu,
				'keteranganhidupibu'      => $keteranganhidupibu,

			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_ortu', $d_simpan5);
			echo $this->db->affected_rows() + 1;
		} else {
			$errors = array();
			foreach ($this->input->post() as $field => $value) {
				if (form_error($field)) {
					$errors[$field] = form_error($field);
				}
			}
			echo json_encode($errors);
		}
	}

	public function simpan6()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('namawali', 'Nama Wali', 'xss_clean');
		$this->form_validation->set_rules('tmpwali', 'Tempat Lahir Wali', 'xss_clean');
		$this->form_validation->set_rules('tgllahirwali', 'Tanggal Lahir Wali', 'xss_clean');
		$this->form_validation->set_rules('wargawali', 'Warga Wali', 'xss_clean');
		$this->form_validation->set_rules('teleponwali', 'Telepon Wali', 'xss_clean');
		$this->form_validation->set_rules('wa_wali', 'No Handphone Wali', 'xss_clean');
		$this->form_validation->set_rules('pendidikanwali', 'Pendidikan Wali', 'xss_clean');
		$this->form_validation->set_rules('jurusanwali', 'Jurusan Wali', 'xss_clean');
		$this->form_validation->set_rules('sekolahwali', 'Sekolah/Universitas Wali', 'xss_clean');
		$this->form_validation->set_rules('pekerjaanwali', 'Pekerjaan Wali', 'xss_clean');
		$this->form_validation->set_rules('namaperusahaanwali', 'Nama Perusahaan Wali', 'xss_clean');
		$this->form_validation->set_rules('jabatanwali', 'Jabatan Wali', 'xss_clean');
		$this->form_validation->set_rules('alamatperusahaanwali', 'Alamat Perusahaan Wali', 'xss_clean');
		$this->form_validation->set_rules('kotaperusahaanwali', 'Kota Perusahaan Wali', 'xss_clean');
		$this->form_validation->set_rules('penghasilanwali', 'Penghasilan Wali', 'xss_clean');
		$this->form_validation->set_rules('alamatwali', 'Alamat Wali', 'xss_clean');
		$this->form_validation->set_rules('kelurahanwali', 'Kelurahan Wali', 'xss_clean');
		$this->form_validation->set_rules('kecamatanwali', 'Kecamatan Wali', 'xss_clean');
		$this->form_validation->set_rules('kodeposwali', 'Kode Pos Wali', 'xss_clean');
		$this->form_validation->set_rules('kotawali', 'Kota Wali', 'xss_clean');
		$this->form_validation->set_rules('keteranganhidupwali', 'Keterangan Hidup Wali', 'xss_clean');

		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$namawali = $p['namawali'];
			$tmpwali = $p['tmpwali'];
			$tgllahirwali = $p['tgllahirwali'];
			$wargawali = $p['wargawali'];
			$teleponwali = $p['teleponwali'];
			$wa_wali = $p['wa_wali'];
			$pendidikanwali = $p['pendidikanwali'];
			$jurusanwali = $p['jurusanwali'];
			$sekolahwali = $p['sekolahwali'];
			$pekerjaanwali = $p['pekerjaanwali'];
			$namaperusahaanwali = $p['namaperusahaanwali'];
			$jabatanwali = $p['jabatanwali'];
			$alamatperusahaanwali = $p['alamatperusahaanwali'];
			$kotaperusahaanwali = $p['kotaperusahaanwali'];
			$penghasilanwali = $p['penghasilanwali'];
			$alamatwali = $p['alamatwali'];
			$kelurahanwali = $p['kelurahanwali'];
			$kecamatanwali = $p['kecamatanwali'];
			$kodeposwali = $p['kodeposwali'];
			$kotawali = $p['kotawali'];
			$keteranganhidupwali = $p['keteranganhidupwali'];

			$d_simpan6 = array(
				'namawali'          => $namawali,
				'tmpwali'    	  => $tmpwali,
				'tgllahirwali'     => $tgllahirwali,
				'wargawali'    	 => $wargawali,
				'teleponwali'          => $teleponwali,
				'wa_wali'          => $wa_wali,
				'pendidikanwali'   => $pendidikanwali,
				'jurusanwali'      => $jurusanwali,
				'sekolahwali'      => $sekolahwali,
				'pekerjaanwali'    => $pekerjaanwali,
				'namaperusahaanwali' => $namaperusahaanwali,
				'jabatanwali'      => $jabatanwali,
				'alamatperusahaanwali' => $alamatperusahaanwali,
				'kotaperusahaanwali' => $kotaperusahaanwali,
				'penghasilanwali'  => $penghasilanwali,
				'alamatwali'       => $alamatwali,
				'kelurahanwali'    => $kelurahanwali,
				'kecamatanwali'    => $kecamatanwali,
				'kodeposwali'      => $kodeposwali,
				'kotawali'      => $kotawali,
				'keteranganhidupwali'      => $keteranganhidupwali,

			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_ortu', $d_simpan6);
			echo $this->db->affected_rows() + 1;
		} else {
			echo 'validasi';
		}
	}



	public function simpan7()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('statusrumahayah', 'Status Rumah Ayah', 'xss_clean');
		$this->form_validation->set_rules('jumlahhajiayah', 'Jumlah Haji Ayah', 'numeric|xss_clean');
		$this->form_validation->set_rules('sholatdiayah', 'Sholat Di Ayah', 'xss_clean');
		$this->form_validation->set_rules('organisasiayah', 'Organisasi Ayah', 'xss_clean');
		$this->form_validation->set_rules('bacaanayah', 'Bacaan Islam Ayah', 'xss_clean');
		$this->form_validation->set_rules('kursusmauayah', 'Kursus Bersedia Ayah', 'xss_clean');
		$this->form_validation->set_rules('statusbacaquranayah', 'Status Membaca Alquran Ayah', 'xss_clean');
		$this->form_validation->set_rules('pendidikanagamaayah', 'Pendidikan Agama Ayah', 'xss_clean');
		$this->form_validation->set_rules('bahasaasingayah', 'Bahasa Asing Ayah', 'xss_clean');
		$this->form_validation->set_rules('asaldaerahayah', 'Suku Ayah', 'xss_clean');
		$this->form_validation->set_rules('jaraktempatkerjaayah', 'Jarak Ayah', 'xss_clean');
		$this->form_validation->set_rules('modakerjaayah', 'Moda Transportasi Ayah', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$statusrumahayah = $p['statusrumahayah'];
			$jumlahhajiayah = $p['jumlahhajiayah'];
			$sholatdiayah = $p['sholatdiayah'];
			$organisasiayah = $p['organisasiayah'];
			$bacaanayah = $p['bacaanayah'];
			$kursusmauayah = $p['kursusmauayah'];
			$statusbacaquranayah = $p['statusbacaquranayah'];
			$pendidikanagamaayah = $p['pendidikanagamaayah'];
			$bahasaasingayah = $p['bahasaasingayah'];
			$asaldaerahayah = $p['asaldaerahayah'];
			$jaraktempatkerjaayah = $p['jaraktempatkerjaayah'];
			$modakerjaayah = $p['modakerjaayah'];


			$d_simpan7 = array(
				'statusrumahayah' 		=> $statusrumahayah,
				'jumlahhajiayah'		=> $jumlahhajiayah,
				'sholatdiayah' 			=> $sholatdiayah,
				'organisasiayah'		=> $organisasiayah,
				'bacaanayah'			=> $bacaanayah,
				'kursusmauayah'			=> $kursusmauayah,
				'statusbacaquranayah' 	=> $statusbacaquranayah,
				'pendidikanagamaayah'	=> $pendidikanagamaayah,
				'bahasaasingayah'		=> $bahasaasingayah,
				'asaldaerahayah'		=> $asaldaerahayah,
				'jaraktempatkerjaayah'	=> $jaraktempatkerjaayah,
				'modakerjaayah' 		=> $modakerjaayah,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_ortutambah', $d_simpan7);
			echo $this->db->affected_rows() + 1;
		} else {
			echo 'validasi';
		}
	}
	public function simpan8()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('statusrumahibu', 'Status Rumah ibu', 'xss_clean');
		$this->form_validation->set_rules('jumlahhajiibu', 'Jumlah Haji ibu', 'numeric|xss_clean');
		$this->form_validation->set_rules('sholatdiibu', 'Sholat Di ibu', 'xss_clean');
		$this->form_validation->set_rules('organisasiibu', 'Organisasi ibu', 'xss_clean');
		$this->form_validation->set_rules('bacaanibu', 'Bacaan Islam ibu', 'xss_clean');
		$this->form_validation->set_rules('kursusmauibu', 'Kursus Bersedia ibu', 'xss_clean');
		$this->form_validation->set_rules('statusbacaquranibu', 'Status Membaca Alquran ibu', 'xss_clean');
		$this->form_validation->set_rules('pendidikanagamaibu', 'Pendidikan Agama ibu', 'xss_clean');
		$this->form_validation->set_rules('bahasaasingibu', 'Bahasa Asing ibu', 'xss_clean');
		$this->form_validation->set_rules('asaldaerahibu', 'Suku ibu', 'xss_clean');
		$this->form_validation->set_rules('jaraktempatkerjaibu', 'Jarak ibu', 'xss_clean');
		$this->form_validation->set_rules('modakerjaibu', 'Moda Transportasi ibu', 'xss_clean');
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$statusrumahibu = $p['statusrumahibu'];
			$jumlahhajiibu = $p['jumlahhajiibu'];
			$sholatdiibu = $p['sholatdiibu'];
			$organisasiibu = $p['organisasiibu'];
			$bacaanibu = $p['bacaanibu'];
			$kursusmauibu = $p['kursusmauibu'];
			$statusbacaquranibu = $p['statusbacaquranibu'];
			$pendidikanagamaibu = $p['pendidikanagamaibu'];
			$bahasaasingibu = $p['bahasaasingibu'];
			$asaldaerahibu = $p['asaldaerahibu'];
			$jaraktempatkerjaibu = $p['jaraktempatkerjaibu'];
			$modakerjaibu = $p['modakerjaibu'];


			$d_simpan8 = array(
				'statusrumahibu' 		=> $statusrumahibu,
				'jumlahhajiibu'		=> $jumlahhajiibu,
				'sholatdiibu' 			=> $sholatdiibu,
				'organisasiibu'		=> $organisasiibu,
				'bacaanibu'			=> $bacaanibu,
				'kursusmauibu'			=> $kursusmauibu,
				'statusbacaquranibu' 	=> $statusbacaquranibu,
				'pendidikanagamaibu'	=> $pendidikanagamaibu,
				'bahasaasingibu'		=> $bahasaasingibu,
				'asaldaerahibu'		=> $asaldaerahibu,
				'jaraktempatkerjaibu'	=> $jaraktempatkerjaibu,
				'modakerjaibu' 		=> $modakerjaibu,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_ortutambah', $d_simpan8);
			echo $this->db->affected_rows() + 1;
		} else {
			echo 'validasi';
		}
	}
	public function simpan9()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('seni', 'Seni', 'xss_clean');
		$this->form_validation->set_rules('olahraga', 'Olahraga', 'xss_clean');
		$this->form_validation->set_rules('organisasi', 'Organisasi', 'xss_clean');
		$this->form_validation->set_rules('hobi', 'Hobi', 'xss_clean');
		$this->form_validation->set_rules('cita', 'Cita', 'xss_clean');

		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$seni = $p['seni'];
			$olahraga = $p['olahraga'];
			$organisasi = $p['organisasi'];
			$hobi = $p['hobi'];
			$cita = $p['cita'];


			$d_simpan9 = array(
				'seni' 			=> $seni,
				'olahraga' 			=> $olahraga,
				'organisasi' 			=> $organisasi,
				'hobi' 			=> $hobi,
				'cita' 			=> $cita,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_tambah', $d_simpan9);
			echo $this->db->affected_rows() + 1;
		} else {
			echo 'validasi';
		}
	}
	public function simpan10()
	{
		$this->form_validation->set_rules('replid', '', 'xss_clean');
		$this->form_validation->set_rules('jenis_penerimaan', 'Jenis Penerimaan', 'xss_clean');
		$this->form_validation->set_rules('p1e', 'Pertanyaan 1 External', 'xss_clean');
		$this->form_validation->set_rules('p2e', 'Pertanyaan 2 External', 'xss_clean');
		$this->form_validation->set_rules('p3e', 'Pertanyaan 3 External', 'xss_clean');
		$this->form_validation->set_rules('p4e', 'Pertanyaan 4 External', 'xss_clean');
		$this->form_validation->set_rules('p5e', 'Pertanyaan 5 External', 'xss_clean');
		$this->form_validation->set_rules('p6e', 'Pertanyaan 6 External', 'xss_clean');
		$this->form_validation->set_rules('p7e', 'Pertanyaan 7 External', 'xss_clean');
		$this->form_validation->set_rules('p8e', 'Pertanyaan 8 External', 'xss_clean');


		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$replid = $p['replid'];
			$jenis_penerimaan = $p['jenis_penerimaan'];
			$p1e = $p['p1e'];
			$p2e = $p['p2e'];
			$p3e = $p['p3e'];
			$p4e = $p['p4e'];
			$p5e = $p['p5e'];
			$p6e = $p['p6e'];
			$p7e = $p['p7e'];
			$p8e = $p['p8e'];



			$d_simpan10 = array(
				'jenis_penerimaan' => $jenis_penerimaan,
				'p1e' => $p1e,
				'p2e' => $p2e,
				'p3e' => $p3e,
				'p4e' => $p4e,
				'p5e' => $p5e,
				'p6e' => $p6e,
				'p7e' => $p7e,
				'p8e' => $p8e,
			);
			$this->db->where('idcalon', $replid);
			$this->db->update('calonsiswa_latarbelakang', $d_simpan10);
			echo $this->db->affected_rows() + 1;
		} else {
			echo 'validasi';
		}
	}


	private function cekStatusData($replid)
	{
		$q = $this->db->get_where('calonsiswa', ['replid' => $replid])->row_array();
		if ($q['status_data'] == 0) {
			$pro = 4;
		} else {
			$pro = $q['is_proses'];
		}
		return $pro;
	}
	public function old_img()
	{
		$replid = $this->uri->segment(3);
		$r = $this->db->get('calon_siswa', ['replid' => $replid])->row_array();
		echo $r['foto'];
	}

	public function upload_foto()
	{
		$p = $this->input->post();
		$replid = $p['replid'];
		$config['upload_path'] = './upload/foto';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$array = array(
				'error'   				=> true,
				'd_error' 				=> $error = $this->upload->display_errors(),
			);
			echo json_encode($array);
		} else {
			$data = $this->upload->data();
			$this->db->where(['replid' => $replid]);
			$this->db->update('calonsiswa', ['foto' => $data['file_name']]);
			echo json_encode(['success' => $data['file_name']]);
		}
	}
}
