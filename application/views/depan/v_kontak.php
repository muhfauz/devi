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

            <div class="col-md-3">

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

            <div class="col-md-3">

                <ul class="contact-info">
                    <li>
                        <span class="icon-container"><i class="fa fa-globe"></i></span>
                        <address><a href="<?php echo base_url('depan') ?>">bintangfutsaljamblang.site</a></address>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</section>


<section class="section-content-block section-contact-block">

    <div class="container">

        <div class="row">

            <div class="col-sm-6 wow fadeInRight">

                <h2 class="contact-title">Our Location</h2>


                <div class="section-google-map-block wow fadeInUp">

                    <div id="map_canvas"></div>

                </div> <!-- end .section-content-block  -->

            </div> <!--  end col-sm-6  -->

            <div class="col-sm-6 wow fadeInLeft">

                <div class="contact-form-block">

                    <h2 class="contact-title">Say Hello To Us</h2>

                    <form role="form" action="#" method="post" id="contact-form">

                        <div class="form-group">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" data-msg="Please Write Your Name" />
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" data-msg="Please Write Your Valid Email" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_subject" name="email_subject" placeholder="Subject" data-msg="Please Write Your Message Subject" />
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="email_message" id="email_message" placeholder="Message" data-msg="Please Write Your Message"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-theme">Send Now</button>
                        </div>

                    </form>

                </div> <!-- end .contact-form-block  -->

            </div> <!--  end col-sm-6  -->



        </div> <!-- end row  -->

    </div> <!--  end .container -->

</section> <!-- end .section-content-block  -->