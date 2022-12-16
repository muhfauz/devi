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
  <h2><?php echo $judul ?> <br>
    <?php echo $periode ?></h2>

  <table>
    <tr>
      <th class="text-center text-white" width="10px">No</th>
      <th class="text-center text-white">Tanggal </th>
      <th class="text-center text-white">No Faktur </th>
      <th class="text-center text-white">Nama Barang </th>
      <th class="text-center text-white">Jumlah </th>
      <th class="text-center text-white">Harga </th>
      <th class="text-center text-white">Total </th>
      <th class="text-center text-white">Outlet </th>
    </tr>
    <?php $no = 0;
    foreach ($penjualan as $a) : $no++; ?>


      <tr>
        <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
        <td><?php echo $this->Mglobal->tanggalindo($a->tgl_penjualan) ?></td>
        <td> <?php echo $a->no_fakturpenjualan ?> </td>
        <td> <?php echo $a->nama_barang ?> </td>
        <td> <?php echo $a->jumlah_penjualan . ' ' . $a->nama_satuan ?> </td>

        <td style="text-align: right;"><?php echo number_format($a->hargajual_barang) ?> </td>
        <td style="text-align: right;"><?php echo number_format($a->total_bayarpenjualan) ?> </td>
        <td> <?php echo $a->nama_outlet ?> </td>
      </tr>
    <?php endforeach; ?>

  </table>
  <hr>

  <div class="clearfix">
    <div class="box">
      Total Item
    </div>
    <div class="box">
      : Rp. <?php echo $item; ?> item

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Total penjualan
    </div>
    <div class="box">
      : Rp. <?php echo $totalpenjualan  ?>

    </div>
  </div>
</body>

</html>