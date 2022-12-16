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
            <?php foreach ($pembelian as $p) { ?>
                <div class="row ml-1 mr-1 bg-blue-gradient ">
                    <div class="col sm-1 mt-2 ml-2 mr-2">
                        <form class="form" action="<?php echo base_url('admin/transaksi/pembelian/simpaneditpembelian') ?>" method="POST">
                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">No Transaksi</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_pembelian" id="kd_pembelian" placeholder="No Tranaksi" type="text" readonly value="<?php echo $p->kd_pembelian; ?>">
                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Nama Suplier*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_suplier" id="kd_suplier" placeholder="Nama suplier" type="hidden" value="<?php echo $p->kd_suplier ?>">
                                        <input class="form-control" id="namasuplier" placeholder="Nama Suplier" type="text" readonly value="<?php echo $p->nama_suplier ?>">
                                        <div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="mt-2 col sm-1 mr-2 mb-0">
                        <div class="form-group row">
                            <label for="web" class="col-sm-3 control-label">Tanggal Pembelian</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="tgl_pembelian" id="exampleInputuname3" placeholder="" type="date" value="<?php echo $p->tgl_pembelian ?>" required>
                                    <div class="input-group-addon"><i class="fa fa-themeisle" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Nomor Faktur</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="no_fakturpembelian" id="uang_mukazss" placeholder="Nomor Faktur Pembelian" type="text" required value="<?php echo $p->no_fakturpembelian ?>">
                                    <input class="form-control" name="total_pembelian" id="total_pembelian" placeholder="Total Bayar" type="hidden">
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
                                        <input class="form-control" type="hidden" id="kd_detailpembeliantemp" placeholder=" Kode barang" type="text">
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
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Ijin Edar</label>
                                        <input class="form-control" placeholder="" type="text" id="ijin_edar">
                                        <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Harga Setelah Diskon</label>
                                        <input class="form-control" placeholder="" type="number" id="hna_std">
                                        <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Jumlah Pembelian</label>
                                        <input class="form-control" placeholder="" type="number" id="jumlah_pembelian">
                                        <span class="fa fa-briefcase form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Expired Date</label>
                                        <input class="form-control" placeholder="Expired Date" type="date" id="ED">
                                        <span class="fa fa-globe form-control-feedback" aria-hidden="true"></span>
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
                            <th class="text-center text-white">Ijin Edar</th>
                            <th class="text-center text-white">Expired Date</th>
                            <th class="text-center text-white">Banyak</th>
                            <th class="text-center text-white">Harga </th>
                            <th class="text-center text-white">Total bayar </th>

                            <th class="text-center text-white" width="300px"></th>
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
                    <label for="">Kode suplier</label>
                    <input name="kd_suplier" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_suplier", "tbl_suplier", "PEL") ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama suplier</label>
                    <input name="nama_suplier" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Alamat suplier</label>
                    <input name="alamat_suplier" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nomor HP suplier</label>
                    <input name="nohp_suplier" type="number" class="form-control" required>
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
<?php foreach ($suplier as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_suplier ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode suplier</th>
                            <td><?php echo $a->kd_suplier ?></td>
                        </tr>
                        <tr>
                            <th>Nama suplier</th>
                            <td><?php echo $a->nama_suplier ?></td>
                        </tr>
                        <tr>
                            <th>Harga sewa</th>
                            <td><?php echo $a->harga_sewa ?></td>
                        </tr>
                        <tr>
                            <th>Detail suplier</th>
                            <td><?php echo $a->detail_suplier ?></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td><?php echo $a->jumlah_suplier ?></td>
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
<?php foreach ($suplier as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_suplier ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/suplier/hapussuplier') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_suplier" type="text" class="form-control" value="<?php echo $a->nama_suplier ?>" required> -->
                            <input name="kd_suplier" type="hidden" class="form-control" value="<?php echo $a->kd_suplier ?>" required>
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
<?php foreach ($suplier as $a) : ?>


    <div class="modal fade" id="showsuplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Data suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tabelsuplier" class="table table-bordered table-striped table-hover mr-2">
                        <thead class="bg-aqua">
                            <tr>
                                <th class="text-center text-white" width="10px">No</th>
                                <!-- <th class="text-center text-white">Kode suplier</th> -->
                                <th class="text-center text-white">Nama suplier</th>
                                <th class="text-center text-white">Alamat suplier</th>
                                <!-- <th class="text-center text-white">Nomor HP</th> -->
                                <!-- <th class="text-center text-white">Foto 1</th>
                            <th class="text-center text-white">Foto 2</th> -->
                                <th class="text-center text-white" width="80px"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($suplier as $a) :  ?>
                                <tr>
                                    <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                    <!-- <td><?php echo $a->kd_suplier ?></td> -->
                                    <td><?php echo $a->nama_suplier ?></td>
                                    <td width="80px"><?php echo $a->alamat_suplier ?></td>
                                    <!-- <td><?php echo $a->nohp_suplier ?></td> -->
                                    </td>
                                    <td>
                                        <!-- <a href="#" class="btn btn-info btn-sm mb-1 pilih" data-kodepel="<?php $a->kd_suplier ?>" data-namapel="<?php $a->nama_suplier ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                        <a href="#" class="btn btn-primary pilihsaja" data-kdpel="<?php echo $a->kd_suplier ?>" data-namapel="<?php echo $a->nama_suplier ?>"> <i class="fa fa-check" aria-hidden="true"></i> </a>
                                        <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_suplier ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->
                                        <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_suplier ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                        <!-- <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_suplier ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a> -->
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
            <div class="modal-header bg-aqua">
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


                                </td>
                                <td class="float-left">
                                    <!-- <a href="#" class="btn btn-info btn-sm mb-1 pilih" data-kodepel="<?php $a->kd_suplier ?>" data-namapel="<?php $a->nama_suplier ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                    <a href="#" class="btn btn-primary pilihbarang" kd_barang="<?php echo $p->kd_barang ?>" nama_barang="<?php echo $p->nama_barang ?>"> <i class="fa fa-check" aria-hidden="true"></i></a>
                                    <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_suplier ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->
                                    <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_suplier ?>"> <i class="fa fa-edit mr-2"></i> Pilih</a> -->
                                    <!-- <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_suplier ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a> -->
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
                url: "<?php echo base_url('admin/transaksi/pembelian/tampilkanpembeliantemp') ?>",
                data: {
                    kd_barang: kd_barang,
                },
                cache: false,
                success: function(respond) {
                    $('#tampilkanbarangx').html(respond);
                    $('#kd_barang').val('');
                    $('#nama_barang').val('');
                    $('#ijin_edar').val('');
                    $('#jumlah_pembelian').val('');
                    $('#hna_std').val('');
                    $('#ED').val('');
                    document.getElementById("kd_barang").readOnly = false;
                    var myElement = document.getElementById("tambahbarang1");
                    myElement.textContent = "Tambah";
                }
            })
        }
        tampilkanbarang();

        // $(#namasuplier).click

        $('#namasuplier').click(function() {
            $('#showsuplier').modal('show');
        });
        $('.pilihsaja').click(function() {
            var kd_suplier = $(this).attr("data-kdpel");
            var nama_suplier = $(this).attr("data-namapel");

            // var nama_suplier = $($this).attr("data-kodepel");
            //var kd_suplier = "xxx";
            $('#kd_suplier').val(kd_suplier);
            $('#namasuplier').val(nama_suplier);
            $('#namaxx').val("Malah ngoding");
            $('#showsuplier').modal('hide');
        });
        $('#tabelsuplier').DataTable();
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
            var kd_barang = $(this).attr("kd_barang");
            var nama_barang = $(this).attr("nama_barang");
            var harga_barang = $(this).attr("harga_barang");

            // var nama_suplier = $($this).attr("data-kodepel");
            //var kd_suplier = "xxx";
            $('#kd_barang').val(kd_barang);
            $('#nama_barang').val(nama_barang);
            $('#harga_barang').val(harga_barang);
            $('#showbarang').modal('hide');
        });
        $('#tabelbarang').DataTable();

        function editbarang() {
            var kd_detailpembeliantemp = $('#kd_detailpembeliantemp').val();
            var kd_barang = $('#kd_barang').val();
            var ijin_edar = $('#ijin_edar').val();
            var hna_std = $('#hna_std').val();
            var jumlah_pembelian = $('#jumlah_pembelian').val();
            var ED = $('#ED').val();
            var total_bayar = jumlah_pembelian * hna_std;
            $.ajax({

                type: "POST",
                url: "<?php echo base_url('admin/transaksi/pembelian/editdetailpembeliantemp') ?>",
                data: {
                    kd_detailpembeliantemp: kd_detailpembeliantemp,
                    kd_barang: kd_barang,
                    ijin_edar: ijin_edar,
                    hna_std: hna_std,
                    jumlah_pembelian: jumlah_pembelian,
                    ED: ED,
                    total_bayar: total_bayar,
                },
                cache: false,
                success: function(respond) {
                    alert("Berhasil diedit");
                    tampilkanbarang();
                }
            })
        }

        $('#tambahbarang1').click(function() {
            var myElement = document.getElementById("tambahbarang1");
            var tombole = myElement.innerText;
            if (tombole == 'Tambah') {
                var kd_barang = $('#kd_barang').val();
                var ijin_edar = $('#ijin_edar').val();
                var hna_std = $('#hna_std').val();
                var jumlah_pembelian = $('#jumlah_pembelian').val();
                var ED = $('#ED').val();
                var kd_pembelian = $('#kd_pembelian').val();
                var total_bayar = jumlah_pembelian * hna_std;
                if (kd_barang == "") {
                    alert("Kode barang Tidak boleh Kosong");

                } else if (ijin_edar == "") {
                    alert("Ijin Edar Tidak boleh Kosong");
                } else if (hna_std == "") {
                    alert("Harga Pembelian Tidak boleh Kosong");
                } else if (jumlah_pembelian == "") {
                    alert("Jumlah Pembelian Tidak boleh Kosong");
                } else if (ED == "") {
                    alert("Expired Date Tidak boleh Kosong");

                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('admin/transaksi/pembelian/aksitambahpembelian') ?>",
                        data: {
                            kd_barang: kd_barang,
                            ijin_edar: ijin_edar,
                            hna_std: hna_std,
                            kd_pembelian: kd_pembelian,
                            jumlah_pembelian: jumlah_pembelian,
                            ED: ED,
                            total_bayar: total_bayar,
                        },
                        cache: false,
                        success: function(respond) {
                            if (respond == 1) {
                                alert("Kode barang Sudah Ada");
                            } else {
                                alert("Berhasil disimpan");
                                tampilkanbarang();
                            }
                            // var objResult = JSON.parse(result);
                            // $("#pesan").html(objResult.pesan);
                            // onload();
                        }
                    })
                }
            } else { //else tombole
                editbarang();
            }

        });





    });
    //$('#tabelsuplier').DataTable();
</script>