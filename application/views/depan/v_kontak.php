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

<!--  MAIN CONTENT  -->

<section class="section-content-block border-bottom-1p-solid-light">

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h2 class="contact-title"> <?php echo $judul ?></h2>
            </div>

            <div class="col-md-8">

                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-home"></i></span>
                        <address> <?php echo $this->db->query("select * from tbl_perusahaan")->row()->alamat_perush ?></address>
                    </li>
                </ul>

            </div>

            <div class="col-md-3">

                <ul class="contact-info">

                    <li>
                        <span class="icon-container"><i class="fa fa-phone"></i></span>
                        <address><a href="#"><?php echo $this->db->query("select * from tbl_perusahaan")->row()->telepon_perush ?></a></address>
                    </li>

                </ul>

            </div>

            <div class="col-md-3">
                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-envelope"></i></span>
                        <address><a href="mailto:"><?php echo $this->db->query("select * from tbl_perusahaan")->row()->email_perush ?></a></address>
                    </li>
                </ul>

            </div>



        </div>

    </div>

</section>


<section class="section-content-block section-contact-block">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 wow fadeInCenter">

                <h2 class="contact-title">Lokasi Kami</h2>


                <!-- <div class="section-google-map-block wow fadeInUp"> -->
                <?php echo $this->db->query("select * from tbl_perusahaan")->row()->url_perush ?>

                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d22415.65299095339!2d108.45159678001504!3d-6.700663903643436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce6a267b0b764201!2sBintang%20Futsal!5e0!3m2!1sid!2sid!4v1673229333306!5m2!1sid!2sid" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->




            </div> <!--  end col-sm-6  -->





        </div> <!-- end row  -->

    </div> <!--  end .container -->

</section> <!-- end .section-content-block  -->