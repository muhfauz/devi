<!--  PAGE HEADING -->

<section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    <?php echo $judul ?>
                </h3>

                <p class="page-breadcrumb">
                    <a href="<?php echo base_url('depan') ?>">Home</a> / <?php echo $judul ?>
                </p>

            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<!-- SECTION ABOUT US  -->
<?php foreach ($tentang as $t) : ?>
    <section class="section-content-block">
        <div class="container">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 text-left">
                            <h2 class="block-heading-title"><?php echo $t->judul_tentang ?></h2>

                            <?php echo $t->isi_tentang ?>

                            <p class="margin-top-24 margin-bottom-32">
                                <!-- <a href="#" class="btn btn-theme btn-theme-invert">Explore All Packages</a> -->
                            </p>
                        </div> <!-- end .col-sm-12  -->

                        <div class="col-md-6  col-sm-12 col-xs-12">

                            <figure class="about-img theme-custom-box-shadow">
                                <a class="venobox wow bounceIn vbox-item animated" data-vbtype="video" data-autoplay="true" href="<?php echo base_url() . $t->url_tentang ?>" style="visibility: visible; animation-name: bounceIn;"><i class="fa fa-play"></i></a>
                                <img src="<?php echo base_url('gambar/') . $t->gambar_tentang ?>" alt="about">
                            </figure> <!-- end .cause-img  -->

                        </div>

                    </div>

                </div>



            </div> <!--  end .row  -->
        </div> <!--  end .container -->
    </section> <!--  end .appointment-section  -->
<?php endforeach; ?>

<!-- SECTION ABOUT US  -->