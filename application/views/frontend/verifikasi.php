<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran Berhasil</title>

    <!-- Global stylesheets -->
    <link href="<?= base_url() ?>assets/backend/assets/fonts/inter/inter.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/backend/assets/icons/phosphor/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/backend/assets/one/css/ltr/all.min.css" rel="stylesheet">
    <!-- /global stylesheets -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('<?= base_url("assets/img/background.jpg") ?>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .card-body {
            padding: 2.5rem;
        }

        .text-center-1 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-secondary {
            margin-right: 10px;
        }

        .btn-primary {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content d-flex justify-content-center align-items-center">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-uppercase">Verifikasi Berhasil!</h1>
                            <p>Anda dapat login menggunakan email dan PIN anda.</p>
                            <div class="text-center-1">
                                <a href="<?php echo base_url('login'); ?>" class="btn btn-secondary btn-lg w-50">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>