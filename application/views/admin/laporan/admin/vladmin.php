
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                                                    <div class="col-12">
                                                      <div class="row">
                                                    <div class="col-12">
                                                        <div class="page-title-box">
                                                            <div class="page-title-right">
                                                                <ol class="breadcrumb m-0">
                                                                  <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $x1;?></a></li>
                                                                  <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $x2 ?></a></li>
                                                                  <li class="breadcrumb-item active"><?php echo $x3 ?></li>
                                                              </ol>
                                                          </div>
                                                          <h5 class="page-title"><?php echo $x4; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="header-title"></h3>
                                                                <p class="text-muted font-13 mb-4">


                                                                </p>

                                                                <table id="selection-datatable" class="table dt-responsive nowrap">
                                                                  <p>
                                                                    <button type="button" class="btn btn-secondary">
                                                                      <a href="<?php echo base_url('adm/laporan/ladmin/laporan_pdf_admin') ?>">Lihat</a>
                                                                    </button>
                                                                  </p>
                                                                  <thead>
                                                                      <tr>
                                                                          <th>No</th>
                                                                          <th>Nama</th>
                                                                          <th>Username</th>
                                                                          <th>Password</th>



                                                                          <th></th>
                                                                      </tr>
                                                                  </thead>
                                                                    <tbody>
                                                                      <?php $no=0;
                                                                      foreach ($admin as $a): $no++;?>
                                                                        <tr>
                                                                            <td><?php echo $no; ?></td>
                                                                            <td><?php echo $a->nama_admin ?></td>
                                                                            <td><?php echo $a->username_admin ?></td>
                                                                            <td><?php echo $a->password_admin ?></td>

                                                                            <td>


                                                                            </td>
                                                                        </tr>
                                                                      <?php endforeach; ?>
                                                                                                      </tbody>
                                                                </table>

                                                            </div> <!-- end card body-->
                                                        </div> <!-- end card -->
                                                    </div><!-- end col-->
                                                </div>
                                                <!-- end row-->

                        <!-- end row -->



                        <!-- end row -->


                        <!-- end row -->




                    </div> <!-- container -->

                </div> <!-- content -->
