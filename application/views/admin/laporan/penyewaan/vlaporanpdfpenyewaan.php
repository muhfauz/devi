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

    h3 {
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
  <h2>Laporan Data Penyewaan</h2>

  <div class="clearfix">
    <div class="box">
      Tanggal :
    </div>
    <div class="box">
      : <?php echo $this->Mglobal->tanggalindo($this->session->userdata('tgl_penyewaan')); ?>

    </div>
  </div>
  <div class="clearfix">
    <div class="box">
      Lapangan :
    </div>
    <div class="box">
      : <?php echo $this->session->userdata('nama_lapangan'); ?>

    </div>
  </div>

  <table>
    <tr>
      <th>Nomor</th>
      <th>Nama penyewa</th>
      <th>Alamat</th>
      <th>Nomor HP</th>
      <th>Jam</th>
      <th>Harga Sewa</th>
      <th>Metode Pembayaran</th>
      <th>Bukti Pembayaran</th>
      <th>Jumlah Bayar</th>
      <th>Status</th>
      <!-- <th style="text-align: center;">Stok penyewa</th>
      <th style="text-align: center;">Total</th> -->




    </tr>
    <?php $no = 0;
    foreach ($penyewaan as $a) : $no++; ?>


      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $a->nama_penyewa ?></td>
        <td><?php echo $a->alamat_penyewa ?></td>
        <td><?php echo $a->nohp_penyewa ?></td>
        <td><?php echo $a->jam ?></td>
        <td class="text-right"> <?php echo $this->Mglobal->rupiah($a->harga_sewa) ?></td>
        <td><?php echo $a->pembayaran_sewa ?></td>
        <td>
          <?php if ($a->bukti_bayar <> "") { ?>
            <!-- <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapussetting"> <i class="fa fa-trash mr-2"></i> Hapus Data</a> -->
            OK

          <?php } else { ?>
            -
          <?php } ?>
        </td>
        <td><?php echo $this->Mglobal->rupiah($a->jumlah_bayar) ?></td>
        <td>
          <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-check mr-2"></i> <?php echo $a->status_penyewaan ?></button>
        </td>


      </tr>
    <?php endforeach; ?>


  </table>
  <hr>


  <div class="clearfix">
    <div class="box">
      Total Penerimaan Sewa :
    </div>
    <div class="box">

      : Rp. <?php
            $kd_lapangan = $this->session->userdata('kd_lapangan');
            $tgl_penyewaan = $this->session->userdata('tgl_penyewaan');
            if ($kd_lapangan == 'all') {
              echo $this->Mglobal->rupiah($this->db->query("select sum(jumlah_bayar) as jumlah from tbl_penyewaan where tgl_penyewaan='$tgl_penyewaan'")->row()->jumlah);
            } else {
              echo $this->Mglobal->rupiah($this->db->query("select sum(jumlah_bayar) as jumlah from tbl_penyewaan where kd_lapangan='$kd_lapangan' and tgl_penyewaan='$tgl_penyewaan'")->row()->jumlah);
            }
            ?>



    </div>
  </div>

</body>

</html>