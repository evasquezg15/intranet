  <script>
  $(document).ready(function() {

    $.ajax({
            type: "POST",
            url: "classes/service.php",
            data: { 
                task: "getUsers" 
            }
        }).done(function(data){
            //console.log(data);
            var data = JSON.parse(data);
                
                for(i=0; i<data.length;i++) {

                    var rowIndex = $('.dataTable').dataTable().fnAddData([
                        data[i].id,
                        data[i].name,
                        data[i].email,
                        data[i].tel,
                        data[i].rol,
                        data[i].edit,
                        data[i].status,
                    ]);
    
                }
        })
  })

  $(document).on('click', '.estadoBoton' ,function (event) {

        var getId = $(this).attr("id");
        var realId = getId.split("_");

        var task = realId[0];
        var id = realId[1];
        var target = "users";

        if(task=="deactivate"){
            var accion="desactivar";
        } else {
            var accion="activar";
        }
            
            $.ajax({
                type: "POST",
                url: "classes/service.php",
                data: { 
                    id: id,
                    target:target,
                    task:task
                }
            }).done(function(data){
                if(data==1){
                    if(accion=="desactivar"){
                        //alert(accion);
                        $("#container_"+id).html("");
                        var btnActDst = "<center><a><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='activate_"+id+"'><span class='ladda-label'>Activar</span><span class='ladda-spinner></span></button></a></center>";
                        $("#container_"+id).append(btnActDst);
                    } else {
                        //alert(accion);
                        $("#container_"+id).html("");
                        var btnActDst = "<center><a><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='deactivate_"+id+"'><span class='ladda-label'>Desactivar</span><span class='ladda-spinner></span></button></a></center>";
                        $("#container_"+id).append(btnActDst);
                    }
                }
            });   
    });



  </script>
  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Usuarios</h1>
      <div class="page-header-actions"></div>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">
            Listado de usuarios
          </h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th><center>Id</center></th>
                <th><center>Nombre</center></th>
                <th><center>Email</center></th>
                <th><center>Teléfono</center></th>
                <th><center>Rol</center></th>
                <th><center>Editar</center></th>
                <th><center>Status</center></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->

      
        </div>
      </div>
      <!-- End Panel FixedHeader -->
    </div>
  </div>
  <!-- End Page -->


