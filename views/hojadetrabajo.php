
<!-- Page -->
  <?php 
    /*
    require("classes/users.class.php");
    $users = new Users();
    $roles = $users->getRoles();
    */
  ?>
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Hoja de trabajo</h1>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
            </div>

            <!-- CALENDARIO VA ACÁ -->

              <header class="page-header">
              <div class="pull-right form-inline">
                <div class="btn-group">
                  <button class="btn btn-primary" data-calendar-nav="prev">Anterior</button>
                  <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
                  <button class="btn btn-primary" data-calendar-nav="next">Siguiente</button>
                </div>

                <div class="btn-group">
                  <button class="btn btn-warning" data-calendar-view="year">Año</button>
                  <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                  <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                  <button class="btn btn-warning" data-calendar-view="day">Día</button>
                </div>
              </div>
              <h3></h3>
            </header>

            <?php if (isset($_GET["nuevo"]) AND ($_GET["nuevo"]=="ok")): ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

              <p><span class="glyphicon glyphicon-info-sign"></span> El evento ha sido creado con éxito.</p>
            </div>
            <?php endif; ?>

            <?php if (isset($_GET["eliminar"]) && ($_GET["eliminar"]=="ok")): ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

              <p><span class="glyphicon glyphicon-info-sign"></span> El evento ha sido eliminado con éxito.</p>
            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-xm-12 col-md-8">
                <div id="calendar"></div>
              </div>

              <div class="col-xm-12 col-md-4">
                <?php include_once "views/calendario/nuevo.php"; ?>
              </div>
            </div>

            <div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Evento</h3>
                  </div>
                  <div class="modal-body" style="height: 400px">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>


            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/underscore/underscore-min.js"></script>
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/jstimezonedetect/jstz.min.js"></script>
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/bootstrap-calendar/js/language/es-ES.js"></script>
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/bootstrap-calendar/js/calendar.js"></script>
            
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/moment/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/moment/locale/es.js"></script>
            <script type="text/javascript" src="<?php echo _DOMAIN;?>assets/components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 

            <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/components/bootstrap-calendar/css/calendar.min.css">



            <script>
              $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                ignoreReadonly: true,
                minDate: moment(),
                showClear: true
              });

              $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                ignoreReadonly: true,
                minDate: moment(),
                showClear: true
              });  

              (function($) {

              "use strict";

                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                var options = {
                  events_source: 'eventos.php',
                  language: 'es-ES',
                  modal: '#events-modal',
                  modal_type: 'ajax',
                  modal_title: function(event) { return event.title },
                  view: 'month',
                  tmpl_path: 'assets/components/bootstrap-calendar/tmpls/',
                  tmpl_cache: false,
                  day: yyyy+"-"+mm+"-"+dd,

                  onAfterEventsLoad: function(events) {
                    if(!events) {
                      return;
                    }

                    var list = $('#eventlist');
                    list.html('');

                    $.each(events, function(key, val) {
                      $(document.createElement('li'))
                      .html('<a href="' + val.url + '">' + val.title + '</a>')
                      .appendTo(list);
                    });
                  },
                  onAfterViewLoad: function(view) {
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                  },
                  classes: {
                    months: {
                      general: 'label'
                    }
                  }
                };

                var calendar = $('#calendar').calendar(options);

                $('.btn-group button[data-calendar-nav]').each(function() {
                  var $this = $(this);
                  $this.click(function() {
                    calendar.navigate($this.data('calendar-nav'));
                  });
                });

                $('.btn-group button[data-calendar-view]').each(function() {
                  var $this = $(this);
                  $this.click(function() {
                    calendar.view($this.data('calendar-view'));
                  });
                });

                $('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
                  //e.preventDefault();
                  //e.stopPropagation();
                });
              }(jQuery));



            </script>

            <!-- FIN CALENDARIO -->
           

            <div class="clearfix hidden-xs"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->