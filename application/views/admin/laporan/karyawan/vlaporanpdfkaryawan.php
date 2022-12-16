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
    }

    tr:nth-child(even) {
      background-color: whitesmoke;
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
  </style>
</head>

<body>
  <?php foreach ($perush as $p) : ?>


    <p> <strong> <?php echo $p->nama_perush ?> </strong><br>
      <i> <?php echo $p->alamat_perush ?> </i><br>
    </p>
  <?php endforeach; ?>
  <hr>
  <h2>Laporan Data Karyawan</h2>

  <table>
    <tr>
      <th>Nomor</th>
      <th class="text-center text-white">Kode karyawan</th>
      <th class="text-center text-white">Nama karyawan</th>
      <th class="text-center text-white">Alamat karyawan</th>
      <th class="text-center text-white">Nomor HP</th>
      <th class="text-center text-white">Bagian</th>
      <th class="text-center text-white">Username</th>
    </tr>
    <?php $no = 0;
    foreach ($karyawan as $a) : $no++; ?>


      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $a->kd_karyawan ?></td>
        <td><?php echo $a->nama_karyawan ?></td>
        <td><?php echo $a->alamat_karyawan ?></td>
        <td><?php echo $a->nohp_karyawan ?></td>
        <td><?php echo $a->nama_bagian ?></td>
        <td><?php echo $a->username_karyawan ?></td>
      </tr>
    <?php endforeach; ?>

  </table>
  <hr>
</body>

</html>