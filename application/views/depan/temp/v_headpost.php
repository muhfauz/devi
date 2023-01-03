<!DOCTYPE html>
<!-- eTreeks - Education & Courses Landing Page Template design by Jthemes -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jthemes" />
    <meta name="description" content="Lowongan Kerja <?php echo $nama_lowongan . ' ' . $nama_perush ?> " />
    <meta name="keywords" content="Lowongan Kerja Purbalingga, Lowongan Kerja Kasir, Lowongan Kerja Purbalingga 2022">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SITE TITLE -->
    <title>Lowongan Kerja <?php echo $nama_lowongan . ' ' . $nama_perush ?> </title>

    <!-- FAVICON AND TOUCH ICONS  -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>website/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url() ?>website/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>website/images/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>website/images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>website/images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>website/images/apple-touch-icon.png">
    <link rel="icon" href="<?php echo base_url() ?>website/images/apple-touch-icon.png" type="image/x-icon">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="<?php echo base_url() ?>website/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT ICONS -->
    <link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo base_url() ?>website/css/flaticon.css" rel="stylesheet">

    <!-- PLUGINS STYLESHEET -->
    <link href="<?php echo base_url() ?>website/css/menu.css" rel="stylesheet">
    <link id="effect" href="<?php echo base_url() ?>website/css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
    <link href="<?php echo base_url() ?>website/css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>website/css/flexslider.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>website/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>website/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>website/css/bootstrap.min.css" rel="stylesheet">

    <!-- ON SCROLL ANIMATION -->
    <link href="<?php echo base_url() ?>website/css/animate.css" rel="stylesheet">

    <!-- TEMPLATE CSS -->
    <link href="<?php echo base_url() ?>website/css/style.css" rel="stylesheet">

    <!-- RESPONSIVE CSS -->
    <link href="<?php echo base_url() ?>website/css/responsive.css" rel="stylesheet">
    <!-- GOOGLE JOB POST -->
    <?php
    $data = array(
        '@context' => 'https://schema.org/',
        '@type' => 'JobPosting',
        'title' => $nama_lowongan . ' ' . $nama_perush,
        'description' => $detail_lowongan,
        'identifier' => array(
            '@type' => 'PropertyValue',
            'name' => $nama_perush,
            'value' => $kd_lowongan
        ),
        'datePosted' => $tgl_post,
        'validThrough' => $tgl_tutup,
        'employmentType' => [$jenis_lowongan],
        'hiringOrganization' => array(
            '@type' => 'Organization',
            'name' => $nama_perush,
            'sameAs' => $kdurl_lowongan,
            'logo' => base_url('website/images/lowongan/') . $gambar_lowongan
        ),
        'jobLocation' => array(
            '@type' => 'Place',
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $alamat_perush,
                'addressLocality' => $kab_perush,
                'addressRegion' => $prop_perush,
                'postalCode' => $kd_pos,
                'addressCountry' => 'ID'
            )
        ),
        'baseSalary' => array(
            '@type' => 'MonetaryAmount',
            'currency' => 'IDR',
            'value' => array(
                '@type' => 'QuantitativeValue',
                'minValue' => 600000,
                'maxValue' => 4000000,
                'unitText' => 'MONTH'
            )
        )


    );
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    $newstr = str_replace('\\', '', $jsonfile);
    // file_put_contents('anggotax.json', $newstr);

    ?>
    <script type="application/ld+json">
        <?php
        //    echo json_encode($data, JSON_PRETTY_PRINT);
        echo $newstr;
        ?>
    </script>

    <!-- ENDING GOOGLE JOB POST -->

</head>

<body>
    <!-- PRELOADER SPINNER
		============================================= -->
    <div id="loader-wrapper">
        <div id="loading">
            <div id="loading-center">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
    </div>



    <!-- PAGE CONTENT
		============================================= -->
    <div id="page" class="page">