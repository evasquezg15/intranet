  <!-- Page -->
  <?php 
    require("classes/users.class.php");
    $user_id = $_REQUEST['user_id'];
    $users = new Users();
    $user_info = $users->getUserInfoById($user_id);
    $roles = $users->getRoles();
    $departments = $users->getDepartments();
  ?>
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Edita Usuario</h1>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title"></h4>
                <div class="example">
                  <form autocomplete="off" id="usersForm" action="classes/service.php" method="post">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="control-label" for="nombre">Nombre</label>
                        <input value="<?php echo $user_info['name'];?>" type="text" class="form-control" id="name" name="name" placeholder="Nombre" autocomplete="off" />
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="lastname">Apellido</label>
                        <input value="<?php echo $user_info['lastname'];?>" type="text" class="form-control validate[required, custom[onlyLetterAccentSp]]" id="lastname" name="lastname" placeholder="Apellido" autocomplete="off" />
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="email">Email</label>
                        <input value="<?php echo $user_info['email'];?>" type="email" class="form-control validate[required, custom[email]]" id="email" name="email" placeholder="Email" autocomplete="off" />
                      </div>  
                      <div class="col-sm-6">
                        <label class="control-label" for="telefono">Teléfono / Whatsapp</label>
                        <input value="<?php echo $user_info['tel'];?>" type="tel" class="form-control validate[required, custom[number]]" id="tel" name="tel" placeholder="Teléfono" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="emergency_contact">Contacto Emergencia</label>
                        <input value="<?php echo $user_info['emergency_contact'];?>" type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Contacto Emergencia" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="bloodd_type">Tipo de sangre</label>
                        <input value="<?php echo $user_info['blood_type'];?>" type="text" class="form-control" id="blood_type" name="blood_type" placeholder="Tipo de sangre" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="start_date">Fecha de inicio</label>
                        <input value="<?php echo $user_info['start_date'];?>" type="text" class="form-control date" id="start_date" name="start_date" placeholder="Fecha de inicio" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="end_date">Fecha de finalización</label>
                        <input value="<?php echo $user_info['finish_date'];?>"  type="text" class="form-control date" id="finish_date" name="finish_date" placeholder="Fecha de finalización" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="contract_type">Tipo de contrato</label>
                        <input value="<?php echo $user_info['contract_type'];?>"  type="text" class="form-control" id="contract_type" name="contract_type" placeholder="Tipo de contrato" autocomplete="off" />
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="position">Posicion</label>
                        <input  value="<?php echo $user_info['position'];?>" type="text" class="form-control" id="position" name="position" placeholder="Posición" autocomplete="off" />
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="roles_mask">Rol</label>
                        <div class="form-group">
                        <select class="form-control validate[required]" name="roles_mask" id="roles_mask">
                          <option value="">Seleccione...</option>
                          <?php 
                            foreach($roles as $rol){ ?>
                              <option <?php if($rol['id']==$user_info['roles_mask']){ echo "selected"; }?> value="<?php echo $rol['id'];?>"><?php echo ucfirst($rol['name']);?></option>  
                            <?php } ?>
                        </select>
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="id_department">Departamento</label>
                        <div class="form-group">
                        <select class="form-control validate[required]" name="id_department" id="id_department">
                          <option value="">Seleccione...</option>
                          <?php 
                            foreach($departments as $department){ ?>
                              <option <?php if($department['id']==$user_info['id_department']){ echo "selected"; }?> value="<?php echo $department['id'];?>"><?php echo ucfirst($department['name']);?></option>  
                            <?php } ?>
                        </select>
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="cost_per_hour">Costo por hora</label>
                        <input value="<?php echo $user_info['cost_per_hour'];?>" type="text" class="form-control" id="cost_per_hour" name="cost_per_hour" placeholder="Costo por hora" autocomplete="off" />
                      </div>
                      <div class="col-sm-12">
                        <label class="control-label" for="eps">EPS</label>
                        <input value="<?php echo $user_info['eps'];?>" type="text" class="form-control" id="eps" name="eps" placeholder="EPS" autocomplete="off" />
                      </div>
                      <div class="col-sm-12">
                        <label class="control-label" for="address">Dirección</label>
                        <input value="<?php echo $user_info['address'];?>" type="text" class="form-control" id="address" name="address" placeholder="Dirección" autocomplete="off" />
                      </div>
                      <div class="col-sm-12">
                      <label class="control-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
                      </div>

                      <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                      <input type="hidden" name="task" value="updateUser">

                      <div class="col-sm-6">
                      <label for="inputBasicRemember">Último Login: <?php echo gmdate('r', $user_info['last_login']);?></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id="userSave">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>

            

            <div class="clearfix hidden-xs"></div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->
  <script>
  $( document ).ready(function() {

      $("#usersForm").validationEngine('attach',{ 
          onValidationComplete: function(form, status){
          if (status == true){   
              $('#userSave').css({"display": "none"});
              return true;
          }}
      });

      $(function(){

        $.datepicker.regional['es'] = {
            changeMonth: true,
            changeYear: true,
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: true,
            showMonthAfterYear: true,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);

        //$(".date").datepicker({ minDate: 0 });
        $(".date").datepicker();
      });

    });

  </script>



  

