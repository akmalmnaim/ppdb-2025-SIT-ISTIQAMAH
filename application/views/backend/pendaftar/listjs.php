<script type="text/javascript">
  $(document).ready(function() {

    $('#pagination').on('click', 'a', function(e) {
      e.preventDefault();
      var pageno = $(this).attr('data-ci-pagination-page');
      cari(pageno);
    });
  });

  cari(0);

  function cari(pagno) {
    let cari = $('[name="cari"]').val();
    let row = $('[name="rowper"]').val();
    let tahun = $('[name="tahun"]').val();
    let proses = $('[name="proses"]').val();

    $.ajax({
      url: '<?php echo base_url() ?>pendaftar/cari/' + pagno,
      type: 'POST',
      data: 'cari=' + cari + '&rowper=' + row + '&tahun=' + tahun + '&proses=' + proses,
      dataType: 'JSON',
      async: false,
      success: function(response) {
        $('#pagination').html(response.pagination);
        buatTabelnya(response.result, response.row);
      }
    });
  }

  function buatTabelnya(result, sno) {
    $('.tList').empty();
    var tr = '<div class="row">'
    for (index in result) {
      var replid = result[index].replid;
      var foto;
      if (result[index].foto == '') {
        foto = 'assets/img/student.png';
      } else {
        foto = 'upload/foto/' + result[index].foto;
      }
      var verifikasi;
      if (result[index].is_verify == '0') {
        verifikasi = '<i class="ph-x-circle fw-bold text-warning" title="Email Belum Terverifikasi"></i>';
      } else {
        verifikasi = '<i class="ph-check-circle fw-bold text-primary" title="Email Terverifikasi"></i>';
      }

      var up_w = '';
      var up_t = '';
      var up_p = '';
      if (result[index].up_wawancara) {
        if (result[index].up_wawancara != '')
          up_w = '<a href="<?= base_url('upload/uploadhasil/') ?>' + result[index].up_wawancara + '" target="_blank" class="text-muted me-2" data-bs-popup="tooltip" title="Lihat hasil wawancara">' +
          '<i class="ph-link me-2"></i> Hasil Wawancara' +
          '</a>';
      }
      if (result[index].up_ujian) {
        if (result[index].up_ujian != '')
          up_t = '<a href="<?= base_url('upload/uploadhasil/') ?>' + result[index].up_ujian + '" target="_blank" class="text-muted me-2" data-bs-popup="tooltip" title="Lihat hasil tes">' +
          '<i class="ph-link me-2"></i> Hasil Tes' +
          '</a>';
      }

      if (result[index].up_psikotes) {
        if (result[index].up_psikotes != '')
          up_p = '<a href="<?= base_url('upload/uploadhasil/') ?>' + result[index].up_psikotes + '" target="_blank" class="text-muted me-2" data-bs-popup="tooltip" title="Lihat hasil psikotes">' +
          '<i class="ph-link me-2"></i> Hasil Psikotes' +
          '</a>';
      }
      var ijazah = result[index].file_ijazah;
      var slip = result[index].slip_img;
      var status;
      var tbl_cek = '';
      switch (result[index].is_proses) {
        case '0':
          status = '<span class="fw-bold text-danger">Daftar [' + result[index].is_proses + ']</span>';
          break;
        case '1':
          status = '<span class="fw-bold text-warning">Verifikasi Email [' + result[index].is_proses + ']</span>';
          break;
        case '2':
          status = '<span class="fw-bold text-pink me-2">Upload Slip [' + result[index].is_proses + ']</span> <a title="Lihat Slip Pembayaran" href="javascript:lihatSlip(`' + slip + '`)"><i class="ph-eye text-muted"></i></a>';
          tbl_cek = '<a href="javascript:konfirmasi(`' + replid + '`)" class="text-muted me-2" data-bs-popup="tooltip" title="Konfirmasi Pembayaran">' +
            '<i class="ph-check-circle"></i>' +
            '</a>';
          break;
        case '3':
          status = '<span class="fw-bold text-success">Pembayaran Terverifikasi [' + result[index].is_proses + ']</span>';
          break;
        case '4':
          status = '<span class="fw-bold text-primary">Isi Biodata [' + result[index].is_proses + ']</span>';
          break;
        case '5':
          status = '<span class="fw-bold text-muted">Penetapan Jadwal [' + result[index].is_proses + ']</span>';
          break;
        case '6':
          status = '<span class="fw-bold text-muted">Upload Hasil [' + result[index].is_proses + ']</span>';
          break;
        case '10':
          status = '<span class="fw-bold text-muted">Diterima [' + result[index].is_proses + ']</span>';
          break;
        case '11':
          status = '<span class="fw-bold text-muted">Tidak Diterima [' + result[index].is_proses + ']</span>';
          break;
        case '12':
          status = '<span class="fw-bold text-muted">Mengundurkan Diri [' + result[index].is_proses + ']</span>';
          break;
        default:
          status = '';
          break;
      }
      var nop = result[index].nopendaftaran;
      if (result[index].nowa) {
        var nowa = result[index].nowa;
      }
      tr += '<div class="col-xl-4 col-sm-6">' +
        '<div class="card text-muted" style="background-image: url(<?= base_url(); ?>assets/backend/assets/images/backgrounds/panel_bg.png); background-size: contain;">' +
        '<div class="card-body px-0 py-0 text-center">' +
        '<div class="px-0 py-0 mb-3 bg-light text-muted">' +
        '<h6 class="mb-0 text-uppercase">' + result[index].nama + '</h6>' +
        '<span class="fw-bold">' + nop + '</span>' +
        '</div>' +
        '<div class="card-img-actions d-inline-block mb-3">' +
        '<img class="img-fluid rounded-circle" src="' + foto + '" width="170" height="170" alt="">' +
        '</div>' +
        '<div class="row text-center">' +
        '<div class="col-md-6 col-sm-6 text-end"><button onclick="formwawancara(`' + replid + '`)" class="btn btn-sm btn-info" title="Cetak Form Wawancara"><i class="ph-printer me-1"></i>Cetak Form</button></div>' +
        '<div class="col-md-6 col-sm-6 text-start"><button onclick="cetak(`' + replid + '`)" class="btn btn-sm btn-pink" title="Cetak Profil ' + result[index].nama + '"><i class="ph-printer me-1"></i>Profil</button></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Waktu Daftar</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + result[index].waktu_daftar + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Proses</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + result[index].nama + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><i class="ph-whatsapp-logo me-1"></i><small>(WA)</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small><a href="https://wa.me/+62' + nowa + '" target="_blank" >' + result[index].nowa + '</a></small></div>' +
        '</div>' +
        '<div class="row">' +
        // '<div class="col-md-4 col-sm-12 text-end"><small>Alumni</small></div>' +
        // '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + (result[index].tahun_lulus == 0 ? '-' : result[index].tahun_lulus) + '</small></div>' + '</small></div>' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Ortu Alumni</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + '<div class="col-md-8 col-sm-12 fw-bold text-start"><a title="Lihat Ijazah" href="javascript:lihatIjazah(`' + ijazah + '`)"><small>' + (result[index].tahun_lulus == 0 ? '-' : result[index].tahun_lulus) + '</small></a></div>' + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Asal</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + (result[index].asal_sekolah) + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Siswa</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + (result[index].is_baru === '0' ? 'Baru' : 'Pindahan') + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Verifikasi</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + verifikasi + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small>Status</small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + status + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small></small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + up_w + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small></small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + up_t + '</small></div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-4 col-sm-12 text-end"><small></small></div>' +
        '<div class="col-md-8 col-sm-12 fw-bold text-start"><small>' + up_p + '</small></div>' +
        '</div>' +
        '<div class="d-flex justify-content-center mt-2 bg-light card-footer">' +
        tbl_cek +

        '<a href="javascript:wawancara(`' + replid + '`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Atur Jadwal Wawancara dan Ujian ' + result[index].nama + '">' +
        '<i class="ph-calendar-check text-primary me-3"></i>' +
        '<a href="javascript:uploadhasil(`' + replid + '`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Upload Hasil Wawancara dan Ujian ' + result[index].nama + '">' +
        '<i class="ph-upload text-muted me-3"></i>' +
        // '<a href="javascript:cetak(`'+replid+'`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Cetak Profil '+result[index].nama+'">'+
        // '<i class="ph-printer me-3 text-success"></i>'+
        // '</a>'+
        '<a href="javascript:diterima(`' + replid + '`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Diterima PPDB untuk ' + result[index].nama + '">' +
        '<i class="ph-student me-3 text-success"></i>' +
        '</a>' +
        '<a href="javascript:tidak_diterima(`' + replid + '`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Tidak diterima PPDB untuk ' + result[index].nama + '">' +
        '<i class="ph-student me-3 text-danger"></i>' +
        '</a>' +
        '<a href="javascript:mengundurkan_diri(`' + replid + '`)" class="text-success fw-bold" data-bs-popup="tooltip" title="Mengundurkan diri PPDB untuk ' + result[index].nama + '">' +
        '<i class="ph-student me-3 text-warning"></i>' +
        '</a>' +
        '<a href="javascript:reset(`' + replid + '`)" data-bs-popup="tooltip" title="Reset Password">' +
        '<i class="ph-key text-danger me-3"></i>' +
        '</a>' +
        '<a href="javascript:hapus(`' + replid + '`)" data-bs-popup="tooltip" title="Hapus Pendaftar">' +
        '<i class="ph-trash text-muted"></i>' +
        '</a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    }
    tr += '</div>';
    $('.tList').append(tr);
  }

  function lihatIjazah(file) {
    if (file.length == 0) {
      alert('Belum ada ijazah');
    } else {
      window.open('<?= base_url('upload/bukti_ijazah/') ?>' + file, '_blank');
    }
  }

  function lihatSlip(file) {
    if (file.length == 0) {
      alert('Belum ada slip');
    } else {
      window.open('<?= base_url('upload/slip_bayar/') ?>' + file, '_blank');
    }
  }

  function diterima(replid) {
    if (confirm('Pendaftar ini akan diberi status DITERIMA di SIT Istiqamah YPAIT Balikpapan, YAKIN?')) {
      $.get('<?= base_url("pendaftar/diterima/") ?>' + replid, function(data, status) {
        if (data > 0)
          cari(0);
      });
    } else {

    }
  }

  function tidak_diterima(replid) {
    if (confirm('Pendaftar ini akan diberi status TIDAK DITERIMA di SIT Istiqamah YPAIT Balikpapan, YAKIN?')) {
      $.get('<?= base_url("pendaftar/tidak_diterima/") ?>' + replid, function(data, status) {
        if (data > 0)
          cari(0);
      });
    } else {

    }
  }

  function tidak_diterima(replid) {
    if (confirm('Pendaftar ini akan diberi status TIDAK DITERIMA di SIT Istiqamah YPAITB, YAKIN?')) {
      $.get('<?= base_url("pendaftar/mengundurkan_diri/") ?>' + replid, function(data, status) {
        if (data > 0)
          cari(0);
      });
    } else {

    }
  }

  function reset(replid) {
    if (confirm('Password pengguna ini akan di reset dengan password default: 12345, YAKIN?')) {
      $.get('<?= base_url("pendaftar/reset/") ?>' + replid, function(data, status) {
        if (data > 0)
          alert('Password berhasil direset');
      });
    } else {

    }
  }

  function konfirmasi(replid) {
    if (confirm('Anda akan melakukan konfirmasi pembayaran pendaftar, YAKIN?')) {
      $.get('<?= base_url("pendaftar/konfirmasi/") ?>' + replid, function(data, status) {
        cari(0);
      });
    } else {

    }
  }

  function hapus(replid) {
    if (confirm('Data untuk pendaftar ini akan di non-aktifkan, YAKIN?')) {
      $.get('<?= base_url("pendaftar/hapus/") ?>' + replid, function(data, status) {
        if (data > 0)
          cari(0);
      });
    } else {

    }
  }

  function wawancara(idcalon) {
    NewWin('<?= base_url('pendaftar/tampil/') ?>' + idcalon, 'Penjadwalan Wawancara', 600, 570);
  }

  function uploadhasil(idcalon) {
    NewWin('<?= base_url('pendaftar/upload_hasil/') ?>' + idcalon, 'Upload', 600, 500);
  }

  function cetak(idcalon) {
    NewWin('<?= base_url('pendaftar/cetak/') ?>' + idcalon, 'Upload', 900, 700);
  }

  function formwawancara(idcalon) {
    NewWin('<?= base_url() ?>pendaftar/formwawancara/' + idcalon, 'Upload', 900, 700);
  }
</script>