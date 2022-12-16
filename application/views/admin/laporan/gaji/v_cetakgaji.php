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
    <table class="table-data" id="example3" style="width: 100%">

        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead class="bg-aqua">
                <tr>
                    <th class="text-center text-white align-middle" width="10px" rowspan="2">No</th>
                    <th class="text-center text-white align-middle" rowspan="2">Nama </th>
                    <th class="text-center text-white align-middle" rowspan="2">Jabatan</th>
                    <th class="text-center text-white align-middle" colspan="4">Gaji </th>

                    <th class="text-center text-white align-middle" colspan="3">Potongan</th>


                    <th class="text-center text-white align-middle" rowspan="2">Gaji Diterima</th>

                    <!-- <th class=" text-center text-white" width="300px" rowspan="2"></th> -->

                </tr>
                <tr>
                    <th class="text-center text-white align-middle">Gaji Pokok</th>
                    <th class="text-center text-white align-middle">Uang Makan</th>
                    <th class="text-center text-white align-middle">Insentif Reguler</th>
                    <th class="text-center text-white align-middle">Insentif Penjualan</th>
                    <th class="text-center text-white align-middle">BPJS Kesehatan</th>
                    <th class="text-center text-white align-middle">BPJS Ketenagakerjaan</th>
                    <th class="text-center text-white align-middle">Pensiun</th>



                </tr>

            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_gaji = 0;
                foreach ($karyawan as $a) :
                    $total_gaji = $total_gaji + ($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen);
                ?>
                    <tr>
                        <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                        <!-- <td><?php echo $a->kd_karyawan ?></td> -->
                        <td><?php echo $a->nama_karyawan ?></td>
                        <td><?php echo $a->nama_jabatan ?></td>
                        <!-- <td><?php echo $a->nama_bagian ?></td> -->
                        <td class="text-right"><?php echo number_format($a->gaji_pokok) ?></td>
                        <td class="text-right"><?php echo number_format($a->jumlah_masuk * $a->uang_makan) ?></td>
                        <td class="text-right"><?php echo number_format($a->insentif_reguler) ?></td>
                        <td class="text-right"><?php echo number_format($a->tunjangan_jabatan) ?></td>
                        <td class="text-right"><?php echo number_format($a->bpjs_kes) ?></td>
                        <td class="text-right"><?php echo number_format($a->bpjs_tk) ?></td>
                        <td class="text-right"><?php echo number_format($a->bpjs_pen) ?></td>
                        <td class="text-right"><?php echo number_format(($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen)) ?></td>


                        </td>

                    </tr>
                <?php endforeach ?>
        </table>




        <br />


</body>

</html>