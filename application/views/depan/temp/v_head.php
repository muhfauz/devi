<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title><?php echo $this->db->query("select * from tbl_perusahaan")->row()->nama_perush ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Aqua Shatar - Swim Academy HTML5 Template">
    <meta name="author" content="xenioushk">
    <link rel="shortcut icon" href="<?php echo base_url('assets/depan/') ?>images/favicon.png" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- tambahan -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons/themify-icons.css">



    <!-- The styles -->
    <link href="<?php echo base_url('assets/depan/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/depan/') ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/depan/') ?>css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/depan/') ?>css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/depan/') ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/depan/') ?>css/venobox.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/depan/') ?>css/styles.css" type="text/css" />
    <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
</head>

<body>
    <!-- <div id="preloader">
        <span class="margin-bottom"><img src="<?php echo base_url('assets/depan/') ?>images/loader.gif" alt="Loading......" /></span>
    </div> -->