<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
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
		if (!$this->session->userdata('userLogin')) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('backend/frontend/list');
	}
	public function upload()
	{
		$nama = $this->uri->segment(3);
		$old_file = $this->input->post('old_file');
		$config['upload_path'] = './upload';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			// $error = $this->upload->display_errors();
			// echo $error;
			$array = array(
				'error'   				=> true,

			);
			echo json_encode($array);
		} else {
			$data = $this->upload->data();
			// echo "Upload successful!";
			if (isset($old_file)) {
				if (file_exists('./upload/' . $old_file))
					unlink('./upload/' . $old_file);
			}
			$this->db->where(['nama' => $nama]);
			$this->db->update('frontend_upload', ['upload_filename' => $data['file_name']]);
			echo json_encode(['success' => true]);
		}
	}

	public function oldFile()
	{
		$nama = $this->uri->segment(3);
		echo getImgFrontend($nama);
	}
}
