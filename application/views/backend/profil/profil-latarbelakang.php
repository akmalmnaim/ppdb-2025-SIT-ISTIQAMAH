<div class="row mt-3">
    <div class="mb-3">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Jenis Pendaftaran</label>
                <select class="form-select" name="jenis_penerimaan">
                    <option value="" <?php if (is_null($profil['jenis_penerimaan'])) {
                                            echo 'selected';
                                        } else {
                                            echo '';
                                        } ?>>Pilih</option>
                    <option value="1" <?php if ($profil['jenis_penerimaan'] == '1') {
                                            echo 'selected';
                                        } else {
                                            echo '';
                                        } ?>>Internal(Siswa SIT ISTIQAMAH, Sibling)</option>
                    <option value="2" <?php if ($profil['jenis_penerimaan'] == '2') {
                                            echo 'selected';
                                            echo '';
                                        } ?>>Eksternal(Selain dari kategori Internal)</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">1. Apa yang melatar belakangi (motivasi) Bapak/Ibu memasukkan putra/putri ke SDIT - SMPIT - SMAIT Istiqamah YPAIT Balikpapan?</label>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (!empty($profil['p1e'])) {
                            $p1e = explode(',', $profil['p1e']);
                        } else {
                            $p1e = array();
                        }
                        ?>
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Lokasi dekat dengan rumah">
                                    <label class="form-check-label">Lokasi dekat dengan rumah</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Prestasi murid dan sekolah yang bagus">
                                    <label class="form-check-label">Prestasi murid dan sekolah yang bagus</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Program pembinaan tahfizh dan tahsin Al-Qur’an">
                                    <label class="form-check-label">Program pembinaan tahfizh dan tahsin Al-Qur’an</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Program pembinaan prestasi olah raga">
                                    <label class="form-check-label">Program pembinaan prestasi olah raga</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Fasilitas yang lengkap">
                                    <label class="form-check-label">Fasilitas yang lengkap</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Pendidikan akhlak yang baik">
                                    <label class="form-check-label">Pendidikan akhlak yang baik</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Program pembinaan prestasi akademik">
                                    <label class="form-check-label">Program pembinaan prestasi akademik</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p1e" value="Program beasiswa prestasi dan siswa kurang mampu">
                                    <label class="form-check-label">Program beasiswa prestasi dan siswa kurang mampu</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lainnya_1" value="lainnya" id="checkbox_lainnya_1">
                                    <label class="form-check-label">Lainnya</label>
                                    <div id="lainnya_1" style="display: <?= in_array('lainnya', $p1e) ? 'block' : 'none'; ?>">
                                        <input type="text" class="form-control" id="lainnya_text" name="lainnya_text" placeholder="Sebutkan...">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#checkbox_lainnya_1').change(function() {
                        if ($(this).is(':checked') && $(this).val() == 'lainnya') {
                            $('#lainnya_1').show();
                        } else {
                            $('#lainnya_1').hide();
                        }
                    });
                });
            </script>
        </div>

        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">2. Dari mana Bapak/Ibu mengenal SDIT - SMPIT - SMAIT Istiqamah YPAIT Balikpapan?</label>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (!empty($profil['p2e'])) {
                            $p2e = explode(',', $profil['p2e']);
                        } else {
                            $p2e = array();
                        }
                        ?>
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Sudah ada anak/saudara bersekolah disini" <?= in_array('Sudah ada anak/saudara bersekolah disini', $p2e) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Sudah ada anak/saudara bersekolah disini</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Informasi dari saudara, tetangga dan rekan yang lain" <?= in_array('Informasi dari saudara, tetangga dan rekan yang lain', $p2e) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Informasi dari saudara, tetangga dan rekan yang lain</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Informasi dari guru dan karyawan sekolah" <?= in_array('Informasi dari guru dan karyawan sekolah', $p2e) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Informasi dari guru dan karyawan sekolah</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Media massa (baliho, brosur, koran, televisi, radio)" <?= in_array('Media massa (baliho, brosur, koran, televisi, radio)', $p2e) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Media massa (baliho, brosur, koran, televisi, radio)</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Media internet (website, youtube, instagram, facebook)">
                                    <label class="form-check-label">Media internet (website, youtube, instagram, facebook)</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="p2e" value="Direkomendasikan oleh sekolah sebelumnya">
                                    <label class="form-check-label">Direkomendasikan oleh sekolah sebelumnya</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lainnya_2" value="lainnya" id="checkbox_lainnya_2">
                                    <label class="form-check-label">Lainnya</label>
                                    <div id="lainnya_2" style="display: <?= in_array('g', $p2e) ? 'block' : 'none'; ?>">
                                        <input type="text" class="form-control" id="lainnya_2_text" name="lainnya_2_text" placeholder="Sebutkan...">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#checkbox_lainnya_2').change(function() {
                        if ($(this).is(':checked') && $(this).val() == 'lainnya') {
                            $('#lainnya_2').show();
                        } else {
                            $('#lainnya_2').hide();
                        }
                    });
                });
            </script>
        </div>


        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">3. Apa harapan Bapak/Ibu dengan memasukkan ananda di SDIT – SMPIT - SMAIT Istiqamah YPAIT Balikpapan?

                </label>
                <textarea class="form-control" id="p3e" name="p3e"><?= $profil['p3e']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">4. Sekiranya Bapak/Ibu tidak puas dengan sekolah, tindakan apa yang Bapak/Ibu akan lakukan?</label>
                <textarea class="form-control" id="p4e" name="p4e"><?= $profil['p4e']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">5. Apa saran dan usaha Bapak/Ibu untuk ikut memajukan SDIT - SMPIT - SMAIT Istiqamah YPAIT
                    Balikpapan?
                </label>
                <textarea class="form-control" id="p5e" name="p5e"><?= $profil['p5e']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">6. Apakah ada yang menjanjikan putra-putri Bapak/Ibu untuk bisa masuk SDIT - SMPIT – SMAIT
                    Istiqamah YPAIT Balikpapan?

                    :</label>
                <textarea class="form-control" id="p6e" name="p6e"><?= $profil['p6e']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">7. Bersediakah Bapak/Ibu bila putra-putrinya diterima menjadi murid SDIT - SMPIT - SMAIT
                    Istiqamah YPAIT Balikpapan memberikan kontribusi Non Materi (keahlian dibidang
                    masing-masing Bapak/Ibu, bila ada) kepada sekolah bila sekolah memerlukannya?
                </label>
                <textarea class="form-control" id="p7e" name="p7e"><?= $profil['p7e']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">8. Apakah putra-putri Bapak/Ibu mempunyai hal khusus mengenai fisik/psikis/kesehatan
                    yang perlu kami catat?
                </label>
                <textarea class="form-control" id="p8e" name="p8e"><?= $profil['p8e']; ?></textarea>
            </div>
        </div>
    </div>
</div>
<div class="mb-b-3 text-center">
    <button type="button" class="btn btn-sm btn-info" onclick="simpan10()">
        <i class="ph-floppy-disk me-2"></i>
        Simpan
    </button>
    <div id="alert-container-10"></div>
</div>





<script type="text/javascript">
    function simpan10() {
        let isValid = true;
        const requiredFields = ['jenis_penerimaan', 'p1e', 'p2e', 'p3e', 'p4e', 'p5e', 'p6e', 'p7e', 'p8e'];

        requiredFields.forEach(field => {
            if (!$(`[name="${field}"]`).val()) {
                $(`[name="${field}"]`).addClass('is-invalid');
                isValid = false;
            } else {
                $(`[name="${field}"]`).removeClass('is-invalid');
            }
        });
        if (!isValid) {
            $('#alert-container-10').html(`
	<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
	  Mohon lengkapi semua field yang wajib diisi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
  `);
            return;
        }
        let p1e = [];
        $('input[name="p1e"]:checked').each(function() {
            p1e.push($(this).val());
        });
        if ($('#checkbox_lainnya_1').is(':checked')) {
            p1e.push($('input[name="lainnya_text"]').val());
        }
        let p2e = [];
        $('input[name="p2e"]:checked').each(function() {
            p2e.push($(this).val());
        });
        if ($('#checkbox_lainnya_2').is(':checked')) {
            p2e.push($('input[name="lainnya_2_text"]').val());
        }



        let data = {
            replid: $('[name="replid"]').val(),
            jenis_penerimaan: $('[name="jenis_penerimaan"]').val(),
            p1e: p1e.join(';'),
            p2e: p2e.join(';'),
            p3e: $('[name="p3e"]').val(),
            p4e: $('[name="p4e"]').val(),
            p5e: $('[name="p5e"]').val(),
            p6e: $('[name="p6e"]').val(),
            p7e: $('[name="p7e"]').val(),
            p8e: $('[name="p8e"]').val(),
        };

        $.ajax({
            type: "POST",
            url: "<?php base_url() ?>dashboard/simpan10",
            data: data,
            success: function(response) {
                if (response > 0) {
                    $('#alert-container-10').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
                }
            }
        });
    }
</script>