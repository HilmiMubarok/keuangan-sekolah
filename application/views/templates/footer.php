      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="#">Sistem Informasi Pengelolaan Keuangan Pada SMK NU 02 ROWOSARI 2022</a></span>
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

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>assets/js/datepicker.min.js"></script>

  <!-- dataTable -->
  <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/js/responsive.bootstrap4.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      // if window less 600 px, add class to body 
      if ($(window).width() < 780) {
        $('body').addClass('sidebar-toggled');
        $('.navbar-nav').addClass('toggled');
      } else {
        $('body').removeClass('sidebar-toggled');
        $('.navbar-nav').removeClass('toggled');
      }
      
      $('[data-toggle="tooltip"]').tooltip()

      $('#dataTable').DataTable();

      $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

    });
    
  </script>

</body>

</html>
