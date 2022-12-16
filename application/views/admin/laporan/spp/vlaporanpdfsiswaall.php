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
      <th class="text-center text-white">Nama</th>
      <th class="text-center text-white">Nomor Induk</th>
      <th class="text-center text-white">NISN</th>
      <th class="text-center text-white">Kelas</th>
      <th class="text-center text-white">Alamat</th>
      <th class="text-center text-white">Ayah</th>
      <th class="text-center text-white">Ibu</th>
      <th class="text-center text-white">No Telp</th>
    </tr>
    <?php
    $no = 1;
    foreach ($siswa as $a) :  ?>
      <tr>
        <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
        <td><?php echo $a->nama_siswa ?></td>
        <td><?php echo $a->nis ?></td>
        <td><?php echo $a->nisn ?></td>
        <td><?php echo $a->tingkat . ' ' . $a->kelas ?> </td>
        <td><?php echo $a->alamat_siswa ?></td>
        <td><?php echo $a->nama_ayah ?></td>
        <td><?php echo $a->nama_ibu ?></td>
        <td><?php echo $a->nohp_ayah ?></td>

      </tr>
    <?php endforeach ?>

  </table>
  <hr>


  <div class="clearfix">
    <div class="box">
      Kelas VII
    </div>
    <div class="box">
      : <?php echo $totalsiswa7; ?> siswa

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Kelas VIII
    </div>
    <div class="box">
      : <?php echo $totalsiswa8; ?> siswa

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Kelas IX
    </div>
    <div class="box">
      : <?php echo $totalsiswa9; ?> siswa

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Total Siswa
    </div>
    <div class="box">
      : <?php echo $totalsiswa; ?> siswa

    </div>
  </div>
</body>

</html>