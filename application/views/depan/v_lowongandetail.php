<?php foreach ($lowongan as $l) : ?>

    <section class="page-header">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 text-center">


                    <h3>
                        <?php echo $l->nama_lowongan ?>
                    </h3>

                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / Single Service
                    </p>


                </div>

            </div> <!-- end .row  -->

        </div> <!-- end .container  -->

    </section> <!-- end .page-header  -->

    <!-- SINGLE SERVICE PAGE -->

    <section class="section-content-block">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-sm-12">


                    <div class="widget site-sidebar">

                        <h2 class="widget-title">Our Packages</h2>

                        <ul class="widget-service-category clearfix">
                            <li>
                                <a title="service details" href="#">Kid | 4-35 Month </a>
                            </li>
                            <li>
                                <a title="service details" href="#">Junior | 3-4 Years </a>
                            </li>
                            <li>
                                <a title="service details" href="#">Teen | 8-16 Years</a>
                            </li>
                            <li>
                                <a title="service details" href="#">Pro | 16-40 Years</a>
                            </li>
                            <li>
                                <a title="service details" href="#">Family | 1-50 Years</a>
                            </li>
                            <li>
                                <a title="service details" href="#">Friends | 16-40 Years</a>
                            </li>
                        </ul>

                    </div> <!--  end .widget -->

                    <div class="widget site-sidebar">

                        <h2 class="widget-title">Testimonials</h2>

                        <div class="testimonial-container no-padding owl-carousel text-left padding-top-24" data-items="1" data-dots="false">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="testimony-layout-1  no-padding transparent-bg">

                                    <p class="testimony-text">
                                        Always friendly, honest service. Comparable prices and good advice.
                                    </p>

                                    <div class="testimony-info">
                                        <h4>Brandon Munson </h4>
                                        <h6>CTO, Fulcrum Design</h6>
                                    </div>
                                </div> <!-- end .testimony-layout-1  -->

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="testimony-layout-1  no-padding transparent-bg">
                                    <p class="testimony-text">
                                        Always friendly, honest service. Comparable prices and good advice.
                                    </p>
                                    <div class="testimony-info">
                                        <h4>Sunnybrook Church </h4>
                                        <h6 class="bq-author-info">CEO, HW Tech Inc</h6>
                                    </div>
                                </div> <!-- end .testimony-layout-1  -->

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                <div class="testimony-layout-1  no-padding transparent-bg">
                                    <p class="testimony-text">
                                        Always friendly, honest service. Comparable prices and good advice.
                                    </p>
                                    <div class="testimony-info">
                                        <h4>Sunnybrook Church </h4>
                                        <h6 class="bq-author-info">CEO, HW Tech Inc</h6>
                                    </div>
                                </div> <!-- end .testimony-layout-1  -->

                            </div>

                        </div> <!-- end .testimonial-container  -->

                    </div> <!--  end .widget -->

                    <div class="widget site-sidebar">

                        <h2 class="widget-title">Our Brochure</h2>

                        <div class="text-widget">
                            Swim Easy offers professional swimming classes at our academies throughout world.
                            The high level of customer service has allowed to open multiple swim training centers.
                            <p>
                                <a href="#"><img src="images/brochure.png" alt="" /></a>
                            </p>
                        </div>

                    </div> <!--  end .widget -->

                    <div class="widget site-sidebar">

                        <h2 class="widget-title">Contact Support</h2>

                        <div class="text-widget text-center">

                            <p>
                                <img src="images/support_user.jpg" alt="" class="img-circle img-thumbnail inline" />
                                <br />
                                <strong>John Bendonra</strong>
                                <br />
                                <i>Senior Trainer, Swim Easy</i>
                                <span class="block-primary-bg text-light-color padding-all-4 margin-top-24 db text-center">
                                    (+88)-0191-1613-458
                                </span>
                            </p>
                        </div>

                    </div> <!--  end .widget -->

                </div> <!-- end .col-sm-4  -->

                <div class="col-sm-8">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="single-service margin-bottom-24">
                                <a href="#" title="Service">
                                    <img src="<?php echo base_url('gambar/') . $l->gambar_lowongan ?>" alt="lowongan" />
                                </a>
                            </div> <!--  end articles -->



                            <div class="single-service-content">


                                <h2 class="block-heading-title text-capitalize"><?php echo $l->nama_lowongan ?></h2>
                                <hr />
                                <?php echo $l->detail_lowongan ?>



                                <button class="btn btn-danger btn-sm text-highlighter-white"><i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Paling lambat <?php echo $this->Mglobal->tanggalindo($l->tgl_tutup) ?></button>
                                <?php if ($this->session->userdata('status') == 'login') {
                                    if ($this->session->userdata('posisi') == 'pelamar') {
                                        $kd_pelamar = $this->session->userdata('kd_pelamar');
                                        $kd_lowongan = $l->kd_lowongan;
                                        $tglsekarang = date('Y-m-d');
                                        $sudah = $this->db->query("select * from tbl_seleksi where kd_pelamar='$kd_pelamar' and kd_lowongan='$kd_lowongan'")->num_rows();
                                        $sudahsatu = $this->db->query("select * from tbl_seleksi S, tbl_lowongan L where S.kd_lowongan=L.kd_lowongan and  S.kd_pelamar='$kd_pelamar' and L.tgl_tutup>='$tglsekarang'")->num_rows();
                                        if ($sudah > 0) { ?>
                                            <button class="btn btn-sm btn-danger">Anda sudah daftar lowongan ini</button>
                                        <?php   } else { ?>
                                            <?php if ($sudahsatu > 0) { ?>
                                                <button class="btn btn-sm btn-danger">Anda Daftar di Lowongan Lain</button>
                                            <?php } else { ?>

                                                <a href="" class="btn btn-primary btn-lg mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $l->kd_lowongan ?>"> <i class="fa check mr-2"></i> Apply </a>
                                            <?php } ?>
                                        <?php    }   ?>
                                    <?php   }   ?>
                                <?php } else { ?>
                                    <a href="" class="btn btn-primary btn-lg mb-1" data-toggle="modal" data-target="#pesandata<?php echo $l->kd_lowongan ?>"> <i class="fa check mr-2"></i> Apply </a>
                                <?php } ?>


                                <hr />



                            </div>

                            <div class="single-service-content">
                                <h3 class="block-heading-title text-capitalize">Popular Questions:</h3>
                                <hr />

                                <div class="faq-layout margin-top-16" id="accordion">

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What Maintenance Should I be doing and when?</a>
                                            </p>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Talk to your veterinarian about how to care for your older pet and be prepared for possible age-related health issues. Senior pets require increased attention, including more frequent visits to the veterinarian, possible changes in diet, and in some cases alterations to their home environment.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How do I know when my car needs a tune up?</a>
                                            </p>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Talk to your veterinarian about how to care for your older pet and be prepared for possible age-related health issues. Senior pets require increased attention, including more frequent visits to the veterinarian, possible changes in diet, and in some cases alterations to their home environment.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">How should I prepare my car for a road trip?</a>
                                            </p>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Talk to your veterinarian about how to care for your older pet and be prepared for possible age-related health issues. Senior pets require increased attention, including more frequent visits to the veterinarian, possible changes in diet, and in some cases alterations to their home environment.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What Maintenance Should I be doing and when?</a>
                                            </p>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                We all to some extent are on an End of Life journey. For some of our clients and their family additional care and help is required as they progress through this journey. Care on Call work closely with.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How do I know when my car needs a tune up?</a>
                                            </p>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Talk to your veterinarian about how to care for your older pet and be prepared for possible age-related health issues. Senior pets require increased attention, including more frequent visits to the veterinarian, possible changes in diet, and in some cases alterations to their home environment.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default faq-box">
                                        <div class="panel-heading">
                                            <p class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">How do I know when my car needs a tune up?</a>
                                            </p>
                                        </div>
                                        <div id="collapseEight" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Talk to your veterinarian about how to care for your older pet and be prepared for possible age-related health issues. Senior pets require increased attention, including more frequent visits to the veterinarian, possible changes in diet, and in some cases alterations to their home environment.
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end .col-md-6  -->

                            </div>

                        </div>

                    </div> <!-- end .container  -->

                </div>

            </div>

        </div>

    </section> <!--  end .section-our-team -->
<?php endforeach; ?>
<?php foreach ($lowongan as $l) : ?>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="hapusdata<?php echo $l->kd_lowongan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white ">
                    <h5 class="modal-title" id="exampleModalLabel"> Lamar <?php echo $l->nama_lowongan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('lowongan/lamar') ?>" method="post">
                        <label for=""></label>
                        <input type="hidden" name="kd_lowongan" value="<?php echo $l->kd_lowongan ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fa fa-check"> Lamar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($lowongan as $l) : ?>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="pesandata<?php echo $l->kd_lowongan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-info text-white ">
                    <h5 class="modal-title" id="exampleModalLabel"> Lamar <?php echo $l->nama_lowongan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">ANDA HARUS LOGIN /DAFTAR DULU</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?php echo base_url('depan/daftar') ?>">
                        <button type="button" class="btn btn-primary fa fa-check"> Daftar</button>
                    </a>
                    <a href="<?php echo base_url('login') ?>">
                        <button type="button" class="btn btn-primary fa fa-check"> Login</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>