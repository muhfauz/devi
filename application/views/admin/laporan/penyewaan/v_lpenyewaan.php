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
        <a href="<?php echo base_url('admin/laporan/lpenyewaan/laporan_pdf_penyewaan') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
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
              <th class="text-center text-white align-middle" rowspan="2">Nama Penyewa </th>
              <th class="text-center text-white align-middle" rowspan="2">Alamat penyewa</th>
              <th class="text-center text-white align-middle" rowspan="2">Nomor HP</th>
              <th class="text-center text-white">Jam</th>
              <th class="text-center text-white">Harga Sewa</th>
              <th class="text-center text-white">Metode Pembayaran</th>
              <th class="text-center text-white">Bukti Pembayaran</th>
              <th class="text-center text-white">Jumlah Bayar</th>
              <th class="text-center text-white">Status</th>
              <!-- <th class="text-center text-white">Foto</th> -->
            </tr>

          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penyewaan as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->nama_penyewa ?></td>
                <td><?php echo $a->alamat_penyewa ?></td>
                <td><?php echo $a->nohp_penyewa ?></td>
                <td><?php echo $a->jam ?></td>
                <td class="text-right"> <?php echo $this->Mglobal->rupiah($a->harga_sewa) ?></td>
                <td><?php echo $a->pembayaran_sewa ?></td>
                <td>
                  <?php if ($a->bukti_bayar <> "") { ?>
                    <!-- <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapussetting"> <i class="fa fa-trash mr-2"></i> Hapus Data</a> -->
                    <button href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#lihatbukti<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-check-square-o mr-1"></i> Lihatk</button>

                  <?php } else { ?>
                    <button href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#"> <i class="fa fa-check-square-o mr-1"></i>Belum Bayar</button>
                  <?php } ?>
                </td>
                <td><?php echo $this->Mglobal->rupiah($a->jumlah_bayar) ?></td>
                <td>
                  <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-check mr-2"></i> <?php echo $a->status_penyewaan ?></button>
                </td>




              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php foreach ($penyewaan as $a) : ?>
  <div class="modal fade" id="lihatbukti<?php echo $a->kd_penyewaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-futbol-o mr-2"></i> Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/penyewaan/historysewa/aksibayaruser') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Nama Penyewa</label>
              <input name="kd_penyewaan" type="hidden" class="form-control" readonly value="<?php echo $a->kd_penyewaan ?>">
              <input name="" type="text" class="form-control" readonly value="<?php echo $a->nama_penyewa ?>">
            </div>
            <div class="form-group">
              <label for="">Sewa Lapangan</label>
              <input name="kd_penyewaan" type="hidden" class="form-control" readonly value="<?php echo $a->kd_penyewaan ?>">
              <input name="" type="text" class="form-control" readonly value="<?php echo $a->nama_lapangan . ' Jam ' . $a->jam ?>">
            </div>
            <div class="form-group">
              <label for="">Jenis Bayar</label>
              <input name="" type="text" class="form-control" readonly value="<?php echo $a->pembayaran_sewa ?>">
            </div>
            <div class="form-group">
              <label for="">Jumlah Bayar</label>
              <input name="jumlah_bayar" type="text" class="form-control" value="Rp. <?php echo $this->Mglobal->rupiah($a->jumlah_bayar) ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Pembayaran ke :</label>
              <input name="jumlah_bayar" type="text" class="form-control" value="<?php echo $a->rekening_bayar ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Bukti Bayar</label>
              <img class="form-group" src="<?php echo base_url('gambar/') . $a->bukti_bayar ?>" alt="">
            </div>
        </div>
        <div class=" modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Booking</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>