<!-- Footer -->
  <footer class="site-footer">
    <span class="site-footer-legal">© <?php echo date("Y");?> Paxzu</span>
    <div class="site-footer-right">
      Hecho con amor <i class="red-600 wb wb-heart"></i> en Bogotá
    </div>
  </footer>

  <!-- Core  -->
  
  <script src="<?php echo _DOMAIN;?>assets/vendor/bootstrap/bootstrap.js"></script>
  <!--<script src="<?php echo _DOMAIN;?>assets/vendor/animsition/jquery.animsition.js"></script>-->
  <script src="<?php echo _DOMAIN;?>assets/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

  <!-- Plugins -->
  <script src="<?php echo _DOMAIN;?>assets/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/intro-js/intro.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/screenfull/screenfull.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/slidepanel/jquery-slidePanel.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/datatables-tabletools/dataTables.tableTools.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/vendor/chartist-js/chartist.min.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/matchheight/jquery.matchHeight-min.js"></script>


  <!-- Scripts -->
  <script src="<?php echo _DOMAIN;?>assets/js/core.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/site.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/sections/menu.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/sections/menubar.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/sections/sidebar.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/configs/config-colors.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/configs/config-tour.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/components/asscrollable.js"></script>
<!--  <script src="<?php echo _DOMAIN;?>assets/js/components/animsition.js"></script>-->
  <script src="<?php echo _DOMAIN;?>assets/js/components/slidepanel.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/switchery.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/matchheight.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/apps/app.js"></script>


  <script>
    
    $(document).ready(function($) {

        $.datepicker.regional['es'] = {
           closeText: 'Cerrar',
           prevText: '< Ant',
           nextText: 'Sig >',
           currentText: 'Hoy',
           monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
           monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
           dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
           dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
           dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
           weekHeader: 'Sm',
           dateFormat: 'yy/mm/dd',
           firstDay: 1,
           isRTL: false,
           showMonthAfterYear: false,
           yearSuffix: ''
           };
           $.datepicker.setDefaults($.datepicker.regional['es']);
          $(function () {
          $(".datepicker").datepicker();
        });


    });
      
  </script>

</body>

</html>