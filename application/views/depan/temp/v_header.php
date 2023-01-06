<!--  HEADER STYLE 04 -->

<!--  HEADER STYLE  02-->

<header class="main-header clearfix" data-sticky_header="true">

    <div class="top-bar">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">

                    <ul class="top-bar-info clearfix  text-left">
                        <li><span class="fa fa-envelope-o text-primary-color"></span> &nbsp; <?php echo $this->db->query("select * from tbl_perusahaan")->row()->email_perush ?></li>
                        <li><span class="fa fa-support text-primary-color"></span> &nbsp; <?php echo $this->db->query("select * from tbl_perusahaan")->row()->telepon_perush ?></li>
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
                            <a href="<?php echo base_url('depan/tentang') ?>" title="About Us">Tentang Kami</a>
                        </li>


                        <li class="drop">
                            <a href="#">Blog</a>
                            <ul class="drop-down">
                                <li><a href="blog.html">All Posts</a></li>
                                <li><a href="single.html">Single Page</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo base_url('depan/kontak') ?>">Hubungi Kami</a></li>
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