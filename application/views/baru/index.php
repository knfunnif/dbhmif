    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->

      <!-- Begin Page Content -->
      <div class="row">

        <div class="col-md-8 col-sm-12">
          <img src="<?php echo base_url('assets/img/wait2.png') ?>" width="100%">
        </div>
        <div class="col-md-4 col-sm-12 text-center">
          <br /> <br /> <br />
          <br /> <br /> <br />
          <h3>Halo <b><?php echo $anggota['nama']; ?></b></h3>
          <p>Kamu <b>Unconfirmed</b><br />Untuk aktivasi akun, hubungi : <a href="http://line.me/ti/p/%40hmifundip"><b>@hmifundip</b></a></p>
        </div>
      </div>
        <!-- End of Courousoul -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kominfo 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

     <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>