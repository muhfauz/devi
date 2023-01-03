<!--  PAGE HEADING -->

<section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Our Services
                </h3>

                <p class="page-breadcrumb">
                    <a href="#">Home</a> / Our Services
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->


<!--  SECTION SERVICE 03 -->

<section class="section-content-block section-secondary-bg section-curve-white-overlary">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h4 class="heading-alt-style text-capitalize text-dark-color">OUR PACKAGES</h4>
                <span class="heading-separator heading-separator-horizontal"></span>
                <h2 class="subheading-alt-style">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur eu ante non ex lobortis posuere
                    <br />
                    volutpat nec orci morbi facilisis massa lectus volutpat posuere volutpat.
                </h2>
            </div> <!-- end .col-sm-12  -->

        </div>

        <div class="row">
            <?php foreach ($lowongan as $l) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <a href="#">

                        <article class="service-block-2 text-center">
                            <a href="<?php echo base_url('lowongan/detail/') . $l->kd_lowonganen ?>">
                                <figure>

                                    <img src="<?php echo base_url('gambar/') . $l->gambar_lowongan ?>" alt="service" />

                                    <span class="fa fa-check-square"></span>
                                </figure>
                            </a>

                            <h3>
                                <?php echo $l->nama_lowongan ?>
                                <br />
                                <span>Deadline <?php echo $this->Mglobal->tanggalindo($l->tgl_tutup) ?></span>
                            </h3>

                        </article>

                    </a>

                </div> <!--  end .col-lg-4 col-md-4 col-sm-12  -->
            <?php endforeach; ?>











        </div> <!--  end .row  -->

    </div> <!--  end .container  -->

</section> <!--  end .section-content-block -->