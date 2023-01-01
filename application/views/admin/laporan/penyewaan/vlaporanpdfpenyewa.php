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
  <h2>Laporan Data penyewa</h2>

  <table>
    <tr>
      <th>Nomor</th>
      <th>Kode penyewa</th>
      <th>Nama penyewa</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Alamat penyewa</th>
      <th>Nomor HP</th>
      <!-- <th style="text-align: center;">Stok penyewa</th>
      <th style="text-align: center;">Total</th> -->



    </tr>
    <?php $no = 0;
    foreach ($penyewa as $a) : $no++; ?>


      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $a->kd_penyewa ?></td>
        <td><?php echo $a->nama_penyewa ?></td>
        <td><?php echo $a->tempatlahir_penyewa . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_penyewa) ?></td>
        <td><?php echo $a->jk_penyewa ?></td>
        <td><?php echo $a->alamat_penyewa ?></td>
        <td><?php echo $a->nohp_penyewa ?></td>


      </tr>
    <?php endforeach; ?>


  </table>
  <hr>

  <div class="clearfix">
    <div class="box">
      Total penyewa
    </div>
    <div class="box">
      : <?php echo $this->db->query("select * from tbl_penyewa")->num_rows(); ?> orang

    </div>
  </div>

</body>

</html>