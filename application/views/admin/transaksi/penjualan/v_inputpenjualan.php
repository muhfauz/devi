<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-shopping-basket"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-shopping-basket"></i> <?php echo $x1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="row ml-1 mr-1 mt-3 bg-aqua">
                <div class="col sm-1 mt-2 ml-2 mr-2">
                    <!-- <form class="form" action="<?php echo base_url('admin/transaksi/penjualan/simpanpenjualan') ?>" method="POST"> -->
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Bulan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="<?php echo $bulan ?>" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Tahun </label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $tahun ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Total Pendapatan penjualan </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo number_format($total_penjualan) ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="table-responsive mt-2">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white align-middle" width="10px">No</th>
                            <th class="text-center text-white align-middle">Nama </th>
                            <th class="text-center text-white align-middle">Nama Mobil</th>
                            <th class="text-center text-white align-middle">Jenis Mobil</th>
                            <th class="text-center text-white align-middle">Jumlah</th>
                            <th class="text-center text-white align-middle">Harga</th>
                            <th class="text-center text-white align-middle">Total</th>
                            <th class=" text-center text-white" width="300px"></th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penjualan as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->nama_karyawan ?></td>
                                <td><?php echo $a->nama_mobil ?></td>
                                <td><?php echo $a->nama_jenismobil ?></td>
                                <td><?php echo $a->jumlah_penjualan ?></td>
                                <td><?php echo number_format($a->harga_mobil) ?></td>
                                <td><?php echo number_format($a->total_penjualan) ?></td>


                                </td>
                                <td class="float-right">
                                    <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_karyawan ?>"> <i class="fa fa-info mr-2"></i> Detail</a> -->
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_penjualan ?>"> <i class="fa fa-trash mr-2"></i>Hapus</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_penjualan ?>"> <i class="fa fa-edit mr-2"></i>Edit</a>
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

<!-- Modal -->


<!-- modal detail -->
<?php foreach ($penjualan as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode karyawan</th>
                            <td><?php echo $a->kd_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Nama karyawan</th>
                            <td><?php echo $a->nama_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tangal Lahir</th>
                            <td><?php echo $a->tempatlahir_karyawan . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_karyawan) ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo $a->jk_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $a->alamat_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td><?php echo $a->nohp_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $a->nama_jabatan ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal masuk</th>
                            <td>
                                <?php if ($a->tglmasuk_karyawan <> '0000-00-00') {
                                    echo $this->Mglobal->tanggalindo($a->tglmasuk_karyawan);
                                } else {
                                    echo "-";
                                }  ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Insentife Reguler</th>
                            <td><?php echo number_format($total_penjualan / $total_karyawan) ?> </td>
                        </tr>
                        <tr>
                            <th>Status Insentive </th>
                            <td>
                                <?php $insentif_reguler = $this->db->query("select insentif_reguler from tbl_gajidetail where kd_karyawan='$a->kd_karyawan' and kd_gaji='$a->kd_gaji'")->row()->insentif_reguler;
                                if ($insentif_reguler > 0) { ?>
                                    <button class="btn btn-sm btn-primary">Sudah Verifikasi</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-danger">Belum Verifikasi</button>

                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="<?php echo base_url('gambar/') . $a->gambar_karyawan ?>" alt="">
                            </td>
                        </tr>



                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- akhir detail -->
<!-- modal detail -->
<?php foreach ($penjualan as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_penjualan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/penjualan/hapuspenjualan') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" required> -->
                            <input name="kd_penjualan" type="hidden" class="form-control" value="<?php echo $a->kd_penjualan ?>" required>
                            <input name="kd_gaji" type="text" class="form-control" value="<?php echo $a->kd_gaji ?>" required>
                            <input name="kd_karyawan" type="text" class="form-control" value="<?php echo $a->kd_karyawan ?>" required>
                            <input name="kd_mobil" type="text" class="form-control" value="<?php echo $a->kd_mobil ?>" required>
                            <input name="jumlah_penjualan" type="text" class="form-control" value="<?php echo $a->jumlah_penjualan ?>" required>
                            <input name="kd_spv" type="text" class="form-control" value="<?php echo $a->kd_spv ?>" required>
                            <input name="kd_as" type="text" class="form-control" value="<?php echo $a->kd_as ?>" required>
                            <input name="kd_kc" type="text" class="form-control" value="<?php echo $a->kd_kc ?>" required>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- akhir detail -->

<!-- Modal -->



<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Tambah Penjualan Bulan <?php echo $bulan ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/transaksi/penjualan/aksitambahpenjualan') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama karyawan</label>
                        <select name="kd_karyawan" class="form-control" id="" required>
                            <option value="">-Pilih Karyawan-</option>
                            <?php foreach ($karyawan as $k) : ?>
                                <option value="<?php echo $k->kd_karyawan ?>"><?php echo $k->nama_karyawan ?> - <?php echo $k->nama_jabatan ?></option>
                            <?php endforeach; ?>

                        </select>

                        <input name="kd_penjualan" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_penjualan', 'tbl_penjualan', 'PJL') ?>" readonly>
                        <?php foreach ($kepalacabang as $kc) : ?>
                            <input name="kd_kc" type="hidden" class="form-control" value="<?php echo $kc->kd_karyawan ?>" readonly>
                        <?php endforeach; ?>

                    </div>
                    <div class="form-group">
                        <label for="">Nama Mobil</label>
                        <select name="kd_mobil" class="form-control" id="" required>
                            <option value="">-Pilih Mobil-</option>
                            <?php foreach ($mobil as $m) : ?>
                                <option value="<?php echo $m->kd_mobil ?>"><?php echo $m->nama_mobil ?></option>
                            <?php endforeach; ?>

                        </select>

                        <input name="kd_penjualan" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_penjualan', 'tbl_penjualan', 'PJL') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Jumlah </label>
                        <input name="jumlah_penjualan" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <select name="kd_spv" class="form-control" id="" required>
                            <option value="">-Pilih Supervisor-</option>
                            <?php foreach ($supervisor as $s) : ?>
                                <option value="<?php echo $s->kd_karyawan ?>"><?php echo $s->nama_karyawan ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Admin Sales</label>
                        <select name="kd_as" class="form-control" id="" required>
                            <option value="">-Pilih Admin Sales-</option>
                            <?php foreach ($adminsales as $as) : ?>
                                <option value="<?php echo $as->kd_karyawan ?>"><?php echo $as->nama_karyawan ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o mr-2"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit data -->
<?php foreach ($penjualan as $a) :  ?>
    <div class="modal fade" id="editdata<?php echo $a->kd_penjualan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Tambah Penjualan Bulan <?php echo $bulan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/penjualan/aksieditpenjualan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama karyawan</label>
                            <select name="kd_karyawan" class="form-control" id="" required>
                                <option value="<?php echo $a->kd_karyawan ?>"><?php echo $a->nama_karyawan ?> - <?php echo $a->nama_jabatan ?></option>
                                <?php foreach ($karyawan as $k) : ?>
                                    <option value="<?php echo $k->kd_karyawan ?>"><?php echo $k->nama_karyawan ?> - <?php echo $k->nama_jabatan ?></option>
                                <?php endforeach; ?>

                            </select>

                            <input name="kd_penjualan" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_penjualan', 'tbl_penjualan', 'PJL') ?>" readonly>
                            <?php foreach ($kepalacabang as $kc) : ?>
                                <input name="kd_kc" type="hidden" class="form-control" value="<?php echo $a->kd_karyawan ?>" readonly>
                            <?php endforeach; ?>

                        </div>
                        <div class="form-group">
                            <label for="">Nama Mobil</label>
                            <select name="kd_mobil" class="form-control" id="" required>
                                <option value="<?php echo $a->kd_mobil ?>"><?php echo $a->nama_mobil ?></option>
                                <option value="">-Pilih Mobil-</option>
                                <?php foreach ($mobil as $m) : ?>
                                    <option value="<?php echo $m->kd_mobil ?>"><?php echo $m->nama_mobil ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""> Jumlah </label>
                            <input name="jumlah_penjualan" type="number" class="form-control" required value="<?php echo $a->jumlah_penjualan ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Supervisor</label>
                            <select name="kd_spv" class="form-control" id="" required>
                                <option value="<?php echo $a->kd_spv ?>"><?php echo $a->nama_karyawan ?></option>
                                <option value="">-Pilih Supervisor-</option>
                                <?php foreach ($supervisor as $s) : ?>
                                    <option value="<?php echo $s->kd_karyawan ?>"><?php echo $s->nama_karyawan ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Admin Sales</label>
                            <select name="kd_as" class="form-control" id="" required>
                                <option value="">-Pilih Admin Sales-</option>
                                <?php foreach ($adminsales as $as) : ?>
                                    <option value="<?php echo $as->kd_karyawan ?>"><?php echo $as->nama_karyawan ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o mr-2"></i>Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>