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


<!--  SECTION FAQ -->

<section class="section-content-block section-curve-primary-overlary">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h4 class="heading-alt-style text-capitalize text-dark-color"> <?php echo $judul ?></h4>
                <span class="heading-separator heading-separator-horizontal"></span>
                <h2 class="subheading-alt-style">
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur eu ante non ex lobortis posuere -->
                    <br />
                    <!-- volutpat nec orci morbi facilisis massa lectus volutpat posuere volutpat. -->
                </h2>
            </div> <!-- end .col-sm-12  -->

        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="faq-layout" id="accordion">
                    <?php foreach ($faq as $f) :  ?>

                        <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <p class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $f->tanya_faq ?></a>
                                </p>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo $f->jawab_faq ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                </div> <!-- end .col-md-6  -->

            </div> <!--  end .faq-layout -->

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .faq-layout -->

<!--  SECTION CTA 04 -->