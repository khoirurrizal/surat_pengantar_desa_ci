<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Error Coding <?php echo date('Y'); ?></span>
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
        <div class="modal-body">Pilih "Logout" jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets') ?>/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets') ?>/js/demo/datatables-demo.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets') ?>/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets') ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets') ?>/js/demo/chart-pie-demo.js"></script>

  <script>

    $('.form-check-input').on('click', function(){

      const submenuId = $(this).data('submenu');
      const userId = $(this).data('userid');
      const menuId = $(this).data('menu');

      $.ajax({
        url: "<?php echo base_url('role/changeaccesssubmenu') ?>",
        type: 'post',
        data : {
          submenuId : submenuId,
          userId : userId
        },
        success: function(){
          document.location.href="<?php echo base_url('role/roleaccesssubmenu/') ?>" +userId + "/" +menuId;
        }
      });

    });
    
  </script>

  <script>
    $(".form-check").on('click', function(){
      const menuId = $(this).data('menu');
      const userId = $(this).data('userid');
      const roleId = $(this).data('role');

      $.ajax({
        url : "<?php echo base_url('role/changeaccessmenu') ?>",
        type: 'post',
        data: {
          menuId : menuId,
          userId : userId,
          roleId : roleId
        },
        success : function(){
          document.location.href="<?php echo base_url('role/roleaccessmenu/') ?>" +userId;
        }
      });
    });
  </script>

  <script>
      function nilai_pengetahuan() {
      var tes_tulis1  = document.getElementById('tes_tulis1').value;
      var tes_lisan1  = document.getElementById('tes_lisan1').value;
      var tugas1      = document.getElementById('tugas1').value;
      var remidi1     = document.getElementById('remidi1').value;
      var tes_tulis2  = document.getElementById('tes_tulis2').value;
      var tes_lisan2  = document.getElementById('tes_lisan2').value;
      var tugas2      = document.getElementById('tugas2').value;
      var remidi2     = document.getElementById('remidi2').value;
      var tes_tulis3  = document.getElementById('tes_tulis3').value;
      var tes_lisan3  = document.getElementById('tes_lisan3').value;
      var tugas3      = document.getElementById('tugas3').value;
      var remidi3     = document.getElementById('remidi3').value;
      var tes_tulis4  = document.getElementById('tes_tulis4').value;
      var tes_lisan4  = document.getElementById('tes_lisan4').value;
      var tugas4      = document.getElementById('tugas4').value;
      var remidi4     = document.getElementById('remidi4').value;

      var nh1         = document.getElementById('nh1').value;
      var nh2         = document.getElementById('nh2').value;
      var nh3         = document.getElementById('nh3').value;
      var nh4         = document.getElementById('nh4').value;
           
      var ratanh      = document.getElementById('ratanh').value;
      var npenget     = document.getElementById('npenget').value;

            
      var rata1 = ((parseFloat(tes_tulis1) + parseFloat(tes_lisan1) + parseFloat(tugas1))/ 3);
      var rata2 = ((parseFloat(tes_tulis2) + parseFloat(tes_lisan2) + parseFloat(tugas2))/ 3);
      var rata3 = ((parseFloat(tes_tulis3) + parseFloat(tes_lisan3) + parseFloat(tugas3))/ 3);
      var rata4 = ((parseFloat(tes_tulis4) + parseFloat(tes_lisan4) + parseFloat(tugas4))/ 3);

      
   
      if (!isNaN(rata1) < 75) {
        document.getElementById('rata1').value = rata1.toFixed(0);
        if(rata1 > remidi1){
         document.getElementById('nh1').value = rata1.toFixed(0);
        }else{
          document.getElementById('nh1').value = remidi1;
        }
      }
      if (!isNaN(rata2) < 75) {
        document.getElementById('rata2').value = rata2.toFixed(0);
        if(rata2 > remidi2){
         document.getElementById('nh2').value = rata2.toFixed(0);
        }else{
          document.getElementById('nh2').value = remidi2;
        }
      }
      if (!isNaN(rata3) < 75) {
        document.getElementById('rata3').value = rata3.toFixed(0);
        if(rata3 > remidi3){
         document.getElementById('nh3').value = rata3.toFixed(0);
        }else{
          document.getElementById('nh3').value = remidi3;
        }
      } 
      if (!isNaN(rata4) < 75) {
        document.getElementById('rata4').value = rata4.toFixed(0);
        if(rata4 > remidi4){
         document.getElementById('nh4').value = rata4.toFixed(0);
        }else{
          document.getElementById('nh4').value = remidi4;
        }
      } 
      var rata_semua_nh = ((parseFloat(nh1) + parseFloat(nh2) + parseFloat(nh3) + parseFloat(nh4)) / 4);

       if (!isNaN(rata_semua_nh)) {
        document.getElementById('ratanh').value = rata_semua_nh.toFixed(0);
      }

      var uts = document.getElementById('nilai_uts').value;
      var uas = document.getElementById('nilai_uas').value;
     
      var npengetahuan =( ( (parseFloat(rata_semua_nh) *2 ) + (parseFloat(uts) * 1) + (parseFloat(uas) *1 ) ) / 4);

      if (!isNaN(npengetahuan)) {
        document.getElementById('npenget').value = npengetahuan.toFixed(0);
      }

      var konversi = (parseFloat(npengetahuan) * 0.04);

      if (!isNaN(konversi)) {
        document.getElementById('konversi_p').value = konversi.toFixed(2);
      }

      

      if(0.00 < konversi && konversi <= 1.00){
        document.getElementById('predikat_p').value = 'D';
      } else if(1.00 < konversi && konversi <= 1.33){
        document.getElementById('predikat_p').value = 'D+';
      } else if(1.33 < konversi && konversi <= 1.66) {
        document.getElementById('predikat_p').value = 'C-';
      } else if( 1.66 < konversi && konversi <= 2.00) {
        document.getElementById('predikat_p').value = 'C';
      } else if(2.00 < konversi && konversi <= 2.33){
        document.getElementById('predikat_p').value = 'C+';
      } else if(2.33 < konversi && konversi <= 2.66){
        document.getElementById('predikat_p').value = 'B-';
      }else if(2.66 < konversi && konversi <= 3.00) {
        document.getElementById('predikat_p').value = 'B';
      }else if(3.00 < konversi && konversi <= 3.33){
        document.getElementById('predikat_p').value = 'B+';
      }else if(3.33 < konversi && konversi <= 3.66){
        document.getElementById('predikat_p').value = 'A-';
      }else {
        document.getElementById('predikat_p').value = 'A';
      }

}
</script>




    <script>
      function nilai_keterampilan()
      {
        var praktik1 = document.getElementById('praktik1').value;
        var praktik2 = document.getElementById('praktik2').value;
        var praktik3 = document.getElementById('praktik3').value;
        var praktik4 = document.getElementById('praktik4').value;
        var praktik5 = document.getElementById('praktik5').value;

        var proyek1 = document.getElementById('proyek1').value;
        var proyek2 = document.getElementById('proyek2').value;
        var proyek3 = document.getElementById('proyek3').value;

        var portofolio1 = document.getElementById('portofolio1').value;
        var portofolio2 = document.getElementById('portofolio2').value;

        var r_praktik = ((parseFloat(praktik1) + parseFloat(praktik2) + parseFloat(praktik3) + parseFloat(praktik4) + parseFloat(praktik5))/ 5);

        var r_proyek = ((parseFloat(proyek1) + parseFloat(proyek2) + parseFloat(proyek3) )/ 3);

        var r_portofolio = ((parseFloat(portofolio1) + parseFloat(portofolio2) )/ 2);

        var n_ilai =  ((parseFloat(r_praktik) * 2) + (parseFloat(r_proyek) * 1) + (parseFloat(r_portofolio) * 1)) / 4;

        var n_konversi =  (parseFloat(n_ilai) * 0.04);


        if (!isNaN(r_praktik)) {
        document.getElementById('rata_praktik').value = r_praktik.toFixed(0);
      }

      if (!isNaN(r_proyek)) {
        document.getElementById('rata_proyek').value = r_proyek.toFixed(0);
      }

      if (!isNaN(r_portofolio)) {
        document.getElementById('rata_portofolio').value = r_portofolio.toFixed(0);
      }

      if (!isNaN(n_ilai)) {
        document.getElementById('nilai').value = n_ilai.toFixed(0);
      }

      if (!isNaN(n_konversi)) {
        document.getElementById('konversi_k').value = n_konversi.toFixed(2);
      }

      if(0.00 < n_konversi && n_konversi <= 1.00){
        document.getElementById('predikat_k').value = 'D';
      } else if(1.00 < n_konversi && n_konversi <= 1.33){
        document.getElementById('predikat_k').value = 'D+';
      } else if(1.33 < n_konversi && n_konversi <= 1.66) {
        document.getElementById('predikat_k').value = 'C-';
      } else if( 1.66 < n_konversi && n_konversi <= 2.00) {
        document.getElementById('predikat_k').value = 'C';
      } else if(2.00 < n_konversi && n_konversi <= 2.33){
        document.getElementById('predikat_k').value = 'C+';
      } else if(2.33 < n_konversi && n_konversi <= 2.66){
        document.getElementById('predikat_k').value = 'B-';
      }else if(2.66 < n_konversi && n_konversi <= 3.00) {
        document.getElementById('predikat_k').value = 'B';
      }else if(3.00 < n_konversi && n_konversi <= 3.33){
        document.getElementById('predikat_k').value = 'B+';
      }else if(3.33 < n_konversi && n_konversi <= 3.66){
        document.getElementById('predikat_k').value = 'A-';
      }else {
        document.getElementById('predikat_k').value = 'A';
      }


      }
    </script>

    <script type="text/javascript">
      function nilai_sikap()
      {
        var spiritual1 = document.getElementById('spiritual1').value;
        var spiritual2 = document.getElementById('spiritual2').value;
        var spiritual3 = document.getElementById('spiritual3').value;
        var jujur1 = document.getElementById('jujur1').value;
        var jujur2 = document.getElementById('jujur2').value;
        var jujur3 = document.getElementById('jujur3').value;
        var disiplin1 = document.getElementById('disiplin1').value;
        var disiplin2 = document.getElementById('disiplin2').value;
        var disiplin3 = document.getElementById('disiplin3').value;
        var t_jawab1 = document.getElementById('t_jawab1').value;
        var t_jawab2 = document.getElementById('t_jawab2').value;
        var t_jawab3 = document.getElementById('t_jawab3').value;
        var toleransi1 = document.getElementById('toleransi1').value;
        var toleransi2 = document.getElementById('toleransi2').value;
        var toleransi3 = document.getElementById('toleransi3').value;
        var g_royong1 = document.getElementById('g_royong1').value;
        var g_royong2 = document.getElementById('g_royong2').value;
        var g_royong3 = document.getElementById('g_royong3').value;
        var g_royong4 = document.getElementById('g_royong4').value;
        var santun1 = document.getElementById('santun1').value;
        var santun2 = document.getElementById('santun2').value;
        var santun3 = document.getElementById('santun3').value;
        var pd1 = document.getElementById('pd1').value;
        var pd2 = document.getElementById('pd2').value;
        var pd3 = document.getElementById('pd3').value;

        var spiritual4 = document.getElementById('spiritual4').value;
        var jujur4 = document.getElementById('jujur4').value;
        var disiplin4 = document.getElementById('disiplin4').value;
        var t_jawab4 = document.getElementById('t_jawab4').value;
        var toleransi4 = document.getElementById('toleransi4').value;
        var g_royong5 = document.getElementById('g_royong5').value;
        var santun4 = document.getElementById('santun4').value;
        var pd4 = document.getElementById('pd4').value;

        var spiritual5 = document.getElementById('spiritual5').value;
        var jujur5 = document.getElementById('jujur5').value;
        var disiplin5 = document.getElementById('disiplin5').value;
        var t_jawab5 = document.getElementById('t_jawab5').value;
        var toleransi5 = document.getElementById('toleransi5').value;
        var g_royong6 = document.getElementById('g_royong6').value;
        var santun5 = document.getElementById('santun5').value;
        var pd5 = document.getElementById('pd5').value;

        var j1 = document.getElementById('j1').value;
        var j2 = document.getElementById('j2').value;
        var j3 = document.getElementById('j3').value;
        var j4 = document.getElementById('j4').value;
        var j5 = document.getElementById('j5').value;

        

        var r_obv = ((parseFloat(spiritual1) + parseFloat(spiritual2) + parseFloat(spiritual3) + 
                      parseFloat(jujur1)     + parseFloat(jujur2)     + parseFloat(jujur3)     +
                      parseFloat(disiplin1)  + parseFloat(disiplin2)  + parseFloat(disiplin3)  +
                      parseFloat(t_jawab1)   + parseFloat(t_jawab2)   + parseFloat(t_jawab3)   +
                      parseFloat(toleransi1) + parseFloat(toleransi2) + parseFloat(toleransi3) +
                      parseFloat(g_royong1)  + parseFloat(g_royong2)  + parseFloat(g_royong3)  +
                      parseFloat(g_royong4)  +
                      parseFloat(santun1)    + parseFloat(santun2)    + parseFloat(santun3)    +
                      parseFloat(pd1)        + parseFloat(pd2)        + parseFloat(pd3)) / 25 );
        if (!isNaN(r_obv)) {
        document.getElementById('rata_obv').value = r_obv;
      }

      var r_pd = ((parseFloat(spiritual4)  + parseFloat(jujur4)     +  parseFloat(disiplin4) +  
                   parseFloat(t_jawab4)    + parseFloat(toleransi4) + parseFloat(g_royong5) +
                   parseFloat(santun4)     +  parseFloat(pd4)) / 8 );
        if (!isNaN(r_pd)) {
        document.getElementById('rata_pd').value = r_pd;
      }

      var r_apd = ((parseFloat(spiritual5)  + parseFloat(jujur5)     +  parseFloat(disiplin5) +  
                    parseFloat(t_jawab5)    + parseFloat(toleransi5) + parseFloat(g_royong6) +
                    parseFloat(santun5)     +  parseFloat(pd5)) / 8 );
        if (!isNaN(r_apd)) {
        document.getElementById('rata_apd').value = r_apd;
      }

      var r_jg = ((parseFloat(j1)  + parseFloat(j2)     +  parseFloat(j3) +  
                    parseFloat(j4)    + parseFloat(j5) ) / 5 );
        if (!isNaN(r_jg)) {
        document.getElementById('rata_jg').value = r_jg;
      }

      var ns = (( (parseFloat(r_obv) * 2)  + (parseFloat(r_pd) * 1)     +  (parseFloat(r_apd) * 1) +  
                   (parseFloat(r_jg) * 1) ) / 5 );

      if (!isNaN(ns)) {
        document.getElementById('n_sikap').value = ns;
      }

      if(0.01 < ns && ns <= 1.33){
        document.getElementById('predikat_s').value = 'K';
        
      } else if(1.33 < ns && ns <= 2.33){
        document.getElementById('predikat_s').value = 'C';
        
      } else if(2.33 < ns && ns <= 3.33) {
        document.getElementById('predikat_s').value = 'B';
        
      } else {
        document.getElementById('predikat_s').value = 'SB';
       



      }
    }
    </script>
    
    

    <script>
      $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
    </script>
    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>

    
    

</body>

</html>
