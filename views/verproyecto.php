  <!-- Page -->
  <?php 
    require("classes/projects.class.php");
    require("classes/clients.class.php");
    require("classes/users.class.php");
    $id_project = $_REQUEST['id_project'];
    $clients = new Clients();
    $users = new Users();
    $projects = new Projects();
    $project = $projects->getProjectById($id_project);
    $clients = $clients->getClients();
    $users = $users->getCommercials();
  ?>
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title"><?php echo $project['name'];?></h1>
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
                  <form autocomplete="off" id="projectsForm" action="classes/service.php" method="post">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="control-label" for="nombre">Nombre</label>
                        <input value="<?php echo $project['name'];?>" type="text" class="form-control" id="name" name="name" placeholder="Nombre" autocomplete="off" />
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="nombre">Cliente</label>
                      
                      <select class="form-control validate[required]" name="id_client" id="clients">
                          <option value="">Seleccione...</option>
                          <?php 
                            foreach($clients as $client){ ?>
                              <option <?php if($client['cliente_id']==$project['id_client']){ echo "selected"; } ?> value="<?php echo $client['cliente_id'];?>"><?php echo ucfirst($client['cliente_nombre']);?></option>  
                            <?php } 
                          ?>
                      </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="nombre">Comercial Responsable</label>
                        
                      
                      <select class="form-control validate[required]" name="id_resp_user" id="id_resp_user">
                          <option value="">Seleccione...</option>
                          <?php 
                            foreach($users as $user){ ?>
                              <option  <?php if($user['id']==$project['id_resp_user']){ echo "selected"; } ?> value="<?php echo $user['id'];?>"><?php echo ucfirst($user['name'])." ".ucfirst($user['lastname']);?></option>  
                            <?php } ?>

                      </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label" for="email">Estado del proyecto</label>
                        <select class="form-control validate[required]" name="status" id="status">
                          <option value="">Seleccione...</option>
                          <option <?php if($project['status']=="tramite"){ echo "selected"; }?> value="tramite">En trámite</option>
                          <option <?php if($project['status']=="ejecucion"){ echo "selected"; }?>  value="ejecucion">En ejecución</option>
                          <option <?php if($project['status']=="finalizado"){ echo "selected"; }?>  value="finalizado">Finalizado</option>
                        </select>
                      </div>  

                      <div class="col-sm-6">
                        <label class="control-label" for="telefono">Fecha inicio</label>
                        <input value="<?php echo $project['start_date'];?>" type="text" class="form-control datepicker validate[required]" id="start_date" name="start_date" placeholder="Fecha inicio" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="end_date">Fecha de finalización</label>
                        <input value="<?php echo $project['end_date'];?>" type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="Fecha de finalización" autocomplete="off" />
                      </div> 

                      <br>
                      

                      <div class="col-sm-6">
                        <label class="control-label" for="emergency_contact">Horas de desarrollo cotizadas</label>
                        <input value="<?php echo $project['development_h'];?>" type="text" class="form-control" id="" name="development_h" placeholder="Desarrollo" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="bloodd_type">Horas de diseño cotizadas</label>
                        <input value="<?php echo $project['design_h'];?>" type="text" class="form-control" id="diseño" name="design_h" placeholder="Diseño" autocomplete="off" />
                      </div> 
                      <div class="col-sm-6">
                        <label class="control-label" for="start_date">Horas de maquetación cotizadas</label>
                        <input value="<?php echo $project['weblayout_h'];?>" type="text" class="form-control" id="maquetacion" name="weblayout_h" placeholder="Maquetación" autocomplete="off" />
                      </div> 

                      <div class="col-sm-12">
                      <label class="control-label" for="start_date">Información proyecto</label>
             			    <textarea class="form-control" name="information"><?php echo $project['information'];?></textarea>           
                      </div> 

                      

                      <div class="col-sm-6">
    		                <!-- Example Checkboxes -->
      		              <div class="example-wrap">
      		                <label class="control-label">Requerimientos</label>
      		                <div class="checkbox-custom checkbox-primary">
      		                  <input class="requerimiento" type="checkbox" id="mapa">
      		                  <label for="mapa">Mapa del sitio</label>
      		                </div>
      		                <div class="checkbox-custom checkbox-primary">
      		                  <input class="requerimiento" type="checkbox" id="cpanel">
      		                  <label for="cpanel">Accesos cpanel</label>
      		                </div>
      		                <div class="checkbox-custom checkbox-primary">
      		                  <input class="requerimiento" type="checkbox" id="ftp">
      		                  <label for="ftp">Accesos ftp</label>
      		                </div>
      		                <div class="checkbox-custom checkbox-primary">
      		                  <input class="requerimiento" type="checkbox" id="admin">
      		                  <label for="admin">Accesos administrador</label>
      		                </div>
      		                <div class="checkbox-custom checkbox-primary">
      		                  <input class="requerimiento" type="checkbox" id="pagos">
      		                  <label for="pagos">Accesos plataforma de pagos</label>
      		                </div>
      		              </div>
      		              <!-- End Example Checkboxes -->
		                  </div>
                    </div>
                    <div class="form-group">
                      
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
	  	$("#projectsForm").validationEngine('attach',{ 
	      	onValidationComplete: function(form, status){
	      	if (status == true){   
	        	$('#projectSave').css({"display": "none"});
	        	return true;
	      	}}
	  	});
	});

  var objArray = [];

  <?php if(!empty($project['requirements'])){ ?>
    
    var objArray = <?php echo $project['requirements'];?>;
    var str = JSON.stringify(objArray);

    for (var i=objArray.length-1;i>=0;i--){
      $("#"+objArray[i]).prop('checked', true);
    }

    $("#requirement").val("");
    $("#requirement").val(str);

  <?php } ?>

  	$('input:checkbox').on('change', function(){
	    if($(this).is(':checked')){
	    	var id = $(this).attr("id");
	    	objArray.push(id);
	      //console.log(objArray);
	    } else {
	    	var id = $(this).attr("id");
			  objArray = objArray.filter(item => item !== id);
			  //console.log(objArray);
	    }

	  var str = JSON.stringify(objArray);
		$("#requirement").val("");
		$("#requirement").val(str);

	});

  </script>



  

