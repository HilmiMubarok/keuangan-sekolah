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

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    } );
  </script>

  <script>
    $('.datepicker-atd').datepicker({
        format: "yyyy"
    });
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd"
    });
  </script>


  <script>
    $(document).ready(function () {
      let bp   = []
      let base = "<?= base_url('api/') ?>"
      let besar_penyusutan
      $('#at_penyusutan').change(function () {

        let id = $(this).val()
        $.ajax({
         url: base + 'get/at',
         method: 'POST',
         data: {id : id},
         async: false,
         dataType: 'JSON',
         success: function (data) {
           bp['hp'] = data['harga_perolehan']
           bp['nr'] = data['nilai_residu']
           $('#tp_penyusutan').val(data['tgl_perolehan'])
           $('#nm_at').val(data['nama_aktiva_tetap'])
           $('#hp_penyusutan').val(data['harga_perolehan'])
           $('#nr_penyusutan').val(data['nilai_residu'])
         }
        })

      })

      $('#kategori_penyusutan').change(function () {

        let id = $(this).val()
        $.ajax({
         url: base + 'get/kategori',
         method: 'POST',
         async: false,
         data: {id : id},
         dataType: 'JSON',
         success: function (data) {

          bp['ue'] = data['umur_ekonomis']
          
          if (!bp['hp'] && !bp['nr']) {
            console.log('get first')
          }
          besar_penyusutan = (bp['hp'] - bp['nr']) / bp['ue']

           $('#nm_kategori').val(data['nama_kategori'])
           $('#ue_penyusutan').val(data['umur_ekonomis'])
           $('#bp_penyusutan').val(besar_penyusutan)
         }
        })

      })

      $('#ip_at_dihentikan').change(function () {

        let id = $(this).val()
        let bp, hp, id_at, ik, ue, tp
        let now = <?= date('Y') ?>
        
        $.ajax({
         url: base + 'get/penyusutan',
         method: 'POST',
         data: {id : id},
         dataType: 'JSON',
         async: false,
         success: function (dt) {
           bp    = parseInt(dt['besar_penyusutan'])
           id_at = dt['id_aktiva_tetap']
           ik    = dt['id_kategori']
           $('#iat_atd').val(dt['id_aktiva_tetap'])
           $('#bp_atd').val(dt['besar_penyusutan'])

         }
        })

        $.ajax({
         url: base + 'get/kategori',
         method: 'POST',
         data: {id : ik},
         dataType: 'JSON',
         async: false,
         success: function (dd) {
            ue = dd['umur_ekonomis']
         }
        })

        $.ajax({
         url: base + 'get/at',
         method: 'POST',
         data: {id : id_at},
         dataType: 'JSON',
         async: false,
         success: function (d) {
           hp = parseInt(d['harga_perolehan'])
           tp = d['tgl_perolehan']
           $('#tp_atd').val(d['tgl_perolehan'])
           $('#hp_atd').val(d['harga_perolehan'])
           $('#iat_at').val(d['nama_aktiva_tetap'])
           

           $('#nb_atd').val(hp - bp)
         }
        })

        
        // let us = now - tp.substr(0,4)
        // if ( us > ue ) {
        //   $('#btn-at-dihentikan').attr('disabled', true)
        //   $('#notif-at-dihentikan').show()
        //   $('#notif-at-dihentikan').html('kada')
        // }

      })



      $('#notif-penjualan').hide()
      $('#atd_penjualan').change(function () {

        let id = $(this).val()
        let lb, pp, nj, nb, ip, id_at
        
        $.ajax({
         url: base + 'get/at_dihentikan',
         method: 'POST',
         data: {id : id},
         dataType: 'JSON',
         async: false,
         success: function (data) {
           nb = parseInt(data['nilai_buku'])
           nj = parseInt(data['nilai_jual'])
           pp = nj - nb
           ip = data['id_penyusutan']

           $('#nj_penjualan').val(nj)
           $('#nb_penjualan').val(nb)
           $('#p_penjualan').val(pp)

           if (nb > nj) {
            lb = "Rugi"
           } else if(nb < nj) {
            lb = "Laba"
           } else {
            lb = "Tidak Laba atau Rugi"
           }

           $('#lb_penjualan').val(lb)
         }
        })


        $.ajax({
         url: base + 'get/penyusutan',
         method: 'POST',
         data: {id : ip},
         dataType: 'JSON',
         async: false,
         success: function (dt) {
           id_at = dt['id_aktiva_tetap']

         }
        })

        $.ajax({
         url: base + 'get/at',
         method: 'POST',
         data: {id : id_at},
         dataType: 'JSON',
         async: false,
         success: function (d) {
          if (d['perolehan_dana'] == "bos") {
            $('#notif-penjualan').show()
            $('#notif-penjualan').html('Aktiva Tetap dari dana BOS tidak bisa dijual')
            $('#btn-penjualan').attr('disabled', true)
          } else {
            $('#notif-penjualan').hide()
            $('#btn-penjualan').attr('disabled', false)

          }
           $('#at_penjualan').val(d['nama_aktiva_tetap'])
         }
        })

        

      })


    })
  </script>

</body>

</html>
