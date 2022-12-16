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
        <a href="<?php echo base_url('admin/laporan/lbarang/laporan_pdf_barang') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class="bg-aqua-gradient">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white">Kode barang</th>
              <th class="text-center text-white">Nama barang</th>
              <th class="text-center text-white"> Stok barang</th>
              <th class="text-center text-white"> Total</th>
              <th class="text-center text-white"> </th>


            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($barang as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->kd_barang ?></td>
                <td><?php echo $a->nama_barang ?></td>
                <td class="text-center"><?php echo $a->stok_barang ?></td>
                <td class="text-right">Rp. <?php echo number_format($this->db->query("select sum(stok_pembelian * hna_std) as total_barang from tbl_detailpembelian where kd_barang='$a->kd_barang' ")->row()->total_barang); ?></td>
                <td><a href="<?php echo base_url('admin/laporan/lbarang/detailbarang/') . $a->kd_barang ?>" class="btn btn-primary btn-sm mb-1"> <i class=" fa fa-info mr-2"></i> Detail</a></td>


              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->