<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/*
*  @author   : Sujak Amir Sarifudin
*  date      : Mei 2023
*  helper untuk PPDB
*  https://istiqamahone.id
*/

function tanggal_indo($tanggal)
{
    if ($tanggal == '0000-00-00') {
        return "Tidak Ada";
    }

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
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function usia($tgllahir)
{
    $tanggal_lahir_obj = new DateTime($tgllahir);
    $sekarang = new DateTime();
    $selisih = $tanggal_lahir_obj->diff($sekarang);
    return $selisih->y . ' tahun, ' . $selisih->m . ' bulan';
}

function tanggal_lengkap($tanggal)
{
    $day = date('D', strtotime($tanggal));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
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
    $split = explode('-', $tanggal);
    return $dayList[$day] . ', ' . $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function getProsesPenerimaan($idproses)
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('prosespenerimaan', ['replid' => $idproses]);
    $cek = $result->num_rows();
    $hasil = $result->row_array();
    if ($cek > 0) {
        return $hasil['nama'];
    } else {
        return 'not found';
    }
}

function getPdf($idcalon, $kategori)
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('upload_hasil', ['idcalon' => $idcalon, 'kategori' => $kategori]);
    if ($result->num_rows() > 0) {
        $r = $result->row_array();
        $hasil = $r['fileupload'];
    } else {
        $hasil = '';
    }
    return $hasil;
}

function getDeskripsi($idcalon, $kategori)
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('upload_hasil', ['idcalon' => $idcalon, 'kategori' => $kategori]);
    if ($result->num_rows() > 0) {
        $r = $result->row_array();
        $hasil = $r['deskripsi'];
    } else {
        $hasil = '';
    }
    return $hasil;
}

function getImgFrontend($nama)
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('frontend_upload', ['nama' => $nama])->row_array();
    return $result['upload_filename'];
}

function getImgCalon($replid)
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('calonsiswa', ['replid' => $replid])->row_array();
    return $result['foto'];
}

function status_update($idcalon, $proses)
{
    $CI = &get_instance();
    $CI->load->database();
    $CI->db->where(['replid' => $idcalon]);
    $CI->db->update('calonsiswa', ['is_proses' => $proses]);
}

function getPrefix()
{
    $CI = &get_instance();
    $CI->load->database();
    $result = $CI->db->get_where('setting', ['nama' => 'prefix'])->row_array();
    return strtoupper($result['nilai']);
}

function hitungPendaftar($departemen, $is_baru)
{
    $CI = &get_instance();
    // $pre = getPrefix();
    $CI->load->database();
    // $CI->db->like('nopendaftaran',$pre,'after');
    $pendaftar = $CI->db->get_where('calonsiswa', ['departemen' => $departemen, 'is_baru' => $is_baru, 'aktif' => '1', 'tahunmasuk' => cekSetting('tahun')]);
    return $pendaftar->num_rows();
}

function kirimEmail($tujuan, $subyek, $konten, $nama)
{
    $CI = &get_instance();
    $CI->load->library('Phpmailer_lib');
    $mail = $CI->phpmailer_lib->load();
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'itypaitb@gmail.com';
    $mail->Password = 'speyblwfnjatwdvg';
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;
    $mail->setFrom('no-reply@istiqamah.com', $nama);
    $mail->addReplyTo('no-reply@istiqamah.com', 'no-reply');
    $mail->addAddress($tujuan);
    // $mail->addAttachment('assets/img/bayar.jpg', 'pembayaran.jpg');
    $mail->Subject = $subyek;
    $mail->isHTML(true);
    $mail->Body = $konten;
    if (!$mail->send()) {
        return 'gagal';
    } else {
        return 'ok';
    }
}

function pin()
{
    $pin = mt_rand(1, 9);
    for ($i = 0; $i < 5; $i++) {
        $pin .= mt_rand(0, 9);
    }
    return $pin;
}

function cekSetting($param)
{
    $CI = &get_instance();
    $CI->load->database();
    $pendaftar = $CI->db->get_where('setting', ['nama' => $param])->row_array();
    return $pendaftar['nilai'];
}

function sisaKuota($replid)
{
    $CI = &get_instance();
    $pre = getPrefix();
    $CI->load->database();
    $kuota = $CI->db->get_where('prosespenerimaan', ['replid' => $replid, 'aktif' => 1])->row_array();
    $tot_kuota = $kuota['kuota'];
    $daftar_per_id = $CI->db->get_where('calonsiswa', ['idproses' => $replid, 'aktif' => 1])->num_rows();
    return $tot_kuota - $daftar_per_id;
}
