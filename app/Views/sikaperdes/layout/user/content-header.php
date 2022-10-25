<!doctype html>
<html lang="en">
<?php $request = \Config\Services::request(); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Panel SIKAPERDES </title>
    <meta name="description" content="Sistem Informasi Pengumpul dan Pengolah Data Dispermadesdukcapil Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, SIKAPERDES DISPERMADESDUKCAPIL Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/fav.ico'); ?>">
    <link href="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php if ($request->uri->getSegment(3) === "dashboard") : ?>
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/dashboard.css">

    <?php elseif ($request->uri->getSegment(3) === "role_edit") : ?>
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "verifikasi_data" || $request->uri->getSegment(2) == "data" && $request->uri->getSegment(3) == "kawasan" || $request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "list_input_data_kawasan" || $request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "daftar_kawasan" || $request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "jenis_klasifikasi_list") : ?>
        <!-- select2 -->
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/select2.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(3) === "input_data_kawasan") : ?>
        <!-- choices css -->
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- select2 -->
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/select2.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(3) === "role_management") : ?>
        <!-- select2 -->
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/select2.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(2) === "notifikasi") : ?>
        <!-- DataTables -->
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php endif; ?>


    <!-- jquery full -->
    <script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url('minia/css/preloader.css') ?>" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url('minia/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('minia/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('minia/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- pace js -->
    <script src="<?= base_url('minia/libs/pace-js/pace.min.js'); ?>"></script>
</head>

<body>
    <div id="layout-wrapper pace pace-inactive">