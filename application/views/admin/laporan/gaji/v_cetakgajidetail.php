<!DOCTYPE html>
<html>

<head>
    <title>Gaji Bulan <?php echo $bulan . ' ' . $tahun . ' | ' . $nama_perush; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bismerah/css/bootstrap.min.css') ?>"> -->

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

    <img src="gambar/logo_wuling.png" style="position: absolute; width: 70px; height: auto;">
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

    <h3 class="text-center"><u>GAJI BULAN <?php echo $bulan . ' ' . $tahun; ?> </u></h3>





    <br />


    <table id="example1" class="table table-bordered table-striped table-hover">



        <?php
        $no = 1;
        $total_gaji = 0;
        foreach ($karyawan as $a) :
            $total_gaji = $total_gaji + ($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen);
        ?>
            <table class="table">
                <tr>
                    <th>Kode karyawan</th>
                    <td><?php echo $a->kd_karyawan ?></td>
                </tr>
                <tr>
                    <th>Nama karyawan</th>
                    <td><?php echo $a->nama_karyawan ?></td>
                </tr>
                <tr>
                    <th>Tempat, Tangal Lahir</th>
                    <td><?php echo $a->tempatlahir_karyawan . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_karyawan) ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $a->jk_karyawan ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $a->alamat_karyawan ?></td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td><?php echo $a->nohp_karyawan ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td><?php echo $a->nama_jabatan ?></td>
                </tr>

                <tr>
                    <th>Gaji Pokok</th>
                    <td><?php echo number_format($a->gaji_pokok) ?></td>

                </tr>
                <tr>
                    <th>Uang Makan</th>
                    <td><?php echo number_format($a->jumlah_masuk * $a->uang_makan) ?></td>
                </tr>
                <tr>
                    <th>Insentif Reguler</th>
                    <td><?php echo number_format($a->insentif_reguler) ?></td>

                </tr>
                <tr>
                    <th>Insentif Penjualan</th>
                    <td><?php echo number_format($a->tunjangan_jabatan) ?></td>

                </tr>
                <tr>
                    <th>BPJS Kesehatan</th>
                    <td><?php echo number_format($a->bpjs_kes) ?></td>
                </tr>
                <tr>
                    <th>BPJS Ketenagakerjaan</th>
                    <td><?php echo number_format($a->bpjs_tk) ?></td>
                </tr>
                <tr>
                    <th>Pensiun</th>
                    <td><?php echo number_format($a->bpjs_pen) ?></td>

                </tr>
                <tr>
                    <th>Gaji Diterima</th>
                    <td class="text-bold">Rp. <?php echo number_format(($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen)) ?></td>
                </tr>



            </table>

        <?php endforeach ?>
    </table>




    <br />


</body>

</html>