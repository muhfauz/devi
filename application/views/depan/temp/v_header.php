<!--  HEADER STYLE 04 -->

<!--  HEADER STYLE  02-->

<header class="main-header clearfix" data-sticky_header="true">

    <div class="top-bar">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">

                    <ul class="top-bar-info clearfix  text-left">
                        <li><span class="fa fa-envelope-o text-primary-color"></span> &nbsp; info@your-domain.com</li>
                        <li><span class="fa fa-support text-primary-color"></span> &nbsp; +880-1911623458</li>
                    </ul>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="top-bar-social square-layout text-dark-color text-right">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>


            </div>

        </div> <!--  end .container -->

    </div> <!--  end .top-bar  -->

    <section class="header-wrapper navgiation-wrapper">

        <div class="navbar navbar-default">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="<?php echo base_url('depan') ?>"><img alt="" src="<?php echo base_url('assets/img/') . $this->db->query("select * from tbl_perusahaan")->row()->logo_depan ?>"></a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="drop">
                            <a href="<?php echo base_url('depan') ?>" title="Home Layout 01">Home</a>

                        </li>
                        <li>
                            <a href="#" title="About Us">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('lowongan') ?>" title="About Us">Lowongan</a>
                        </li>

                        <li class="drop">
                            <a href="#">Pages</a>
                            <ul class="drop-down">
                                <li class="drop">
                                    <a href="service.html" title="Services">Services</a>
                                    <ul class="drop-down level3">
                                        <li><a href="service-details.html">Services Details</a></li>
                                    </ul>
                                </li>
                                <li class="drop">
                                    <a href="team.html" title="Team">Our Team</a>
                                    <ul class="drop-down level3">
                                        <li><a href="single-team.html">Single Team</a></li>
                                    </ul>
                                </li>
                                <li class="drop">
                                    <a href="#">Gallery</a>
                                    <ul class="drop-down level3">
                                        <li><a href="gallery-1.html">Layout 01</a></li>
                                        <li><a href="gallery-2.html">Layout 02</a></li>
                                        <li><a href="gallery-3.html">Layout 03</a></li>
                                    </ul>
                                </li>

                                <li class="drop">
                                    <a href="#">Elements 01</a>
                                    <ul class="drop-down level3">

                                        <li><a href="element-info-box.html">Info Boxes</a></li>
                                        <li><a href="element-feedback.html">Testimonials</a></li>
                                        <li><a href="appointment.html" title="APPOINTMENT">APPOINTMENT</a></li>
                                        <li><a href="faq.html" title="FAQ">FAQ</a></li>
                                        <li><a href="coming-soon.html" title="COMING SOON">COMING SOON</a></li>
                                        <li><a href="404.html" title="404 Page">404 Page</a></li>
                                    </ul>
                                </li>

                                <li class="drop">
                                    <a href="#">Elements 02</a>
                                    <ul class="drop-down level3">
                                        <li><a href="element-cta.html">CTA Boxes</a></li>
                                        <li><a href="element-counter.html">Counters</a></li>
                                        <li><a href="element-logos.html">Logos/Client</a></li>
                                        <li><a href="element-pricing-table.html">Pricing Table</a></li>
                                        <li><a href="element-service.html">Service Boxes</a></li>
                                    </ul>
                                </li>

                                <li class="drop">
                                    <a href="#">Elements 03</a>
                                    <ul class="drop-down level3">
                                        <li><a href="element-highlights.html">Highlights</a></li>
                                        <li><a href="element-appointment.html">Quote Form</a></li>
                                        <li><a href="element-team.html">Team Boxes</a></li>
                                    </ul>
                                </li>

                                <li class="drop"><a href="#">Level 3</a>
                                    <ul class="drop-down level3">
                                        <li><a href="#">Level 3.1</a></li>
                                        <li><a href="#">Level 3.2</a></li>
                                        <li><a href="#">Level 3.3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="drop">
                            <a href="#">Blog</a>
                            <ul class="drop-down">
                                <li><a href="blog.html">All Posts</a></li>
                                <li><a href="single.html">Single Page</a></li>
                            </ul>
                        </li>

                        <li><a href="contact.html">Contact</a></li>
                        <?php if ($this->session->userdata('status') == 'login') { ?>
                            <li><a href="<?php echo base_url('welcome') ?>" class="nav-btn-highlight">Beranda</a></li>
                            <li><a href="<?php echo base_url('login/logout') ?>" class="nav-btn-highlight">LogOut</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo base_url('depan/daftar') ?>" class="nav-btn-highlight">Daftar</a></li>
                            <li><a href="<?php echo base_url('login') ?>" class="nav-btn-highlight">Login</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>

    </section>


</header> <!-- end main-header  -->