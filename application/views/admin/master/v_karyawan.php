<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-users"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white align-middle" rowspan="2" width="10px">No</th>
                            <th class="text-center text-white align-middle" rowspan="2">Kode karyawan</th>
                            <th class="text-center text-white align-middle" rowspan="2">Nama </th>
                            <th class="text-center text-white align-middle" rowspan="2">Tempat, Tanggal Lahir</th>
                            <th class="text-center text-white align-middle" rowspan="2">Jenis Kelamin</th>
                            <th class="text-center text-white align-middle" rowspan="2">Alamat karyawan</th>
                            <th class="text-center text-white align-middle" rowspan="2">Nomor HP</th>
                            <th class="text-center text-white align-middle" rowspan="2">Bagian</th>
                            <th class="text-center text-white align-middle" rowspan="2">Jabatan</th>
                            <th class="text-center text-white align-middle" colspan="3">Potongan</th>
                            <th class="text-center text-white" width="300px" rowspan="2"></th>

                        </tr>
                        <tr>
                            <th class="text-center text-white align-middle">BPJS Kesehatan</th>
                            <th class="text-center text-white align-middle">BPJS Ketenagakerjaan</th>
                            <th class="text-center text-white align-middle">Pensiun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($karyawan as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->kd_karyawan ?></td>
                                <td><?php echo $a->nama_karyawan ?></td>
                                <td><?php echo $a->tempatlahir_karyawan . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_karyawan) ?></td>
                                <td><?php echo $a->jk_karyawan ?></td>
                                <td><?php echo $a->alamat_karyawan ?></td>
                                <td><?php echo $a->nohp_karyawan ?></td>
                                <td><?php echo $a->nama_bagian ?></td>
                                <td><?php echo $a->nama_jabatan ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->bpjs_kes) ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->bpjs_tk) ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->bpjs_pen) ?></td>

                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_karyawan ?>"> <i class="fa fa-info mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_karyawan ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <?php if ($this->session->userdata('posisi') == 'admin') { ?>
                                        <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_karyawan ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
                                    <?php } ?>

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
                <form action="<?php echo base_url('admin/master/karyawan/aksitambahkaryawan') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Kode karyawan</label>
                        <input name="kd_karyawan" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_karyawan", "tbl_karyawan", "KAR") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama karyawan</label>
                        <input name="nama_karyawan" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input name="tempatlahir_karyawan" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input name="tgllahir_karyawan" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk_karyawan" id="" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat karyawan</label>
                        <input name="alamat_karyawan" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor HP karyawan</label>
                        <input name="nohp_karyawan" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select class="form-control" name="kd_jabatan" id="">
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?php echo $j->kd_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bagian</label>
                        <select class="form-control" name="kd_bagian" id="" required>
                            <option value="">Pilih Bagian</option>
                            <?php foreach ($bagian as $b) : ?>
                                <option value="<?php echo $b->kd_bagian ?>"><?php echo $b->nama_bagian ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Masuk</label>
                        <input name="tglmasuk_karyawan" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">BPJS Kesehatan</label>
                        <input name="bpjs_kes" type="number" class="form-control" value="20000" required>
                    </div>
                    <div class="form-group">
                        <label for="">BPJS Ketenagakerjaan</label>
                        <input name="bpjs_tk" type="number" class="form-control" value="40000" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pensiun</label>
                        <input name="bpjs_pen" type="number" class="form-control" value="20000" required>
                    </div>



                    <div class="form-group">
                        <label for="">Foto karyawan</label>
                        <input name="gambar_karyawan" type="file" class="form-control" multiple="multiple">
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Foto karyawan</label>
                        <input name="userfile[]" type="file" class="form-control" multiple="multiple" required>

                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div>
                    <div class="form-group">
                        <label for="">Foto karyawan</label>
                        <input name="userfile[]" type="file" class="form-control" multiple="multiple" required>

                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="">Foto karyawan</label>
                        <input name="userfile[]" type="file" class="form-control" multiple="multiple" required>

                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div>
                    <div class="form-group">
                        <label for="">Foto karyawan</label>
                        <input name="userfile[]" type="file" class="form-control" multiple="multiple" required>

                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div> -->


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
<?php foreach ($karyawan as $a) : ?>
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
<?php foreach ($karyawan as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/karyawan/hapuskaryawan') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" required> -->
                            <input name="kd_karyawan" type="hidden" class="form-control" value="<?php echo $a->kd_karyawan ?>" required>
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
<?php foreach ($karyawan as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/karyawan/aksieditkaryawan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama karyawan</label>
                            <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" required>
                            <input name="kd_karyawan" type="hidden" class="form-control" value="<?php echo $a->kd_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input name="tempatlahir_karyawan" type="text" class="form-control" value="<?php echo $a->tempatlahir_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input name="tgllahir_karyawan" type="date" class="form-control" value="<?php echo $a->tgllahir_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control" name="jk_karyawan" id="" required>
                                <?php if ($a->jk_karyawan == 'Pria') { ?>
                                    <option value="Pria" selected> Pria</option>
                                <?php } else { ?>
                                    <option value="Wanita" selected> Wanita</option>
                                <?php } ?>

                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat karyawan</label>
                            <input name="alamat_karyawan" type="text" class="form-control" value="<?php echo $a->alamat_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">No HP karyawan</label>
                            <input name="nohp_karyawan" type="text" class="form-control" value="<?php echo $a->nohp_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>

                            <select class="form-control" name="kd_jabatan" id="">
                                <option value="<?php echo $a->kd_jabatan ?>"><?php echo $a->nama_jabatan ?></option>
                                <?php foreach ($jabatan as $c) : ?>
                                    <option value="<?php echo $c->kd_jabatan ?>"><?php echo $c->nama_jabatan ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bagian</label>
                            <select class="form-control" name="kd_bagian" id="" required>
                                <option value="<?php echo $a->kd_bagian ?>"><?php echo $a->nama_bagian ?></option>
                                <option value="">Pilih Bagian</option>
                                <?php foreach ($bagian as $b) : ?>
                                    <option value="<?php echo $b->kd_bagian ?>"><?php echo $b->nama_bagian ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Masuk</label>
                            <input name="tglmasuk_karyawan" type="date" class="form-control" value="<?php echo $a->tglmasuk_karyawan ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">BPJS Kesehatan</label>
                            <input name="bpjs_kes" type="number" class="form-control" value="<?php echo $a->bpjs_kes ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">BPJS Ketenagakerjaan</label>
                            <input name="bpjs_tk" type="number" class="form-control" value="<?php echo $a->bpjs_tk ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pensiun</label>
                            <input name="bpjs_pen" type="number" class="form-control" value="<?php echo $a->bpjs_pen ?>" required>
                        </div>
                        <div class="form-group">

                            <label for="">Foto</label>
                            <br>
                            <img width="100" height="100" src="<?php echo base_url('gambar/') . $a->gambar_karyawan ?>" alt="">
                            <br>
                            <input name="gambar_karyawan" type="file" class="form-control" value="">
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