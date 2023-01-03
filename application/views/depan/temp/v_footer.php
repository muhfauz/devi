  <!-- START FOOTER  -->

  <footer class="section-pure-black-bg">

      <section class="footer-widget-area footer-widget-area-bg section-custom-bg" data-bg_img="images/footer_bg.jpg" data-bg_color="#111111" data-bg_opacity="0.8">

          <div class="container">

              <div class="row">


                  <div class="col-md-4 col-sm-12 col-xs-12">

                      <div class="footer-widget">

                          <div class="sidebar-widget-wrapper">

                              <div class="textwidget about-footer">

                                  <div class="footer-widget-header clearfix">
                                      <h3><?php echo $this->db->query("select * from tbl_perusahaan")->row()->nama_perush ?></h3>
                                  </div> <!--  end .footer-widget-header -->

                                  <div class="footer-about-text margin-top-16">
                                      <?php echo $this->db->query("select * from tbl_perusahaan")->row()->tentang_perush ?>
                                  </div>


                                  <div class="social-icons margin-top-24">

                                      <a href="#">
                                          <i class="fa fa-facebook"></i>
                                      </a>

                                      <a href="#">
                                          <i class="fa fa-twitter"></i>
                                      </a>

                                      <a href="#">
                                          <i class="fa fa-pinterest-p"></i>
                                      </a>

                                      <a href="#">
                                          <i class="fa fa-instagram"></i>
                                      </a>

                                      <a href="#">
                                          <i class="fa fa-linkedin"></i>
                                      </a>

                                  </div>

                              </div>

                          </div> <!-- end .footer-widget-wrapper  -->

                      </div> <!--  end .footer-widget  -->

                  </div> <!--  end .col-md-4 col-sm-12 -->

                  <div class="col-md-4 col-sm-6 col-xs-12">

                      <div class="footer-widget">

                          <div class="sidebar-widget-wrapper">

                              <div class="footer-widget-header clearfix">
                                  <h3>Hubungi Kami</h3>
                              </div> <!--  end .footer-widget-header -->


                              <div class="textwidget">

                                  <i class="fa fa-envelope-o fa-contact"></i>
                                  <p><a href="#"><?php echo $this->db->query("select * from tbl_perusahaan")->row()->email_perush ?></a><br /><a href="#">helpmenow@swimes.com</a></p>

                                  <i class="fa fa-location-arrow fa-contact"></i>
                                  <p><?php echo $this->db->query("select * from tbl_perusahaan")->row()->alamat_perush ?></p>

                                  <i class="fa fa-phone fa-contact"></i>
                                  <p>Office:&nbsp; <?php echo $this->db->query("select * from tbl_perusahaan")->row()->telepon_perush ?><br /></p>

                              </div>

                          </div> <!-- end .footer-widget-wrapper  -->

                      </div> <!--  end .footer-widget  -->

                  </div> <!--  end .col-md-4 col-sm-12 -->


                  <div class="col-md-4 col-sm-6 col-xs-12">

                      <div class="footer-widget">

                          <div class="sidebar-widget-wrapper">

                              <div class="footer-widget-header clearfix">
                                  <h3>OPENING HOURS</h3>
                              </div> <!--  end .footer-widget-header -->

                              <div class="textwidget">
                                  <ul class="opening-shedule">
                                      <li class="clearfix">
                                          <span> Sat - Tues : </span>
                                          <div class="pull-right"> 6.00 AM - 10.00 PM</div>
                                      </li>
                                      <li>
                                          <span> Wed - Thurs : </span>
                                          <div class="pull-right"> 8.00 AM - 6.00 PM</div>
                                      </li>
                                      <li>
                                          <span> Friday :</span>
                                          <div class="pull-right"> 6.00 AM - 10.00 PM</div>
                                      </li>
                                      <li>
                                          <span> Sunday :</span>
                                          <div class="pull-right"> Closed</div>
                                      </li>
                                  </ul>

                              </div>



                          </div> <!-- end .footer-widget-wrapper  -->

                      </div> <!--  end .footer-widget  -->

                  </div>


              </div> <!-- end row  -->

          </div> <!-- end .container  -->

      </section> <!--  end .footer-widget-area  -->

      <!--FOOTER CONTENT  -->

      <section class="footer-contents">

          <div class="container">

              <div class="row clearfix">
                  <div class="col-md-12 col-sm-12 text-center clearfix">
                      <p class="copyright-text"> Copyright © 2017-2018. All Right Reserved - by xenioushk </p>
                  </div>

              </div>

          </div>

      </section>

  </footer>

  <!-- BACK TO TOP BUTTON  -->

  <a id="backTop">Back To Top</a>

  <script src="<?php echo base_url('assets/depan/') ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/wow.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/jquery.backTop.min.js "></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/waypoints.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/waypoints-sticky.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/jquery.counterup.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/venobox.min.js"></script>
  <script src="https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyB8asWf-NyxR0dTHf_OMY9iT_lRncQG8x8 "></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/jquery.gmap.min.js"></script>
  <script src="<?php echo base_url('assets/depan/') ?>js/custom-scripts.js"></script>
  </body>

  </html>