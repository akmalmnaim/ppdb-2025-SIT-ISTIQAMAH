<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
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
		$this->load->library('secure');
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		$data = array(
			'isi'		=> 'frontend/beranda',
		);
		$this->load->view('layout/frontend/template', $data, FALSE);
	}
	public function upload_ijazah($replid)
	{

		$config['upload_path'] = './upload/bukti_ijazah';
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
			$this->db->update('calonsiswa', ['file_ijazah' => $data['file_name']]);
			echo json_encode(['success' => $data['file_name']]);
		}
	}
	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama Pendaftar', 'required|xss_clean', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required|xss_clean', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('tanggal', 'Tanggal Lahir', 'required|xss_clean', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('kelamin', 'Kelamin', 'required', ['required' => '%s wajib dipilih']);
		$this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required|xss_clean', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('nowa', 'Nomor WA', 'required|xss_clean', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('email', 'Email Verifikasi', 'trim|required|valid_email|is_unique[calonsiswa.emailsiswa]', ['is_unique' => '%s sudah digunakan', 'required' => '%s wajib diisi']);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required', ['required' => '%s wajib diisi']);
		$this->form_validation->set_rules('password2', 'Password Konfirmasi', 'required|matches[password1]', ['matches' => 'Password tidak sesuai', 'required' => '%s wajib diisi']);

		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$nama = $p['nama'];
			$tempat = $p['tempat'];
			$tanggal = $p['tanggal'];
			$kelamin = $p['kelamin'];
			$nowa = $p['nowa'];
			$email = $p['email'];
			$is_alumni = $p['is_alumni'];
			$tahun_lulus = $p['tahun_lulus'];
			$asalsekolah = $p['asal_sekolah'];
			$password = $p['password1'];
			$jalur = $p['jalur'];
			$pin = pin();
			$kodever = $this->secure->encrypt_url($pin);
			$nopendaftaran = $this->getID();
			$data = array(
				'nama'				=> $nama,
				'tmplahir'			=> $tempat,
				'tgllahir'			=> $tanggal,
				'kelamin'			=> $kelamin,
				'asal_sekolah' => $asalsekolah,
				'emailsiswa'		=> $email,
				'is_alumni'		=> $is_alumni,
				'tahun_lulus'		=> $tahun_lulus,
				'pinsiswa'			=> $pin,
				'nowa'				=> $nowa,
				'password'			=> password_hash($password, PASSWORD_DEFAULT),
				'idproses'			=> $jalur,
				'kodever'			=> $kodever,
				'nopendaftaran'		=> $nopendaftaran,
				'tahunmasuk'		=> cekSetting('tahun'),
			);
			$this->db->insert('calonsiswa', $data);
			if ($this->db->affected_rows() > 0) {
				$query = $this->db->get_where('calonsiswa', ['emailsiswa' => $email])->row_array();
				$this->db->insert('calonsiswa_ortu', ['idcalon' => $query['replid']]);
				$this->db->insert('calonsiswa_kesehatan', ['idcalon' => $query['replid']]);
				$this->db->insert('calonsiswa_sekolahasal', ['idcalon' => $query['replid']]);
				$this->db->insert('calonsiswa_tambah', ['idcalon' => $query['replid']]);
				$this->db->insert('calonsiswa_ortutambah', ['idcalon' => $query['replid']]);
				$this->db->insert('calonsiswa_latarbelakang', ['idcalon' => $query['replid']]);
				$replid  = $query['replid'];
				$data = '
				<h2><i>Assalamu `alaikum warahmatullahi wabarakatuh.</i></h2>
				<p>Terima kasih sudah melakukan pendaftaran online di SIT Istiqamah YPAITB. Berikut ini adalah data diri anda: </p>
				<p>
				<table>
					<thead>
						<td style="width:200px;"></td>
						<td style="width:400px;"></td>
					</thead>
					<tbody>
						<tr>
							<td>No. Pendaftaran</td>
							<td>: ' . $nopendaftaran . $replid . '</td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>: ' . $nama . '</td>
						</tr>
						<tr>
							<td>Tempat, Tgl. Lahir</td>
							<td>: ' . $tempat . ', ' . $tanggal . '</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>: ' . $kelamin . '</td>
						</tr>
						<td>Sekolah Asal</td>
							<td>: ' . $asalsekolah . '</td>
						</tr>
						<tr>
							<td>Nomor WhatsApp</td>
							<td>: ' . $nowa . '</td>
						</tr>
						<tr>
							<td>Pembayaran Pendaftaran</td>
							<td>: Rp.500.000,-</td>
						</tr>
						<tr>
							<td>Rekening Pembayaran</td>
							<td>: Bank Syariah Indonesia (BSI) (Kode Bank: 451) <strong>733 1111 115 (Pendidikan Al Istiqamah Terpadu Yayasan)</strong></td>
						</tr>
						<tr>
							<td>Silahkan melakukan pembayaran agar dapat melanjutkan masuk kedalam akun pendaftaran untuk melengkapi biodata.</td>
						</tr>
					</tbody>
				</table>
				</p>
				<h2><a href="' . base_url("beranda/verifikasi/") . $kodever . '" target="_blank">KLIK UNTUK KONFIRMASI PENDAFTARAN</a> </h2>
				<br>
				<p>Hubungi: <strong> 081298781997 (WA)</strong> Jika ada Kesulitan</p>
				';
				$kirim = kirimEmail($email, 'Konfirmasi Pendaftaran', $data, 'PPDB SIT ISTIQAMAH BALIKPAPAN');
				if ($kirim == 'ok') {
					$this->session->set_flashdata('success', 'Terima kasih sudah mendaftar, silahkan cek email anda di: <b>' . $email . '</b> untuk verifikasi.');
					$this->upload_ijazah($replid);
					redirect('sukses');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengirim email konfirmasi. Silakan coba lagi.');
					redirect('daftar');
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal mendaftar. Silakan coba lagi.');
				redirect('daftar');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('daftar');
		}
	}

	private function getID()
	{
		$prefix = getPrefix();
		$nopendaftaran = sprintf($prefix . '%05s', $this->hitungPendaftar($prefix));
		return $nopendaftaran;
	}
	private function hitungPendaftar($pre)
	{
		$this->db->like('nopendaftaran', $pre, 'after');
		$result = $this->db->get('calonsiswa');
		return $result->num_rows() + 1;
	}

	public function sukses()
	{
		$this->load->view('frontend/sukses');
	}
	public function login()
	{
		$this->load->view('frontend/login');
	}

	public function pendaftaran()
	{
		$proses = $this->db->get_where('prosespenerimaan', ['aktif' => 1]);
		$data = array(
			'daftar'		=> cekSetting('pendaftaran'),
			'title'			=> 'Halaman Pendaftaran',
			'proses_jum'	=> $proses->num_rows(),
			'proses'		=> $proses->result(),
		);
		$this->load->view('frontend/daftar', $data, FALSE);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function proses()
	{
		$this->load->helper('security');
		$this->form_validation->set_rules('username', 'Nama User', 'required|xss_clean', ['required' => '%s belum diisi']);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|xss_clean', ['required' => '%s belum diisi']);
		if ($this->form_validation->run() == true) {
			$p = $this->input->post();
			$username = $p['username'];
			$password = $p['password'];
			if ($this->cekUser($username, $password) == true) {
				redirect('dashboard');
			} else {
				if ($this->cekpendaftar($username, $password) == true) {
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('gagal', '<strong>LOGIN GAGAL, </strong>Periksa lagi User dan Sandi anda.');
					redirect('login');
				}
			}
		} else {
			$this->session->set_flashdata('gagal', '<strong>LOGIN GAGAL, </strong>Periksa lagi User dan Sandi anda.');
			redirect('login');
		}
	}

	private function cekUser($username, $password)
	{
		$result = $this->db->get_where('login', ['login' => $username, 'aktif' => '1']);
		if ($result->num_rows() > 0) {
			$data_user = $result->row();
			$hashed = $data_user->password;
			if (password_verify($password, $hashed)) {
				$this->session->set_userdata('userLogin', $this->encryption->encrypt($username));
				$this->session->set_userdata('status', $this->encryption->encrypt($data_user->depart_status));
				$this->session->set_userdata('nama', $data_user->nama);
				updateLogin($username);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	private function cekPendaftar($username, $password)
	{
		$result = $this->db->get_where('calonsiswa', ['emailsiswa' => $username, 'is_verify' => '1']);
		if ($result->num_rows() > 0) {
			$data_user = $result->row();
			$hashed = $data_user->password;
			if (password_verify($password, $hashed)) {
				$this->session->set_userdata('userLogin', $this->encryption->encrypt($username));
				$this->session->set_userdata('status', $this->encryption->encrypt('2'));
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function verifikasi()
	{
		$this->load->library('secure');
		$kode = $this->security->xss_clean($this->uri->segment(3));
		if ($kode) {
			$pin = $this->secure->decrypt_url($kode);
			$result = $this->db->get_where('calonsiswa', ['pinsiswa' => $pin, 'is_verify' => '0']);
			if ($result->num_rows() > 0) {
				$this->db->where(['pinsiswa' => $pin]);
				$this->db->update('calonsiswa', ['is_verify' => '1', 'is_proses' => '1']);
				if ($this->db->affected_rows() > 0)
					$this->load->view('frontend/verifikasi');
			} else {
				$this->load->view('frontend/verifikasi');
			}
		}
	}
}
