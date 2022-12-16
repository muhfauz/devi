<!DOCTYPE html>
<html>

<head>
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
  <h2>Laporan Data Barang</h2>

  <table>
    <tr>
      <th>Nomor</th>
      <th>Kode barang</th>
      <th>Nama barang</th>
      <th style="text-align: center;">Stok barang</th>
      <th style="text-align: center;">Total</th>

    </tr>
    <?php $no = 0;
    foreach ($barang as $a) : $no++; ?>


      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $a->kd_barang ?></td>
        <td><?php echo $a->nama_barang ?></td>
        <td style="text-align: center;"><?php echo $a->stok_barang ?></td>
        <td style="text-align: right;">Rp. <?php echo number_format($this->db->query("select sum(stok_pembelian * hna_std) as total_barang from tbl_detailpembelian where kd_barang='$a->kd_barang' ")->row()->total_barang); ?></td>

      </tr>
    <?php endforeach; ?>


  </table>
  <hr>

  <div class="clearfix">
    <div class="box">
      Total Barang
    </div>
    <div class="box">
      : <?php echo $this->db->query("select sum(stok_barang) as stok from tbl_barang")->row()->stok; ?>

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Total
    </div>
    <div class="box">
      : Rp. <?php echo number_format($this->db->query("select sum(stok_pembelian * hna_std) as total_barang from tbl_detailpembelian")->row()->total_barang); ?>

    </div>
  </div>
</body>

</html>