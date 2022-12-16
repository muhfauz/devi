<!DOCTYPE html>
<html>

<head>
  <title><?php echo $judul ?></title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      font-family: Arial, Helvetica, sans-serif;
      border-bottom: 1px solid #B0C4DE;
    }

    tr:nth-child(even) {
      background-color: white;

    }

    th {
      background-color: #000000;
      color: white;
    }

    p {
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
      font-size: 20px;
    }

    h2 {
      text-align: center;
    }

    .box {
      float: left;
      width: 20%;
      /* padding: 2px; */
      border-bottom: 1px solid black;
      text-align: left;
      padding: 8px;
      font-family: Arial, Helvetica, sans-serif;
      /* border-bottom: 1px solid #B0C4DE; */
    }

    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
  </style>
</head>

<body>
  <?php foreach ($perush as $p) : ?>


    <p> <strong> <?php echo $p->nama_perush ?> </strong><br>
      <i> <?php echo $p->alamat_perush ?> </i><br>
    </p>
  <?php endforeach; ?>
  <hr>
  <h2><?php echo $judul  ?> <br>
    <?php echo "Status " . $status; ?>
  </h2>

  <table>
    <tr>
      <th class="text-center text-white" width="10px">No</th>
      <th class="text-center text-white">Nama</th>
      <th class="text-center text-white">Kelas</th>
      <th class="text-center text-white">Bulan</th>
      <th class="text-center text-white">Besar SPP</th>
      <th class="text-center text-white">Keterangan</th>
    </tr>
    <?php
    $totalspp = 0;
    $no = 1;
    foreach ($sppdetail as $a) :
      $totalspp = $totalspp + $a->besar_spp;
    ?>


      <tr>
        <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
        <td><?php echo $a->nama_siswa ?></td>
        <td><?php echo $a->tingkat . ' ' . $a->kelas ?></td>
        <td><?php echo $a->bulan ?></td>
        <td>Rp. <?php echo number_format($a->besar_spp) ?></td>
        <td><?php if ($a->tgl_bayar == '0000-00-00') { ?>
            <span class="badge badge-primary text-center">Belum Bayar</span>
          <?php } else { ?>
            <span class="badge badge-danger text-center">Lunas, dibayar tanggal <?php echo $this->Mglobal->tanggalindo($a->tgl_bayar) . ' diterima oleh ' . $a->nama_admin ?></span>
          <?php } ?>

        </td>
      </tr>
    <?php endforeach; ?>

  </table>
  <hr>

  <div class="clearfix">
    <div class="box">
      Total
    </div>
    <div class="box">
      : Rp. <?php echo number_format($totalspp); ?>

    </div>
  </div>

</body>

</html>