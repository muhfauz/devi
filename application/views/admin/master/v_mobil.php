<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-car"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-car"></i> <?php echo $x1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white align-middle" width="10px">No</th>
                            <th class="text-center text-white align-middle"> Kode mobil</th>
                            <th class="text-center text-white align-middle">Nama </th>
                            <th class="text-center text-white align-middle">Jenis</th>
                            <th class="text-center text-white align-middle">Harga</th>
                            <th class="text-center text-white align-middle">Keterangan</th>
                            <!-- <th class="text-center text-white align-middle">Gambar</th> -->
                            <th class="text-center text-white" width="300px"></th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mobil as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->kd_mobil ?></td>
                                <td><?php echo $a->nama_mobil ?></td>
                                <td><?php echo $a->nama_jenismobil ?></td>
                                <td><?php echo $this->Mglobal->rupiah($a->harga_mobil) ?></td>
                                <td><?php echo $a->ket_mobil ?></td>
                                <!-- <td>
                                    <img src="<?php echo base_url('gambar/') . $a->gambar_mobil ?>" alt="" width="100" height="100">

                                </td> -->



                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_mobil ?>"> <i class="fa fa-info mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_mobil ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_mobil ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>


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
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/master/mobil/aksitambahmobil') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Kode mobil</label>
                        <input name="kd_mobil" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_mobil", "tbl_mobil", "MOB") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama mobil</label>
                        <input name="nama_mobil" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Mobil</label>
                        <select class="form-control" name="kd_jenismobil" id="" required>
                            <option value="">Pilih Jenis Mobil</option>
                            <?php foreach ($jenismobil as $j) : ?>
                                <option value="<?php echo $j->kd_jenismobil ?>"><?php echo $j->nama_jenismobil ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Mobil</label>
                        <textarea class="form-control" name="ket_mobil" id="" cols="30" rows="10"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input name="harga_mobil" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto </label>
                        <input name="gambar_mobil" type="file" class="form-control" multiple="multiple">
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($mobil as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_mobil ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode mobil</th>
                            <td><?php echo $a->kd_mobil ?></td>
                        </tr>
                        <tr>
                            <th>Nama mobil</th>
                            <td><?php echo $a->nama_mobil ?></td>
                        </tr>
                        <tr>
                            <th>Harga mobil</th>
                            <td><?php echo $this->Mglobal->rupiah($a->harga_mobil) ?></td>
                        </tr>




                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="<?php echo base_url('gambar/') . $a->gambar_mobil ?>" alt="">
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
<?php foreach ($mobil as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_mobil ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/mobil/hapusmobil') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_mobil" type="text" class="form-control" value="<?php echo $a->nama_mobil ?>" required> -->
                            <input name="kd_mobil" type="hidden" class="form-control" value="<?php echo $a->kd_mobil ?>" required>
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
<?php foreach ($mobil as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_mobil ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/mobil/aksieditmobil') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama mobil</label>
                            <input name="nama_mobil" type="text" class="form-control" value="<?php echo $a->nama_mobil ?>" required>
                            <input name="kd_mobil" type="hidden" class="form-control" value="<?php echo $a->kd_mobil ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Mobil</label>
                            <select class="form-control" name="kd_jenismobil" id="" required>
                                <option value="<?php echo $a->kd_jenismobil ?>" selected><?php echo $a->nama_jenismobil ?></option>
                                <option value="">Pilih Jenis Mobil</option>
                                <?php foreach ($jenismobil as $j) : ?>
                                    <option value="<?php echo $j->kd_jenismobil ?>"><?php echo $j->nama_jenismobil ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan Mobil</label>
                            <textarea class="form-control" name="ket_mobil" id="" cols="30" rows="10" required><?php echo $a->nama_mobil ?></textarea>

                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input name="harga_mobil" type="number" class="form-control text-right" value="<?php echo $a->harga_mobil ?>" required>
                        </div>

                        <div class="form-group">

                            <label for="">Foto</label>
                            <br>
                            <img width="200" height="100" src="<?php echo base_url('gambar/') . $a->gambar_mobil ?>" alt="">
                            <br>
                            <input name="gambar_mobil" type="file" class="form-control" value="">
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>