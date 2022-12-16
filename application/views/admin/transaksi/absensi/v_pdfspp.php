<!DOCTYPE html>
<html>

<head>
    <title><?php echo $nama_surat; ?></title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bismerah/css/bootstrap.min.css') ?>">

</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }


        .table-data tr td {
            border-bottom: 1px solid #ffffff;
            font-size: 10pt;
            padding: 8px;
            text-align: left;
            height: 8px;
        }

        li {
            font-size: 10pt;
            text-align: left;
        }

        p {
            font-size: 10pt;
            text-align: left;
        }

        .kalimat {
            font-size: 10pt;
            text-align: left;
        }

        h2 {
            font-size: 20pt;
            text-align: center;
        }
    </style>

    <img src="gambar/logo_sekolah.png" style="position: absolute; width: 70px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    <?php echo strtoupper($nama_perush); ?><br>
                    <?php echo strtoupper($alamat_perush) ?> <br>
                    <!-- KEPALA DESA <?php echo strtoupper($nama_desa) ?> <br> -->
                </span>
                <span style="line-height: 1.6">

                </span>

            </td>
        </tr>
    </table>

    <hr>

    <h3 class="text-center"><u>TANDA BUKTI PEMBAYARAN </u></h3>





    <br />
    <table class="table-data" id="example3" style="width: 100%">

        <tbody>
            <?php foreach ($sppdetail as $s) { ?>



                <tr>
                    <td style="width: 25%">1. Telah terima dari</td>
                    <td>: <?php echo $s->nama_siswa ?></td>
                </tr>
                <tr>
                    <td>2. kELAS</td>
                    <td>: <?php echo $s->tingkat . ' ' . $s->kelas ?></td>
                </tr>
                <tr>
                    <td>3. Uang sebesar</td>
                    <td>: <?php echo "Rp. " . number_format($s->besar_spp); ?> </td>
                </tr>
                <tr>
                    <td>4. Guna Membayar</td>
                    <td>: SPP Bulan <?php echo $s->bulan; ?> </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>




    <br />


</body>

</html>