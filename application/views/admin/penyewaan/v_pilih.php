<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i><?php echo $x1 ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2 ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x1 ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <p><?php echo $this->session->userdata('pesan') ?></p>
            <h4 class="text-black"><?php echo $x3 ?></h4>

            <form action="<?php echo base_url('admin/penyewaan/penyewaan') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label for="">Tanggal</label>
                            <input name="tgl_penyewaan" type="date" class="form-control" required>

                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label for="">Lapangan</label>
                            <select name="kd_lapangan" class="form-control" required>

                                <option value="">-- Pilih Lapangan --</option>
                                <?php foreach ($lapangan as $l) : ?>
                                    <option value="<?php echo $l->kd_lapangan ?>"><?php echo $l->nama_lapangan ?></option>
                                <?php endforeach ?>

                            </select>
                        </fieldset>
                    </div>

                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-search mr-1" aria-hidden="true"></i>Pilih</button>
                        </fieldset>
                    </div>
                </div>



            </form>


        </div>
        <!-- Main row -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->