<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-bullseye"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-bullseye"></i> <?php echo $x1; ?></h4>
      <p></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <a href="<?php echo base_url('admin/laporan/lpenjualan/laporan_pdf_penjualan') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class=" bg-aqua-gradient">
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
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penjualan as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_penjualan) ?></td>
                <td> <?php echo $a->no_fakturpenjualan ?> </td>
                <td> <?php echo $a->nama_barang ?> </td>
                <td> <?php echo $a->jumlah_penjualan . ' ' . $a->nama_satuan ?> </td>
                <td class="text-right"> <?php echo number_format($a->hargajual_barang) ?> </td>
                <td class="text-right"> <?php echo number_format($a->total_bayarpenjualan) ?> </td>
                <td> <?php echo $a->nama_outlet ?> </td>


              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->