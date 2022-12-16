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
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4>
            <?php foreach ($penjualan as $p) { ?>
                <div class="row ml-1 mr-1 bg-blue-gradient ">
                    <div class="col sm-1 mt-2 ml-2 mr-2">
                        <form class="form" action="<?php echo base_url('admin/transaksi/penjualan/simpaneditpenjualan') ?>" method="POST">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">No Transaksi</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="<?php echo $p->kd_penjualan ?>" required>
                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Nama outlet*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_outlet" id="kd_outlet" placeholder="Nama outlet" type="hidden" value="<?php echo $p->kd_outlet ?>">
                                        <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" required value="<?php echo $p->nama_outlet ?>">
                                        <div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="mt-2 col sm-1 mr-2 mb-0">
                        <div class="form-group row">
                            <label for="web" class="col-sm-3 control-label">Tanggal penjualan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="tgl_penjualan" id="exampleInputuname3" placeholder="" type="date" required value="<?php echo $p->tgl_penjualan ?>">
                                    <div class="input-group-addon"><i class="fa fa-themeisle" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Nomor Faktur</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="no_fakturpenjualan" id="uang_mukazss" placeholder="Nomor Faktur penjualan" type="text" required value="<?php echo $p->no_fakturpenjualan ?>">
                                    <input class="form-control" name="total_penjualan" id="total_penjualan" placeholder="Total Bayar" type="hidden" value="<?php echo $p->total_penjualan ?>">
                                    <div class="input-group-addon"><i class="fa fa-google-wallet" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Main content -->


    <div class="content">
        <div class="info-box">
            <div class="row m-t-3">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-blue">
                            <h5 class="text-white m-b-0">User Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Kode Barang</label>
                                        <input class="form-control" id="kd_barang" placeholder="Kode Barang" type="text" readonly>
                                        <input class="form-control" type="hidden" id="kd_detailpembelian" placeholder=" Kode barang" type="text">
                                        <input class="form-control" name="kd_detailpenjualantemp" type="hidden" id="kd_detailpenjualantemp" placeholder=" Kode barang" type="text">
                                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Nama Barang</label>
                                        <input class="form-control" placeholder="Last Name" type="text" id="nama_barang" readonly>
                                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Ijin Edar</label>
                                        <input class="form-control" placeholder="" type="text" id="ijin_edar" readonly>
                                        <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Harga Jual</label>
                                        <input class="form-control" placeholder="" type="number" id="hargajual_barang" readonly>
                                        <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Expired Date</label>
                                        <input class="form-control" placeholder="Expired Date" type="date" id="ED" readonly>
                                        <span class="fa fa-globe form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Jumlah penjualan</label>
                                        <input class="form-control" placeholder="" type="number" id="jumlah_penjualan">
                                        <span class="fa fa-briefcase form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4> -->

            <!-- <form> -->
            <div class="row mb-2 mt-2">
                <div class="col sm-1">
                    <!-- <input class="form-control btn btn-primary" id="exampleInputuname3" placeholder="Username" type="submit"> -->
                    <a href="#" class="btn btn-facebook" id="tambahbarang1">
                        <i class="fa fa-shopping-basket mr-2" aria-hidden="true">Tambah</i>
                    </a>
                </div>
            </div>
            <!-- </form> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <?php echo $this->session->userdata('pesanx'); ?>
                <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
                <table id="example1x" class="table table-bordered table-striped table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Kode barang</th>
                            <th class="text-center text-white">Nama barang</th>
                            <th class="text-center text-white">Jumlah </th>
                            <th class="text-center text-white">Expired Date</th>
                            <th class="text-center text-white">Harga </th>
                            <th class="text-center text-white">Total bayar </th>

                            <th class="text-center text-white" width="100px"></th>
                        </tr>
                    </thead>
                    <tbody id="tampilkanbarangx">

                    </tbody>

                </table>


                <!-- <button class="btn btn-facebook tombol_simpan" type="submit">Simpan</button> -->

                <button type="submit" class="btn btn-primary btn-block btn-flat"> <i class="fa fa-floppy-o mr-2 rounded-2" aria-hidden="true"></i> Simpan Transaksi </button>


            </div>
        </div>

    </div>

    </form>
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

                <div class="form-group">
                    <label for="">Kode outlet</label>
                    <input name="kd_outlet" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_outlet", "tbl_outlet", "PEL") ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama outlet</label>
                    <input name="nama_outlet" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Alamat outlet</label>
                    <input name="alamat_outlet" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nomor HP outlet</label>
                    <input name="nohp_outlet" type="number" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($outlet as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_outlet ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data outlet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode outlet</th>
                            <td><?php echo $a->kd_outlet ?></td>
                        </tr>
                        <tr>
                            <th>Nama outlet</th>
                            <td><?php echo $a->nama_outlet ?></td>
                        </tr>
                        <tr>
                            <th>Harga sewa</th>
                            <td><?php echo $a->harga_sewa ?></td>
                        </tr>
                        <tr>
                            <th>Detail outlet</th>
                            <td><?php echo $a->detail_outlet ?></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td><?php echo $a->jumlah_outlet ?></td>
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


<!-- akhir detail -->

<!-- Modal -->
<?php foreach ($outlet as $a) : ?>


    <div class="modal fade" id="showoutlet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Data outlet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tabeloutlet" class="table table-bordered table-striped table-hover mr-2">
                        <thead class="bg-aqua">
                            <tr>
                                <th class="text-center text-white" width="10px">No</th>
                                <!-- <th class="text-center text-white">Kode outlet</th> -->
                                <th class="text-center text-white">Nama outlet</th>
                                <th class="text-center text-white">Alamat outlet</th>
                                <!-- <th class="text-center text-white">Nomor HP</th> -->
                                <!-- <th class="text-center text-white">Foto 1</th>
                            <th class="text-center text-white">Foto 2</th> -->
                                <th class="text-center text-white" width="80px"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($outlet as $a) :  ?>
                                <tr>
                                    <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                    <!-- <td><?php echo $a->kd_outlet ?></td> -->
                                    <td><?php echo $a->nama_outlet ?></td>
                                    <td width="80px"><?php echo $a->alamat_outlet ?></td>
                                    <!-- <td><?php echo $a->nohp_outlet ?></td> -->
                                    </td>
                                    <td>
                                        <!-- <a href="#" class="btn btn-info btn-sm mb-1 pilih" data-kodepel="<?php $a->kd_outlet ?>" data-namapel="<?php $a->nama_outlet ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                        <a href="#" class="btn btn-primary pilihsaja" data-kdpel="<?php echo $a->kd_outlet ?>" data-namapel="<?php echo $a->nama_outlet ?>"> <i class="fa fa-check" aria-hidden="true"></i> </a>
                                        <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_outlet ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->
                                        <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_outlet ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                        <!-- <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_outlet ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>



                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<div class="modal fade" id="showbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Data barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabelbarang" class="table table-bordered table-striped table-hover mr-2">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Kode barang</th>
                            <th class="text-center text-white">Nama barang</th>
                            <th class="text-center text-white">Expired Date</th>
                            <th class="text-center text-white">Stok Barang</th>


                            <!-- <th class="text-center text-white">Foto 1</th>
                            <th class="text-center text-white">Foto 2</th> -->
                            <th class="text-center text-white"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $p) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $p->kd_barang ?></td>
                                <td><?php echo $p->nama_barang ?></td>
                                <td><?php echo date('d F Y', strtotime($p->ED)) ?></td>
                                <td><?php echo $p->stok_pembelian ?></td>


                                </td>
                                <td class="float-left">
                                    <!-- <a href="#" class="btn btn-info btn-sm mb-1 pilih" data-kodepel="<?php $a->kd_outlet ?>" data-namapel="<?php $a->nama_outlet ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                    <a href="#" class="btn btn-primary pilihbarang" kd_detailpembelian="<?php echo $p->kd_detailpembelian ?>" kd_barang="<?php echo $p->kd_barang ?>" nama_barang="<?php echo $p->nama_barang ?>" ijin_edar="<?php echo $p->ijin_edar ?>" hna_std="<?php echo $p->hna_std ?>" ED="<?php echo $p->ED ?>"> <i class="fa fa-check" aria-hidden="true"></i></a>
                                    <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_outlet ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->
                                    <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_outlet ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                    <!-- <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_outlet ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a> -->
                                </td>
                            </tr>
                        <?php endforeach ?>

                </table>



            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button> -->
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    // $(document).ready(function() {
    $(function() {
        function tampilkanbarang() {
            var kd_barang = $('#kd_barang').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/transaksi/penjualan/tampilkanpenjualantemp') ?>",
                data: {
                    kd_barang: kd_barang,
                },
                cache: false,
                success: function(respond) {
                    $('#tampilkanbarangx').html(respond);
                    $('#kd_barang').val('');
                    $('#nama_barang').val('');
                    $('#ijin_edar').val('');
                    $('#jumlah_penjualan').val('');
                    $('#hargajual_barang').val('');
                    $('#ED').val('');
                    document.getElementById("kd_barang").readOnly = false;
                    var myElement = document.getElementById("tambahbarang1");
                    myElement.textContent = "Tambah";
                }
            })
        }
        tampilkanbarang();

        // $(#namaoutlet).click

        $('#namaoutlet').click(function() {
            $('#showoutlet').modal('show');
        });
        $('.pilihsaja').click(function() {
            var kd_outlet = $(this).attr("data-kdpel");
            var nama_outlet = $(this).attr("data-namapel");

            // var nama_outlet = $($this).attr("data-kodepel");
            //var kd_outlet = "xxx";
            $('#kd_outlet').val(kd_outlet);
            $('#namaoutlet').val(nama_outlet);
            $('#namaxx').val("Malah ngoding");
            $('#showoutlet').modal('hide');
        });
        $('#tabeloutlet').DataTable();
        $('#kd_barang').click(function() {
            $('#showbarang').modal('show');
        });
        $('#nama_barang').click(function() {
            $('#showbarang').modal('show');
        });
        $('#editbarang1').click(function() {
            $('#showbarang').modal('show');
        });
        $('.pilihbarang').click(function() {
            var kd_detailpembelian = $(this).attr("kd_detailpembelian");
            var kd_barang = $(this).attr("kd_barang");
            var nama_barang = $(this).attr("nama_barang");
            var ijin_edar = $(this).attr("ijin_edar");
            var ED = $(this).attr("ED");
            var hargajual_barang = $(this).attr("hna_std") * 1.2;

            // var nama_outlet = $($this).attr("data-kodepel");
            //var kd_outlet = "xxx";
            $('#kd_detailpembelian').val(kd_detailpembelian);
            $('#kd_barang').val(kd_barang);
            $('#nama_barang').val(nama_barang);
            $('#ijin_edar').val(ijin_edar);
            $('#ED').val(ED);
            $('#hargajual_barang').val(hargajual_barang);
            $('#showbarang').modal('hide');
        });
        $('#tabelbarang').DataTable();

        function editbarang() {
            var kd_detailpenjualantemp = $('#kd_detailpenjualantemp').val();
            var kd_detailpembelian = $('#kd_detailpembelian').val();
            var kd_barang = $('#kd_barang').val();
            var hargajual_barang = $('#hargajual_barang').val();
            var jumlah_penjualan = $('#jumlah_penjualan').val();
            var ED = $('#ED').val();
            var kd_penjualan = $('#kd_penjualan').val();
            var total_bayarpenjualan = jumlah_penjualan * hargajual_barang;
            $.ajax({

                type: "POST",
                url: "<?php echo base_url('admin/transaksi/penjualan/editdetailpenjualantemp') ?>",
                data: {
                    kd_detailpenjualantemp: kd_detailpenjualantemp,
                    kd_barang: kd_barang,
                    kd_penjualan: kd_penjualan,
                    kd_detailpembelian: kd_detailpembelian,
                    ED: ED,
                    hargajual_barang: hargajual_barang,
                    jumlah_penjualan: jumlah_penjualan,
                    total_bayarpenjualan: total_bayarpenjualan,
                },
                cache: false,
                success: function(respond) {
                    swal("Selamat!", "Data berhasil diedit!", "success");
                    tampilkanbarang();
                }
            })
        }

        $('#tambahbarang1').click(function() {
            var myElement = document.getElementById("tambahbarang1");
            var tombole = myElement.innerText;
            if (tombole == 'Tambah') {
                var kd_detailpembelian = $('#kd_detailpembelian').val();
                var kd_barang = $('#kd_barang').val();
                var hargajual_barang = $('#hargajual_barang').val();
                var jumlah_penjualan = $('#jumlah_penjualan').val();
                var ED = $('#ED').val();
                var kd_penjualan = $('#kd_penjualan').val();
                var total_bayarpenjualan = jumlah_penjualan * hargajual_barang;
                if (kd_barang == "") {
                    swal("Peringatan!", "Kode Barang Harus Diisi!", "warning");
                } else if (jumlah_penjualan == "") {
                    swal("Peringatan!", kd_detailpembelian + "Jumlah Penjualan Harus Diisi!", "warning");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('admin/transaksi/penjualan/aksitambahpenjualan') ?>",
                        data: {
                            kd_barang: kd_barang,
                            kd_penjualan: kd_penjualan,
                            kd_detailpembelian: kd_detailpembelian,
                            ED: ED,
                            hargajual_barang: hargajual_barang,
                            jumlah_penjualan: jumlah_penjualan,
                            total_bayarpenjualan: total_bayarpenjualan,
                        },
                        cache: false,
                        success: function(respond) {
                            if (respond == 1) {
                                alert("Kode barang Sudah Ada");
                            } else {
                                swal("Selamat!", "Data Berhasil Disimpan!", "success");
                                tampilkanbarang();
                            }
                        }
                    })
                }
            } else { //else tombole
                editbarang();
            }

        });





    });
    //$('#tabeloutlet').DataTable();
</script>