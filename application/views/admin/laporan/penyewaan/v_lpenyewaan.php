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
      <div class="row ml-1 mr-1 mt-1 text-right">
        <a href="<?php echo base_url('admin/laporan/lpenyewa/laporan_pdf_penyewa') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
      </div>
      <div class="row ml-1 mr-1 mt-1 bg-aqua">

        <div class="col sm-1 mt-2 ml-2 mr-2 mb-1">

          <div class="form-group row">
            <label for="exampleInputEmail3" class="col-sm-3 control-label">Tanggal </label>
            <div class="col-sm-9">
              <div class="input-group">
                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $this->Mglobal->tanggalindo($this->session->userdata('tgl_penyewaan')) ?>" readonly>
                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group row mb-1">
            <label for="exampleInputEmail3" class="col-sm-3 control-label">Lapangan </label>
            <div class="col-sm-9">
              <div class="input-group">
                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $this->session->userdata('nama_lapangan') ?>" readonly>
                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <!-- <a href="<?php echo base_url('admin/laporan/lpenyewa/laporan_pdf_penyewa') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a> -->
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class="bg-aqua">
            <tr>
              <th class="text-center text-white align-middle" rowspan="2" width="10px">No</th>
              <th class="text-center text-white align-middle" rowspan="2">Kode penyewa</th>
              <th class="text-center text-white align-middle" rowspan="2">Nama </th>
              <th class="text-center text-white align-middle" rowspan="2">Tempat, Tanggal Lahir</th>
              <th class="text-center text-white align-middle" rowspan="2">Jenis Kelamin</th>
              <th class="text-center text-white align-middle" rowspan="2">Alamat penyewa</th>
              <th class="text-center text-white align-middle" rowspan="2">Nomor HP</th>



            </tr>

          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penyewa as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->kd_penyewa ?></td>
                <td><?php echo $a->nama_penyewa ?></td>
                <td><?php echo $a->tempatlahir_penyewa . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_penyewa) ?></td>
                <td><?php echo $a->jk_penyewa ?></td>
                <td><?php echo $a->alamat_penyewa ?></td>
                <td><?php echo $a->nohp_penyewa ?></td>





              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->