
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $titel; ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png');?>">
  <!-- Global stylesheets -->
  <link href="<?= base_url(); ?>assets/backend/assets/fonts/inter/inter.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/backend/assets/icons/phosphor/styles.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/backend/assets/one/css/ltr/all.min.css" id="stylesheet" rel="stylesheet" type="text/css">
  <script src="<?= base_url(); ?>assets/backend/assets/js/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- /core JS files -->
</head>

<body class="bg-white" style="background-image:url('<?= base_url('assets/')?>backend/assets/images/backgrounds/panel_bg.png'); background-size:contain;">

  <?php
    if(isset($isi))
      $this->load->view($isi);
  ?>


</body>
</html>